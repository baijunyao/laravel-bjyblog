<?php

namespace App\Http\Controllers\Auth;

use App\Models\OauthUser;
use Socialite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function redirectToProvider(Request $request, $service)
    {
        return Socialite::driver($service)->redirect();
    }

    public function handleProviderCallback(Request $request, OauthUser $oauthUserModel, $service)
    {
        $type = [
            'qq' => 1,
            'weibo' => 2,
            'github' => 3
        ];
        $user = Socialite::driver($service)->user();
        $countMap = [
            'type' => $type[$service],
            'openid' => $user->id
        ];
        $count = $oauthUserModel->where($countMap)->count();
        p($count);die;

    }
}
