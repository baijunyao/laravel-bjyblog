<?php

namespace App\Models;

/**
 * 评论
 */
class Comment extends Base
{
    // 用于递归
    private $child = [];

    /**
     * content 访问器 把 ubb格式的表情转为html标签
     *
     * @param $value
     *
     * @return mixed
     */
    public function getContentAttribute($value)
    {
        return $this->ubbToImage($value);
    }

    public function setContentAttribute($value)
    {
        $this->attributes['content'] =  $this->imageToUbb($value);
    }

    /**
     * 关联文章
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function article()
    {
        return $this->belongsTo(Article::class)->withDefault();
    }

    /**
     * 关联第三方用户
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function oauthUser()
    {
        return $this->belongsTo(OauthUser::class)->withDefault();
    }

    /**
     * ubb格式的表情转为html标签
     *
     * @param $content
     *
     * @return mixed
     */
    public function ubbToImage($content)
    {
        $ubb   = ['[Kiss]', '[Love]', '[Yeah]', '[啊！]', '[背扭]', '[顶]', '[抖胸]', '[88]', '[汗]', '[瞌睡]', '[鲁拉]', '[拍砖]', '[揉脸]', '[生日快乐]', '[摊手]', '[睡觉]', '[瘫坐]', '[无聊]', '[星星闪]', '[旋转]', '[也不行]', '[郁闷]', '[正Music]', '[抓墙]', '[撞墙至死]', '[歪头]', '[戳眼]', '[飘过]', '[互相拍砖]', '[砍死你]', '[扔桌子]', '[少林寺]', '[什么？]', '[转头]', '[我爱牛奶]', '[我踢]', '[摇晃]', '[晕厥]', '[在笼子里]', '[震荡]'];
        $count = count($ubb);
        $image = [];
        // 循环生成img标签
        for ($i = 1; $i <= $count; $i++) {
            $image[] = '<img src="' . asset('statics/emote/tuzki/' . $i . '.gif') . '" title="' . str_replace(['[', ']'], '', $ubb[$i - 1]) . '" alt="' . config('app.name') . '">';
        }

        return str_replace($ubb, $image, $content);
    }

    /**
     * img格式的表情转为ubb格式
     *
     * @param $content
     *
     * @return mixed|string
     */
    public function imageToUbb($content)
    {
        $content = html_entity_decode(htmlspecialchars_decode($content));
        // 删标签 去空格 转义
        $content = strip_tags(trim($content), '<img>');
        preg_match_all('/<img.*?title="(.*?)".*?>/i', $content, $img);
        $search  = $img[0];
        $replace = array_map(function ($v) {
            return '[' . $v . ']';
        }, $img[1]);
        $content = str_replace($search, $replace, $content);

        return clean(strip_tags($content));
    }

    /**
     * 获取指定条数的最新评论
     *
     * @param int $limit
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getNewData($limit = 17)
    {
        $data = $this->select('comments.id', 'comments.content', 'comments.created_at', 'ou.name', 'ou.avatar', 'a.title', 'a.slug', 'a.id as article_id')
            ->join('articles as a', 'comments.article_id', 'a.id')
            ->join('oauth_users as ou', 'ou.id', 'comments.oauth_user_id')
            ->orderBy('comments.created_at', 'desc')
            ->where('a.deleted_at', null)
            ->where('ou.is_admin', '<>', 1)
            ->limit($limit)
            ->get();
        foreach ($data as $k => $v) {
            // 截取文章标题
            $data[$k]->title = re_substr($v->title, 0, 20);
            // 处理有表情时直接截取会把img表情截断的问题
            $content = strip_tags($v->content);
            if (mb_strlen($content) > 10) {
                $data[$k]->content = re_substr($content, 0, 40);
            } else {
                $data[$k]->content = $v->content;
            }
        }

        return $data;
    }

    /**
     * 通过文章id获取评论数据
     *
     * @param $article_id
     *
     * @return mixed
     */
    public function getDataByArticleId($article_id)
    {
        $map = [
            'comments.article_id' => $article_id,
            'comments.pid'        => 0,
        ];
        // 关联第三方用户表获取一级评论
        $data = $this
            ->select('comments.*', 'ou.name', 'ou.avatar', 'ou.is_admin')
            ->join('oauth_users as ou', 'comments.oauth_user_id', 'ou.id')
            ->where($map)
            ->orderBy('created_at', 'desc')
            ->get()
            ->toArray();
        foreach ($data as $k => $v) {
            $data[$k]['content'] = htmlspecialchars_decode($v['content']);
            // 获取二级评论
            $this->child = [];
            $this->getTree($v);
            $child = $this->child;
            if (!empty($child)) {
                // 按评论时间asc排序
                uasort($child, function ($a, $b) {
                    $prev = $a['created_at'] ?? 0;
                    $next = $b['created_at'] ?? 0;
                    if ($prev == $next) {
                        return 0;
                    }

                    return ($prev < $next) ? -1 : 1;
                });
                foreach ($child as $m => $n) {
                    // 获取被评论人id
                    $replyUserId = $this->where('id', $n['pid'])->pluck('oauth_user_id');
                    // 获取被评论人昵称
                    $oauthUserMap = [
                        'id' => $replyUserId,
                    ];
                    $child[$m]['reply_name'] = OauthUser::where($oauthUserMap)->value('name');
                }
            }
            $data[$k]['child'] = $child;
        }

        return $data;
    }

    // 递归获取树状结构
    public function getTree($data)
    {
        $map = [
            'pid' => $data['id'],
        ];
        $child = $this
            ->select('comments.*', 'ou.name', 'ou.avatar', 'ou.is_admin')
            ->join('oauth_users as ou', 'comments.oauth_user_id', 'ou.id', 'ou.is_admin')
            ->where($map)
            ->orderBy('created_at', 'desc')
            ->get()
            ->toArray();

        if (!empty($child)) {
            foreach ($child as $k => $v) {
                $v['content']  = htmlspecialchars_decode($v['content']);
                $this->child[] = $v;
                $this->getTree($v);
            }
        }
    }
}
