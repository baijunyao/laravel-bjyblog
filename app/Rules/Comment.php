<?php

namespace App\Rules;

use App\Models\Comment as CommentModel;
use Illuminate\Contracts\Validation\Rule;

class Comment implements Rule
{
    private $message;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed  $value
     *
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // 过滤无意义评论
        if (ctype_alnum($value) || in_array($value, ['test', '测试'])) {
            $this->message = '禁止无意义评论';

            return false;
        }
        $commentModel    = new CommentModel();
        if (empty($commentModel->imageToUbb($value))) {
            $this->message = '内容不能为空';

            return false;
        }
        // 获取用户id
        $userId = auth()->guard('oauth')->user()->id;
        // 是否是管理员
        $isAdmin = auth()->guard('oauth')->user()->is_admin;
        // 获取当前时间戳
        $time = time();
        // 获取最近一次评论时间
        $lastCommentDate = $commentModel->where('oauth_user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->value('created_at');
        $lastCommentTime = strtotime($lastCommentDate);
        // 限制1分钟内只许评论1次
        if ($isAdmin != 1 && $time - $lastCommentTime < 60) {
            $this->message = '评论太过频繁,请稍后再试.';

            return false;
        }
        // 限制用户每天最多评论10条
        $date  = date('Y-m-d', $time);
        $count = $commentModel
            ->where('oauth_user_id', auth()->guard('oauth')->user()->id)
            ->whereBetween('created_at', [$date . ' 00:00:00', $date . ' 23:59:59'])
            ->count();
        if ($isAdmin != 1 && $count > 10) {
            $this->message = '评论已被限制.';

            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->message;
    }
}
