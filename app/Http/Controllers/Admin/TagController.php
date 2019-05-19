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

        $data = $request->only('name');
        $tag_slug = str_slug($request->name, '-');
        $data['slug'] = $tag_slug;
        $id = Tag::create($data);
        if ($request->ajax()) {
            $data['id'] = $id;
            $data['slug'] = $tag_slug;
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
        $data  = $request->except('_token');
        $data['slug'] = str_slug($request->name, '-');
        Tag::find($id)->update($data);

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

    public function getSlugAttribute(): string
    {
        return str_slug($this->name, '-');
    }

    public function getUrlAttribute(): string
    {
        return action('IndexController@category', [$this->id, $this->slug]);
    }
}
