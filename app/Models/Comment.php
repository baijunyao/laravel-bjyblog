<?php

namespace App\Models;

class Comment extends Base
{

    protected $guarded = [];

    private $child = [];

    /**
     * 获取最新评论
     *
     * @return mixed
     */
    public function getNewData()
    {
        $data = $this->select('comments.content', 'comments.created_at', 'ou.name', 'ou.avatar', 'a.title', 'a.id as article_id')
            ->join('articles as a', 'comments.article_id', 'a.id')
            ->join('oauth_users as ou', 'ou.id', 'comments.oauth_user_id')
            ->orderBy('comments.created_at', 'desc')
            ->where('ou.is_admin', '<>', 1)
            ->limit(20)
            ->get();
        foreach ($data as $k => $v) {
            // 截取文章标题
            $data[$k]->title = reSubstr($v->title, 0, 20);
            // 处理有表情时直接截取会把img表情截断的问题
            $content = strip_tags(htmlspecialchars_decode($v->content));
            if (mb_strlen($content) > 10) {
                $data[$k]->content = reSubstr($content,0,40);
            }else{
                $data[$k]->content = htmlspecialchars_decode($v->content);
            }
        }
        return $data;
    }
    

    public function getDataByArticleId($article_id){
        $map = [
            'article_id' => $article_id,
            'comments.pid' => 0
        ];
        // 关联第三方用户表获取一级评论
        $data=$this
            ->select('comments.*', 'ou.name', 'ou.avatar')
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
            if(!empty($child)){
                // 按评论时间asc排序
                uasort($child, function ($a, $b) {
                    $prev = isset($a['created_at']) ? $a['created_at'] : 0;
                    $next = isset($b['created_at']) ? $b['created_at'] : 0;
                    if($prev == $next)return 0;
                    return ($prev < $next) ? -1 : 1;
                });
                foreach ($child as $m => $n) {
                    // 获取被评论人id
                    $replyUserId = $this->where('id', $n['pid'])->pluck('oauth_user_id');
                    // 获取被评论人昵称
                    $oauthUserMap = [
                        'id' => $replyUserId
                    ];
                    $child[$m]['reply_name'] = OauthUser::where($oauthUserMap)->value('name');
                }
            }
            $data[$k]['child'] = $child;
        }
        return $data;
    }

    // 递归获取树状结构
    public function getTree($data){
        $map = [
            'pid' => $data['id']
        ];
        $child=$this
            ->select('comments.*', 'ou.name', 'ou.avatar')
            ->join('oauth_users as ou', 'comments.oauth_user_id', 'ou.id')
            ->where($map)
            ->orderBy('created_at', 'desc')
            ->get()
            ->toArray();

        if(!empty($child)){
            foreach ($child as $k => $v) {
                $v['content'] = htmlspecialchars_decode($v['content']);
                $this->child[] = $v;
                $this->getTree($v);
            }
        }

    }


}
