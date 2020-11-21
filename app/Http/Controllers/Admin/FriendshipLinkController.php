<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FriendshipLink\Store;
use App\Models\FriendshipLink;
use Cache;
use Illuminate\Http\Request;

class FriendshipLinkController extends Controller
{
    public function index()
    {
        $data = FriendshipLink::withTrashed()
            ->orderByRaw('sort is null,sort')
            ->get();
        $assign = compact('data');

        return view('admin.friendshipLink.index', $assign);
    }

    public function create()
    {
        return view('admin.friendshipLink.create');
    }

    public function store(Store $request)
    {
        FriendshipLink::create($request->except('_token'));

        return redirect(url('admin/friendshipLink/index'));
    }

    public function edit($id)
    {
        $data   = FriendshipLink::withTrashed()->find($id);
        $assign = compact('data');

        return view('admin.friendshipLink.edit', $assign);
    }

    public function update(Store $request, $id)
    {
        $friendshipLink = $request->except('_token');

        if (isset($friendshipLink['sort']) && empty($friendshipLink['sort'])) {
            $friendshipLink['sort'] = null;
        }

        FriendshipLink::withTrashed()->find($id)->update($friendshipLink);

        return redirect()->back();
    }

    public function sort(Request $request, FriendshipLink $friendshipLinkModel)
    {
        $data     = $request->except('_token');
        $editData = [];
        foreach ($data as $k => $v) {
            $editData[] = [
                'id'   => $k,
                'sort' => $v,
            ];
        }
        $result = $friendshipLinkModel->updateBatch($editData);
        if ($result) {
            // 更新缓存
            Cache::forget('common:friendshipLink');
        }

        return redirect()->back();
    }

    public function destroy($id)
    {
        FriendshipLink::destroy($id);

        return redirect()->back();
    }

    public function restore($id)
    {
        FriendshipLink::onlyTrashed()->find($id)->restore();

        return redirect(url('admin/friendshipLink/index'));
    }

    public function forceDelete($id)
    {
        FriendshipLink::onlyTrashed()->find($id)->forceDelete();

        return redirect(url('admin/friendshipLink/index'));
    }
}
