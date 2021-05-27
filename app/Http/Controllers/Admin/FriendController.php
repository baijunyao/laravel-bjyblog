<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Friend\Store;
use App\Models\Friend;
use Cache;
use Illuminate\Http\Request;

/**
 * @deprecated This will be removed.
 */
class FriendController extends Controller
{
    public function index()
    {
        $data = Friend::withTrashed()
            ->orderByRaw('sort is null,sort')
            ->get();
        $assign = compact('data');

        return view('admin.friend.index', $assign);
    }

    public function create()
    {
        return view('admin.friend.create');
    }

    public function store(Store $request)
    {
        Friend::create($request->except('_token'));

        return redirect(url('admin/friend/index'));
    }

    public function edit($id)
    {
        $data   = Friend::withTrashed()->where('id', $id)->firstOrFail();
        $assign = compact('data');

        return view('admin.friend.edit', $assign);
    }

    public function update(Store $request, $id)
    {
        $friendshipLink = $request->except('_token');

        if (isset($friendshipLink['sort']) && empty($friendshipLink['sort'])) {
            $friendshipLink['sort'] = null;
        }

        Friend::withTrashed()->where('id', $id)->firstOrFail()->update($friendshipLink);

        return redirect()->back();
    }

    public function sort(Request $request, Friend $friendshipLinkModel)
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
            Cache::forget('common:friend');
        }

        return redirect()->back();
    }

    public function destroy($id)
    {
        Friend::destroy($id);

        return redirect()->back();
    }

    public function restore($id)
    {
        Friend::onlyTrashed()->where('id', $id)->firstOrFail()->restore();

        return redirect(url('admin/friend/index'));
    }

    public function forceDelete($id)
    {
        Friend::onlyTrashed()->where('id', $id)->firstOrFail()->forceDelete();

        return redirect(url('admin/friend/index'));
    }
}
