<?php

namespace Tests\Feature;

use App\Models\OauthUser;
use App\Models\User;
use Exception;

abstract class TestCase extends \Tests\TestCase
{
    protected const ADMIN_USER_ID         = 1;
    protected const OAUTH_USER_ID         = 1;
    protected const STORE_SUCCESS_MESSAGE = [
        'laravel-flash' => [
            [
                'alert-message' => '添加成功',
                'alert-type'    => 'success',
            ],
        ],
    ];
    protected const UPDATE_SUCCESS_MESSAGE = [
        'laravel-flash' => [
            [
                'alert-message' => '修改成功',
                'alert-type'    => 'success',
            ],
        ],
    ];
    protected const DESTROY_SUCCESS_MESSAGE = [
        'laravel-flash' => [
            [
                'alert-message' => '删除成功',
                'alert-type'    => 'success',
            ],
        ],
    ];
    protected const RESTORE_SUCCESS_MESSAGE = [
        'laravel-flash' => [
            [
                'alert-message' => '恢复成功',
                'alert-type'    => 'success',
            ],
        ],
    ];
    protected const FORCE_DELETE_SUCCESS_MESSAGE = [
        'laravel-flash' => [
            [
                'alert-message' => '彻底删除成功',
                'alert-type'    => 'success',
            ],
        ],
    ];
    protected $urlPrefix          = '';
    protected $table              = '';
    protected $editId             = 1;
    protected $updateId           = 1;
    protected $destroyId          = 1;
    protected $restoreId          = 2;
    protected $forceDeleteId      = 2;
    protected $storeData          = [];
    protected $updateData         = [];

    public function loginByUserId($userId, $guard = 'oauth')
    {
        if ($guard === 'oauth') {
            $user = OauthUser::find($userId);
        } elseif ($guard === 'admin') {
            $user = User::find($userId);
        } else {
            throw new Exception('不支持的 ' . $guard . ' 这种 guard 类型');
        }

        return $this->actingAs($user, $guard);
    }
}
