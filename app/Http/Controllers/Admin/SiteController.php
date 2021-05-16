<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\Store;
use App\Models\Site;
use Cache;
use Illuminate\Http\Request;

/**
 * @deprecated This will be removed.
 */
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
        Site::create($request->except('_token'));

        return redirect(url('admin/site/index'));
    }

    public function edit($id)
    {
        $site   = Site::withTrashed()->where('id', $id)->firstOrFail();
        $assign = compact('site');

        return view('admin.site.edit', $assign);
    }

    public function update(Request $request, $id)
    {
        Site::withTrashed()->where('id', $id)->firstOrFail()->update($request->except('_token'));

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
        Site::onlyTrashed()->where('id', $id)->firstOrFail()->restore();

        return redirect(url('admin/site/index'));
    }

    public function forceDelete($id)
    {
        Site::onlyTrashed()->where('id', $id)->firstOrFail()->forceDelete();

        return redirect(url('admin/site/index'));
    }
}
