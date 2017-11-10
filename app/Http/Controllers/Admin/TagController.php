<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Tag\Store;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Tag $tagModel)
    {
        $data = $tagModel::withTrashed()->get();
        $assign = compact('data');
        return view('admin.tag.index', $assign);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request, Tag $tagModel)
    {
        $data = [
            'name' => $request->input('name')
        ];
        $tagModel->storeData($data);
        return redirect('admin/tag/index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Tag $tagModel)
    {
        $data = $tagModel->find($id);
        $assign = compact('data');
        return view('admin.tag.edit', $assign);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, Tag $tagModel)
    {
        $map = [
            'id' => $id
        ];
        $data = $request->except('_token');
        $tagModel->updateData($map, $data);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Tag $tagModel)
    {
        $map = [
            'id' => $id
        ];
        $tagModel->destroyData($map);
        return redirect('admin/tag/index');
    }

    /**
     * 恢复删除的标签
     *
     * @param         $id
     * @param Tag     $tagModel
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function restore($id, Tag $tagModel)
    {
        $tagModel->where('id', $id)->restore();
        return redirect('admin/tag/index');
    }

    /**
     * 彻底删除标签
     *
     * @param         $id
     * @param Tag     $tagModel
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function forceDelete($id, Tag $tagModel)
    {
        $tagModel->where('id', $id)->forceDelete();
        return redirect('admin/tag/index');
    }
}
