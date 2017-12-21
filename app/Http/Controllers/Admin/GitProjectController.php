<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\GitProject\Store;
use App\Models\GitProject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cache;

class GitProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = GitProject::orderBy('sort')
            ->withTrashed()
            ->get();
        $gitProjectType = [
            1 => 'github',
            2 => 'gitee'
        ];
        $assign = compact('data', 'gitProjectType');
        return view('admin.gitProject.index', $assign);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gitProject.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request, GitProject $gitProjectModel)
    {
        $data = $request->except('_token');
        $result = $gitProjectModel->storeData($data);
        if ($result) {
            // 更新缓存
            Cache::forget('common:gitProject');
        }
        return redirect('admin/gitProject/index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = GitProject::find($id);
        $assign = compact('data');
        return view('admin.gitProject.edit', $assign);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, GitProject $gitProjectModel)
    {
        $data = $request->except('_token');
        $map = [
            'id' => $id
        ];
        $result = $gitProjectModel->updateData($map, $data);
        if ($result) {
            // 更新缓存
            Cache::forget('common:gitProject');
        }
        return redirect()->back();
    }

    /**
     * 排序
     *
     * @param Request    $request
     * @param GitProject $gitProjectModel
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sort(Request $request, GitProject $gitProjectModel)
    {
        $data = $request->except('_token');
        $editData = [];
        foreach ($data as $k => $v) {
            $editData[] = [
                'id' => $k,
                'sort' => $v
            ];
        }
        $result = $gitProjectModel->updateBatch($editData);
        if ($result) {
            // 更新缓存
            Cache::forget('common:gitProject');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, GitProject $gitProjectModel)
    {
        $map = [
            'id' => $id
        ];
        $result = $gitProjectModel->destroyData($map);
        if ($result) {
            // 更新缓存
            Cache::forget('common:gitProject');
        }
        return redirect()->back();
    }

    /**
     * 恢复删除的开源项目
     *
     * @param            $id
     * @param GitProject $gitProjectModel
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function restore($id, GitProject $gitProjectModel)
    {
        $result = $gitProjectModel->where('id', $id)->restore();
        if ($result) {
            // 更新缓存
            Cache::forget('common:gitProject');
        }
        return redirect('admin/gitProject/index');
    }

    /**
     * 彻底删除开源项目
     *
     * @param            $id
     * @param GitProject $gitProjectModel
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function forceDelete($id, GitProject $gitProjectModel)
    {
        $gitProjectModel->where('id', $id)->forceDelete();
        return redirect('admin/gitProject/index');
    }
}
