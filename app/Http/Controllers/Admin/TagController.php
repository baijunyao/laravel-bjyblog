<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tag\Store;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data   = Tag::withTrashed()->get();
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
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        $id = Tag::create($request->only('name'));

        if ($request->ajax()) {
            $data['id'] = $id;

            return ajax_return(200, $data);
        }

        return redirect('admin/tag/index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Tag $tagModel)
    {
        $data   = $tagModel->find($id);
        $assign = compact('data');

        return view('admin.tag.edit', $assign);
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
        Tag::find($id)->update($request->except('_token'));

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
        Tag::destroy($id);

        return redirect('admin/tag/index');
    }

    /**
     * 恢复删除的标签
     *
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function restore($id)
    {
        Tag::onlyTrashed()->find($id)->restore();

        return redirect('admin/tag/index');
    }

    /**
     * 彻底删除标签
     *
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function forceDelete($id)
    {
        Tag::onlyTrashed()->find($id)->forceDelete();

        return redirect('admin/tag/index');
    }
}
