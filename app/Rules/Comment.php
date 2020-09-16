<?php

declare(strict_types=1);

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
            $this->message = translate('No meaningless comments');

            return false;
        }

        $commentModel = new CommentModel();

        if (empty($commentModel->imageToUbb($value))) {
            $this->message = translate('The content can not be empty');

            return false;
        }

        /** @var \App\Models\SocialiteUser $socialiteUser */
        $socialiteUser = auth()->guard('socialite')->user();

        if ($socialiteUser->is_blocked === 1) {
            $this->message = translate('User is forbidden to comment');

            return false;
        }

        /** @var \Illuminate\Support\Carbon|null $lastCommentDate */
        $lastCommentDate = $commentModel->where('socialite_user_id', $socialiteUser->id)
            ->orderBy('created_at', 'desc')
            ->value('created_at');

        if ($socialiteUser->is_admin !== 1 && $lastCommentDate !== null && $lastCommentDate->diffInMinutes() === 0) {
            $this->message = translate('Comments are too frequent, please try again later.');

            return false;
        }

        $count = $commentModel
            ->where('socialite_user_id', $socialiteUser->id)
            ->whereDate('created_at', '=', Date::today())
            ->count();

        if ($socialiteUser->is_admin !== 1 && $count > 10) {
            $this->message = translate('Comments have been restricted');

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
