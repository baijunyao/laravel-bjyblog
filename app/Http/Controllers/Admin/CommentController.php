<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        $wd   = $request->input('wd');
        $data = Comment::with([
            'article' => function ($query) {
                return $query->select('id', 'title');
            },
            'socialiteUser' => function ($query) {
                return $query->select('id', 'name');
            },
        ])
            ->when($wd, function ($query) use ($wd) {
                return $query->where('content', 'like', "%$wd%");
            })
            ->orderBy('comments.created_at', 'desc')
            ->withTrashed()
            ->paginate(15);
        $assign = compact('data');

        return view('admin.comment.index', $assign);
    }

    public function edit($id)
    {
        $comment = Comment::withTrashed()->find($id);
        $assign  = compact('comment');

        return view('admin.comment.edit', $assign);
    }

    public function update(Request $request, $id)
    {
        Comment::withTrashed()->find($id)->update($request->except('_token'));

        return redirect()->back();
    }

    public function destroy($id)
    {
        Comment::destroy($id);

        return redirect()->back();
    }

    public function restore($id)
    {
        Comment::onlyTrashed()->find($id)->restore();

        return redirect()->back();
    }

    public function forceDelete($id)
    {
        Comment::onlyTrashed()->find($id)->forceDelete();

        return redirect()->back();
    }

    public function replaceView()
    {
        return view('admin.comment.replaceView');
    }

    public function replace(Request $request)
    {
        $search = $request->input('search');
        $data   = Comment::select('id', 'content')
            ->where('content', 'like', "%$search%")
            ->get();
        foreach ($data as $k => $v) {
            Comment::find($v->id)->update([
                'content' => str_replace($search, $request->input('replace'), $v->content),
            ]);
        }

        return redirect()->back();
    }
}
