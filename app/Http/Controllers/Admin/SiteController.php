<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\Store;
use App\Models\Site;
use Cache;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $site = Site::orderBy('sort')
            ->withTrashed()
            ->get();
        $assign = compact('site');

        return view('admin.site.index', $assign);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.site.create');
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
        $data = $request->except('_token');
        if (empty($data['sort'])) {
            // 获取序号
            $sort         = Site::orderBy('sort', 'desc')->value('sort');
            $data['sort'] = (int) $sort + 1;
        }
        Site::create($data);

        return redirect('admin/site/index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
        $site   = Site::find($id);
        $assign = compact('site');

        return view('admin.site.edit', $assign);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Site::find($id)->update($request->except('_token'));

        return redirect()->back();
    }

    /**
     * 排序
     *
     * @param Request $request
     * @param Site    $siteModel
     *
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Site::destroy($id);

        return redirect()->back();
    }

    /**
     * 恢复删除
     *
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function restore($id)
    {
        Site::onlyTrashed()->find($id)->restore();

        return redirect('admin/site/index');
    }

    /**
     * 彻底删除
     *
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function forceDelete($id)
    {
        Site::onlyTrashed()->find($id)->forceDelete();

        return redirect('admin/site/index');
    }
}
