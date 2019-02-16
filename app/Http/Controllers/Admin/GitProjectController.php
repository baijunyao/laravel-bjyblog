<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GitProject\Store;
use App\Models\GitProject;
use Cache;
use Illuminate\Http\Request;

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
            2 => 'gitee',
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
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        GitProject::create($request->except('_token'));

        return redirect('admin/gitProject/index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data   = GitProject::find($id);
        $assign = compact('data');

        return view('admin.gitProject.edit', $assign);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, GitProject $gitProjectModel)
    {
        GitProject::find($id)->update($request->except('_token'));

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

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        GitProject::destroy($id);

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
    public function restore($id)
    {
        GitProject::onlyTrashed()->find($id)->restore();

        return redirect('admin/gitProject/index');
    }

    /**
     * 彻底删除开源项目
     *
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function forceDelete($id)
    {
        GitProject::onlyTrashed()->find($id)->forceDelete();

        return redirect('admin/gitProject/index');
    }
}
