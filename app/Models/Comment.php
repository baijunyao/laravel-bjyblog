<?php

namespace App\Models;

class Comment extends Base
{
    /**
     * 不允许被批量赋值的属性
     *
     * @var array
     */
    protected $guarded = [];

    // 用于递归
    private $child = [];

    public function addData($data)
    {
        $user_id = session('user.id');
        $name = session('user.name');

        $isAdmin = OauthUser::where('id', $user_id)->value('is_admin');

        $data['content'] = htmlspecialchars_decode($data['content']);
        $data['content'] = preg_replace('/on.+\".+\"/i', '', $data['content']);
        // 删除除img外的其他标签
        $comment_content = trim(strip_tags($data['content'],'<img>'));
        $content = htmlspecialchars($comment_content);
        if (empty($content)) {
            return false;
        }
        $comment = array(
            'oauth_user_id' => $user_id,
            'type' => 1,
            'article_id' => $data['article_id'],
            'pid' => $data['pid'],
            'content' => $content,
            'status' => 1
        );

        // 添加数据
        $id = $this
            ->create($comment)
            ->id;
        if ($id) {
            session()->flash('alert-message','添加成功');
            session()->flash('alert-class','alert-success');
        }else{
            return false;
        }

        // 给站长发送通知邮件
        if(C('COMMENT_SEND_EMAIL') && $isAdmin == 0){
            $address=C('EMAIL_RECEIVE');
            if(!empty($address)){
                $title = M('Article')->getFieldByAid($data['aid'],'title');
                $url = U('Home/Index/article',array('aid'=>$data['aid']),'',true);
                $date = date('Y-m-d H:i:s');
                $content=<<<html
站长你好：<br>
&emsp; $name $date 评论了您的文章 <a href="$url">$title</a> 内容如下:<br>
$comment_content

html;
                send_email($address,$name.'评论了 '.$title,$content);
            }
        }
        // 给用户发送邮件通知
        if (C('COMMENT_SEND_EMAIL') && $data['pid']!=0) {
            $parent_uid=$this->getFieldByCmtid($data['pid'],'ouid');
            $parent_data=M('Oauth_user')->field('nickname,email')->find($parent_uid);
            $parent_address=$parent_data['email'];
            if (!empty($parent_address)) {
                $parent_name=$parent_data['nickname'];
                $title=M('Article')->getFieldByAid($data['aid'],'title');
                $url=U('Home/Index/article',array('aid'=>$data['aid']),'',true);
                $date=date('Y-m-d H:i:s');
                $parent_content=<<<html
$parent_name 你好：<br>
&emsp; $name $date 回复了您对 <a href="$url">$title</a> 的评论  内容如下:<br>
$comment_content

html;
                send_email($parent_address,$name.'回复了 '.$title,$parent_content);
            }

        }
        return $id;
    }

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

    /**
     * 通过文章id获取评论数据
     *
     * @param $article_id
     * @return mixed
     */
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
