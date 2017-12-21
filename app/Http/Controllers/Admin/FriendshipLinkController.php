<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Http\Requests\FriendshipLink\Store;
use App\Models\FriendshipLink;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cache;

class FriendshipLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = FriendshipLink::orderBy(DB::raw('sort is null,sort'))
            ->withTrashed()
            ->get();
        $assign = compact('data');
        return view('admin.friendshipLink.index', $assign);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.friendshipLink.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request, FriendshipLink $friendshipLinkModel)
    {
        $data = $request->except('_token');
        $result = $friendshipLinkModel->storeData($data);
        if ($result) {
            // 更新缓存
            Cache::forget('common:friendshipLink');
        }
        return redirect('admin/friendshipLink/index');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = FriendshipLink::find($id);
        $assign = compact('data');
        return view('admin.friendshipLink.edit', $assign);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Store $request, $id, FriendshipLink $friendshipLinkModel)
    {
        $map = [
            'id' => $id
        ];
        $data = $request->except('_token');
        $result = $friendshipLinkModel->updateData($map, $data);
        if ($result) {
            // 更新缓存
            Cache::forget('common:friendshipLink');
        }
        return redirect()->back();
    }

    /**
     * 排序
     *
     * @param Request $request
     * @param FriendshipLink $friendshipLinkModel
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sort(Request $request, FriendshipLink $friendshipLinkModel)
    {
        $data = $request->except('_token');
        $editData = [];
        foreach ($data as $k => $v) {
            $editData[] = [
                'id' => $k,
                'sort' => $v
            ];
        }
        $result = $friendshipLinkModel->updateBatch($editData);
        if ($result) {
            // 更新缓存
            Cache::forget('common:friendshipLink');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, FriendshipLink $friendshipLinkModel)
    {
        $map = [
            'id' => $id
        ];
        $result = $friendshipLinkModel->destroyData($map);
        if ($result) {
            // 更新缓存
            Cache::forget('common:friendshipLink');
        }
        return redirect()->back();
    }

    /**
     * 恢复删除的友情链接
     *
     * @param                $id
     * @param FriendshipLink $friendshipLinkModel
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function restore($id, FriendshipLink $friendshipLinkModel)
    {
        $result = $friendshipLinkModel->where('id', $id)->restore();
        if ($result) {
            // 更新缓存
            Cache::forget('common:friendshipLink');
        }
        return redirect('admin/friendshipLink/index');
    }

    /**
     * 彻底删除友情链接
     *
     * @param                $id
     * @param FriendshipLink $friendshipLinkModel
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function forceDelete($id, FriendshipLink $friendshipLinkModel)
    {
        $friendshipLinkModel->where('id', $id)->forceDelete();
        return redirect('admin/friendshipLink/index');
    }
}
