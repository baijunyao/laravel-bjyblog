<?php

namespace App\Http\Controllers\Hook;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OschinaController extends Controller
{
    /**
     * 接受git push 后的hook事件
     */
    public function push()
    {
        $data = request()->all();
        if ($data['password'] === env('OSCHINA_HOOK_PASSWORD')) {
            // 拉取并 composer update
            shell_exec('cd '.base_path().' && git pull && composer install');
        }
    }
}