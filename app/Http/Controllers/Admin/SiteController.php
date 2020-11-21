<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\Store;
use App\Models\Site;
use Cache;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $site = Site::withTrashed()
            ->orderBy('sort')
            ->get();
        $assign = compact('site');

        return view('admin.site.index', $assign);
    }

    public function create()
    {
        return view('admin.site.create');
    }

    public function store(Store $request)
    {
        $data = $request->except('_token');
        if (empty($data['sort'])) {
            // 获取序号
            $sort         = Site::orderBy('sort', 'desc')->value('sort');
            $data['sort'] = (int) $sort + 1;
        }
        Site::create($data);

        return redirect(url('admin/site/index'));
    }

    public function edit($id)
    {
        $site   = Site::withTrashed()->find($id);
        $assign = compact('site');

        return view('admin.site.edit', $assign);
    }

    public function update(Request $request, $id)
    {
        Site::withTrashed()->find($id)->update($request->except('_token'));

        return redirect()->back();
    }

    public function sort(Request $request, Site $siteModel)
    {
        $data     = $request->except('_token');
        $editData = [];
        foreach ($data as $k => $v) {
            $editData[] = [
                'id'   => $k,
                'sort' => $v,
            ];
        }
        $result = $siteModel->updateBatch($editData);
        if ($result) {
            // 更新缓存
            Cache::forget('home:site');
        }

        return redirect()->back();
    }

    public function destroy($id)
    {
        Site::destroy($id);

        return redirect()->back();
    }

    public function restore($id)
    {
        Site::onlyTrashed()->find($id)->restore();

        return redirect(url('admin/site/index'));
    }

    public function forceDelete($id)
    {
        Site::onlyTrashed()->find($id)->forceDelete();

        return redirect(url('admin/site/index'));
    }
}
