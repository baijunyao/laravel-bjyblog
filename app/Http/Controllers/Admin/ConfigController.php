<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Config;
use Artisan;
use Baijunyao\LaravelUpload\Upload;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function edit()
    {
        return view('admin.config.edit');
    }

    public function email()
    {
        return view('admin.config.email');
    }

    public function socialite()
    {
        return view('admin.config.socialite');
    }

    public function qqQun()
    {
        return view('admin.config.qqQun');
    }

    public function backup()
    {
        return view('admin.config.backup');
    }

    public function seo()
    {
        return view('admin.config.seo');
    }

    public function search()
    {
        return view('admin.config.search');
    }

    public function socialShare()
    {
        return view('admin.config.socialShare');
    }

    public function socialLinks()
    {
        return view('admin.config.socialLinks');
    }

    public function commentAudit()
    {
        return view('admin.config.commentAudit');
    }

    public function update(Request $request)
    {
        $configs = $request->except('_token');

        if ($request->hasFile('153')) {
            $file           = Upload::file('153', 'uploads/images', [], false);
            $result         = $file['status_code'] === 200 ? $file['data'][0]['path'] : '';
            $configs['153'] = $result;
        }

        if (isset($configs['165']) && empty($configs['164'])) {
            $configs['164'] = [];
        }

        foreach ($configs as $id => $config) {
            Config::find($id)->update([
                'value' => is_array($config) ? json_encode($config) : $config,
            ]);
        }

        return redirect()->back();
    }

    public function clear()
    {
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('route:clear');
        Artisan::call('view:clear');
        Artisan::call('clear-compiled');
        Artisan::call('modelCache:clear');
        flash_success('操作成功');

        return redirect()->back();
    }
}
