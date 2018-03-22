<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Models\Article;
use App\Models\Chat;
use App\Models\Comment;
use App\Models\OauthUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\PhpExecutableFinder;
use Artisan;

class IndexController extends Controller
{
    /**
     * 后台首页
     *
     * @return mixed
     */
    public function index(Comment $commentModel)
    {
        // 文章总数
        $articleCount = Article::count('id');
        // 评论总数
        $commentCount = Comment::count('id');
        // 随言碎语总数
        $chatCount = Chat::count('id');
        // 用户总数
        $oauthUserCount = OauthUser::count('id');
        // 最新登录的5个用户
        $oauthUserData = OauthUser::select('name', 'avatar', 'login_times', 'updated_at')
            ->orderBy('updated_at', 'desc')
            ->limit(5)
            ->get();
        // 最新的5条评论
        $commentData = $commentModel->getNewData(5);
        $version = [
            'system' => PHP_OS,
            'webServer' => $_SERVER['SERVER_SOFTWARE'],
            'php' => PHP_VERSION,
            'mysql' => DB::select('SHOW VARIABLES LIKE "version"')[0]->Value
        ];
        $assign = compact('articleCount', 'commentCount', 'chatCount', 'oauthUserCount', 'oauthUserData', 'commentData', 'version');
        return view('admin.index.index', $assign);
    }

    /**
     * 更新代码
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function upgrade()
    {
        $data = file_get_contents('https://gitee.com/shuaibai123/laravel-bjyblog/raw/master/config/bjyblog.php');
        preg_match("/\d+(\.\d+){3}/", $data, $version);
        $newVersion = str_replace('.', '', $version[0]);
        $oldVersion = str_replace(['v', '.'], '', config('bjyblog.version'));
        if ($newVersion <= $oldVersion) {
            flash_error('没有需要更新的版本');
            return redirect()->back();
        }
        // 进入项目根目录
        $basePath = base_path();
        chdir($basePath);
        // 获取 php 命令目录
        $phpBinPath = dirname((new PhpExecutableFinder)->find());
        $command = <<<php
git pull
export PATH=\$PATH:$phpBinPath
composer install --no-dev
php;
        // 拉取代码 执行 composer install
        $process = new Process($command);
        $process->run();
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
        dump($process->getOutput());

        // 执行迁移
        Artisan::call('migrate', [
            '--force' => true,
        ]);

        // 清空缓存
        Artisan::call('cache:clear');
    }

}
