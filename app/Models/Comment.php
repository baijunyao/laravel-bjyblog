<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Comment
 *
 * @property int    $id                主键id
 * @property int    $socialite_user_id 评论用户id
 * @property bool   $type              1：文章评论
 * @property int    $pid               父级id
 * @property int    $article_id        文章id
 * @property string $content           内容
 * @property bool   $status            1:已审核 0：未审核
 *
 * @author  hanmeimei
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

    /**
     * @param $value
     *
     * @author hanmeimei
     */
    public function setContentAttribute($value)
    {
        $this->attributes['content'] = $this->imageToUbb($value);
    }

    /**
     * 关联文章
     *
     * @return BelongsTo
     */
    public function article()
    {
        return $this->belongsTo(Article::class)->withDefault();
    }

    /**
     * 关联第三方用户
     *
     * @return BelongsTo
     */
    public function socialiteUser()
    {
        return $this->belongsTo(SocialiteUser::class)->withDefault();
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
        $data = $this->select('comments.*', 'ou.name', 'ou.avatar', 'ou.is_admin')
            ->join('socialite_users as ou', 'comments.socialite_user_id', 'ou.id')
            ->where($map)
            ->orderBy('created_at', 'desc')
            ->get()
            ->toArray();

        foreach ($data as $k => $v) {
            $data[$k]['content'] = htmlspecialchars_decode($v['content']);

            // 获取二级评论
            $this->child = [];
            $this->getTree($v);

            if (!empty($child = $this->child)) {
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
                    $replyUserId = $this->where('id', $n['pid'])->pluck('socialite_user_id');

                    // 获取被评论人昵称
                    $child[$m]['reply_name'] = SocialiteUser::where([
                        'id' => $replyUserId,
                    ])->value('name');
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
            ->join('socialite_users as ou', 'comments.socialite_user_id', 'ou.id', 'ou.is_admin')
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
