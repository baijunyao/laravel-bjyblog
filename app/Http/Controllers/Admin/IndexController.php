<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App;
use App\Http\Controllers\Controller;
use App\Models\SocialiteUser;
use Auth;
use Composer\Semver\Comparator;
use DB;

/**
 * @deprecated This will be removed.
 */
class IndexController extends Controller
{
    public function index()
    {
        // 最新登录的5个用户
        $socialite_users = SocialiteUser::select('name', 'avatar', 'login_times', 'updated_at')
            ->orderBy('updated_at', 'desc')
            ->limit(5)
            ->get();
        $version     = [
            'system'    => PHP_OS,
            'webServer' => $_SERVER['SERVER_SOFTWARE'] ?? '',
            'php'       => PHP_VERSION,
            'mysql'     => DB::connection()->getPdo()->query('SELECT VERSION();')->fetchColumn(),
        ];
        $assign = compact('socialite_users', 'version');

        return view('admin.index.index', $assign);
    }

    public function upgrade()
    {
        $data = file_get_contents('https://gitee.com/baijunyao/laravel-bjyblog/raw/master/config/bjyblog.php');
        preg_match('/v\d+(\.\d+){2,}/', $data, $version);
        $new_version = $version[0];
        $old_version = config('bjyblog.version');

        if (Comparator::greaterThan($new_version, $old_version)) {
            return redirect('https://baijunyao.com/docs/laravel-bjyblog/更新记录.html');
        } else {
            flash_error('没有需要更新的版本');

            return redirect(url('admin/index/index'));
        }
    }

    public function loginUserForTest()
    {
        if (!App::environment('local')) {
            flash_error('For local testing only.');

            return redirect(url('admin/index/index'));
        }

        Auth::guard('socialite')->loginUsingId(1);

        return redirect(url('/'));
    }
}
