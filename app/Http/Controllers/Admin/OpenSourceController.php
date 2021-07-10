<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OpenSource\Store;
use App\Models\OpenSource;
use Cache;
use Illuminate\Http\Request;

/**
 * @deprecated This will be removed.
 */
class OpenSourceController extends Controller
{
    public function index()
    {
        $data = OpenSource::withTrashed()
            ->orderBy('sort')
            ->get();
        $open_source_type = [
            1 => 'github',
            2 => 'gitee',
        ];
        $assign = compact('data', 'open_source_type');

        return view('admin.openSource.index', $assign);
    }

    public function create()
    {
        return view('admin.openSource.create');
    }

    public function store(Store $request)
    {
        OpenSource::create($request->except('_token'));

        return redirect(url('admin/openSource/index'));
    }

    public function edit($id)
    {
        $data   = OpenSource::withTrashed()->where('id', $id)->firstOrFail();
        $assign = compact('data');

        return view('admin.openSource.edit', $assign);
    }

    public function update(Request $request, $id)
    {
        OpenSource::withTrashed()->where('id', $id)->firstOrFail()->update($request->except('_token'));

        return redirect()->back();
    }

    public function sort(Request $request, OpenSource $openSourceModel)
    {
        $data     = $request->except('_token');
        $editData = [];
        foreach ($data as $k => $v) {
            $editData[] = [
                'id'   => $k,
                'sort' => $v,
            ];
        }
        $result = $openSourceModel->updateBatch($editData);
        if ($result) {
            // 更新缓存
            Cache::forget('common:openSource');
        }

        return redirect()->back();
    }

    public function destroy($id)
    {
        OpenSource::destroy($id);

        return redirect()->back();
    }

    public function restore($id)
    {
        OpenSource::onlyTrashed()->where('id', $id)->firstOrFail()->restore();

        return redirect(url('admin/openSource/index'));
    }

    public function forceDelete($id)
    {
        OpenSource::onlyTrashed()->where('id', $id)->firstOrFail()->forceDelete();

        return redirect(url('admin/openSource/index'));
    }
}
