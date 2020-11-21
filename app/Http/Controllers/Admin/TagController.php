<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tag\Store;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $data   = Tag::withTrashed()->get();
        $assign = compact('data');

        return view('admin.tag.index', $assign);
    }

    public function create()
    {
        return view('admin.tag.create');
    }

    public function store(Store $request)
    {
        $tag = Tag::create($request->only('name', 'keywords', 'description'));

        if ($request->ajax()) {
            return response()->json($tag);
        }

        return redirect(url('admin/tag/index'));
    }

    public function edit($id)
    {
        $data   = Tag::withTrashed()->find($id);
        $assign = compact('data');

        return view('admin.tag.edit', $assign);
    }

    public function update(Request $request, $id)
    {
        Tag::withTrashed()->find($id)->update($request->except('_token'));

        return redirect()->back();
    }

    public function destroy($id)
    {
        Tag::destroy($id);

        return redirect(url('admin/tag/index'));
    }

    public function restore($id)
    {
        Tag::onlyTrashed()->find($id)->restore();

        return redirect(url('admin/tag/index'));
    }

    public function forceDelete($id)
    {
        Tag::onlyTrashed()->find($id)->forceDelete();

        return redirect(url('admin/tag/index'));
    }
}
