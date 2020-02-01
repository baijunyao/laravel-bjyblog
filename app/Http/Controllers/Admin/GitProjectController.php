<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GitProject\Store;
use App\Models\GitProject;
use Cache;
use Illuminate\Http\Request;

class GitProjectController extends Controller
{
    public function index()
    {
        $data = GitProject::withTrashed()
            ->orderBy('sort')
            ->get();
        $gitProjectType = [
            1 => 'github',
            2 => 'gitee',
        ];
        $assign = compact('data', 'gitProjectType');

        return view('admin.gitProject.index', $assign);
    }

    public function create()
    {
        return view('admin.gitProject.create');
    }

    public function store(Store $request)
    {
        GitProject::create($request->except('_token'));

        return redirect('admin/gitProject/index');
    }

    public function edit($id)
    {
        $data   = GitProject::withTrashed()->find($id);
        $assign = compact('data');

        return view('admin.gitProject.edit', $assign);
    }

    public function update(Request $request, $id)
    {
        GitProject::withTrashed()->find($id)->update($request->except('_token'));

        return redirect()->back();
    }

    public function sort(Request $request, GitProject $gitProjectModel)
    {
        $data     = $request->except('_token');
        $editData = [];
        foreach ($data as $k => $v) {
            $editData[] = [
                'id'   => $k,
                'sort' => $v,
            ];
        }
        $result = $gitProjectModel->updateBatch($editData);
        if ($result) {
            // 更新缓存
            Cache::forget('common:gitProject');
        }

        return redirect()->back();
    }

    public function destroy($id)
    {
        GitProject::destroy($id);

        return redirect()->back();
    }

    public function restore($id)
    {
        GitProject::onlyTrashed()->find($id)->restore();

        return redirect('admin/gitProject/index');
    }

    public function forceDelete($id)
    {
        GitProject::onlyTrashed()->find($id)->forceDelete();

        return redirect('admin/gitProject/index');
    }
}
