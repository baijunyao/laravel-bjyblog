<?php

namespace Tests\Feature;

use App\Models\User;
use Exception;
use App\Models\OauthUser;

abstract class TestCase extends \Tests\TestCase
{
    protected const ADMIN_USER_ID = 1;
    protected const OAUTH_USER_ID = 1;
    protected $urlPrefix = '';
    protected $table = '';
    protected $editId = 1;
    protected $updateId = 1;
    protected $destroyId = 1;
    protected $restoreId = 2;
    protected $forceDeleteId = 2;
    protected $storeData = [];
    protected $updateData = [];

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
