<?php

namespace App\Rules;

use App\Models\Comment as CommentModel;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Date;

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
        if (in_array($value, ['test', '测试'])) {
            $this->message = '禁止无意义评论';

            return false;
        }

        $commentModel = new CommentModel();
        if (empty($commentModel->imageToUbb($value))) {
            $this->message = '内容不能为空';

            return false;
        }

        $userId  = auth()->guard('socialite')->user()->id;
        $isAdmin = auth()->guard('socialite')->user()->is_admin;

        /** @var \Illuminate\Support\Carbon $lastCommentDate */
        $lastCommentDate = $commentModel->where('socialite_user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->value('created_at');

        if ($isAdmin !== 1 && $lastCommentDate->diffInMinutes() === 0) {
            $this->message = '评论太过频繁,请稍后再试.';

            return false;
        }

        $count = $commentModel
            ->where('socialite_user_id', $userId)
            ->whereDate('created_at', Date::today())
            ->count();

        if ($isAdmin !== 1 && $count > 10) {
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
