<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\SocialiteClient;
use App\Models\SocialiteUser;
use Auth;
use Exception;
use File;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Socialite;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use URL;

class SocialiteController extends Controller
{
    private Collection $socialiteClients;

    public function __construct(Request $request)
    {
        $this->socialiteClients = SocialiteClient::all();
        $service                = $request->route('service');

        if (!empty($service) && !$this->socialiteClients->pluck('name')->contains($service)) {
            throw new AccessDeniedHttpException('Disallowed socialite client.');
        }
    }

    public function redirectToProvider(string $service): RedirectResponse
    {
        session([
            'targetUrl' => URL::previous(),
        ]);

        return Socialite::driver($service)->redirect();
    }

    public function handleProviderCallback(Request $request, string $service): RedirectResponse
    {
        if ($request->has('code') === false) {
            abort(404);
        }

        // 定义各种第三方登录的type对应的数字
        $type = $this->socialiteClients->pluck('id', 'name');

        try {
            /** @var \Laravel\Socialite\Two\User $user */
            $user = Socialite::driver($service)->user();
        } catch (Exception $e) {
            app('sentry')->captureException($e);

            return redirect(url('/'));
        }

        $socialite_user = SocialiteUser::select('id', 'login_times', 'is_admin', 'email')
            ->where('socialite_client_id', $type->get($service))
            ->where('openid', $user->id)
            ->first();

        // 如果已经存在;则更新用户资料  如果不存在;则插入数据
        $name = $user->nickname ?? $user->name;

        if ($socialite_user !== null) {
            $user_id  = $socialite_user->id;

            // 更新数据
            SocialiteUser::where('id', $user_id)->update([
                'name'          => $name,
                'access_token'  => $user->token,
                'last_login_ip' => $request->getClientIp(),
                'login_times'   => $socialite_user->login_times + 1,
            ]);

            // 如果是管理员；则自动登录后台
            if ($socialite_user->is_admin) {
                Auth::guard('admin')->loginUsingId(1, true);
            }
        } else {
            $user_id = SocialiteUser::create([
                'socialite_client_id'          => $type->get($service),
                'name'                         => $name,
                'openid'                       => $user->id,
                'access_token'                 => $user->token,
                'last_login_ip'                => $request->getClientIp(),
                'login_times'                  => 1,
                'is_admin'                     => 0,
                'email'                        => (string) $user->email,
            ])->id;

            // 更新头像
            SocialiteUser::where('id', $user_id)->update([
                'avatar' => '/uploads/avatar/' . $user_id . '.jpg',
            ]);
        }

        $avatar_path = storage_path('app/public/uploads/avatar/' . $user_id . '.jpg');

        try {
            // 下载最新的头像到本地
            $client = new Client();
            $client->request('GET', $user->avatar, [
                'sink' => $avatar_path,
            ]);
        } catch (Exception $e) {
            // 如果下载失败；则使用默认图片

            if (!File::isDirectory(storage_path('app/public/uploads/avatar'))) {
                File::makeDirectory(storage_path('app/public/uploads/avatar'), 0755, true);
            }

            File::copy(public_path('images/default/avatar.jpg'), $avatar_path);
        }

        Auth::guard('socialite')->loginUsingId($user_id, true);
        // 如果session没有存储登录前的页面;则直接返回到首页
        return redirect(session('targetUrl', url('/')));
    }

    public function logout(): RedirectResponse
    {
        Auth::guard('socialite')->logout();
        Auth::guard('admin')->logout();

        return redirect()->back();
    }
}
