<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Models\OauthUser;
use Socialite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OAuthController extends Controller
{
    /**
     * oauth跳转
     *
     * @param Request $request
     * @param $service
     * @return mixed
     */
    public function redirectToProvider(Request $request, $service)
    {
        // 记录登录前的url
        $data = [
            'targetUrl' => $_SERVER['HTTP_REFERER']
        ];
        session($data);
        return Socialite::driver($service)->redirect();
    }

    /**
     * 获取用户资料并登录
     *
     * @param Request $request
     * @param OauthUser $oauthUserModel
     * @param $service
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handleProviderCallback(Request $request, OauthUser $oauthUserModel, $service)
    {
        // 定义各种第三方登录的type对应的数字
        $type = [
            'qq' => 1,
            'weibo' => 2,
            'github' => 3
        ];
        // 获取用户资料
        $user = Socialite::driver($service)->user();

        // 组合存入session中的值
        $sessionData = [
            'user' => [
                'name' => $user->nickname,
                'type' => $type[$service],
            ]
        ];
        // 查找此用户是否已经登录过
        $countMap = [
            'type' => $type[$service],
            'openid' => $user->id
        ];
        $oldUserData = $oauthUserModel->select('id', 'login_times', 'is_admin', 'email')
            ->where($countMap)
            ->first();
        // 如果已经存在;则更新用户资料  如果不存在;则插入数据
        if ($oldUserData) {
            $userId = $oldUserData->id;
            $editMap = [
                'id' => $userId
            ];
            $editData = [
                'name' => $user->nickname,
                'access_token' => $user->token,
                'last_login_ip' => $request->getClientIp(),
                'login_times' => $oldUserData->login_times+1,
            ];
            // 更新数据
            $oauthUserModel->updateData($editMap, $editData);
            // 组合session中要用到的数据
            $sessionData['user']['id'] = $userId;
            $sessionData['user']['email'] = $oldUserData->email;
            $sessionData['user']['is_admin'] = $oldUserData->is_admin;
        } else {
            $data = [
                'type' => $type[$service],
                'name' => $user->nickname,
                'openid' => $user->id,
                'access_token' => $user->token,
                'last_login_ip' => $request->getClientIp(),
                'login_times' => 1,
                'is_admin' => 0,
                'email' => ''
            ];
            // 新增数据
            $userId = $oauthUserModel->storeData($data);
            // 组合头像地址
            $avatarPath = '/uploads/avatar/'.$userId.'.jpg';
            // 更新头像
            $editMap = [
                'id' => $userId
            ];
            $editData = [
                'avatar' => $avatarPath
            ];
            $oauthUserModel->updateData($editMap, $editData);
            // 组合session中要用到的数据
            $sessionData['user']['id'] = $userId;
            $sessionData['user']['email'] = '';
            $sessionData['user']['is_admin'] = 0;
        }
        // 下载最新的头像到本地
        $avatarContent = curl_get_contents($user->avatar);
        $avatarPath = public_path('uploads/avatar/'.$userId.'.jpg');
        // 如果下载失败；则使用默认图片
        if (empty($avatarContent)) {
            copy(public_path('uploads/avatar/default.jpg'), $avatarPath);
        } else {
            file_put_contents($avatarPath, $avatarContent);
        }
        $sessionData['user']['avatar'] = url('uploads/avatar/'.$userId.'.jpg');
        // 将数据存入session
        session($sessionData);
        // 如果session没有存储登录前的页面;则直接返回到首页
        return redirect(session('targetUrl', url('/')));
    }

    /**
     * 退出登录
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout();
        session()->forget('user');
        return redirect()->back();
    }
}
