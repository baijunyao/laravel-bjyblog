<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * 评论列表
     *
     * @param Comment $commentModel
     *
     * @return mixed
     */
    public function index(Request $request)
    {
        $wd   = $request->input('wd');
        $data = Comment::with([
            'article' => function ($query) {
                return $query->select('id', 'title');
            },
            'oauthUser' => function ($query) {
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

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Comment $commentModel)
    {
        Comment::destroy($id);

        return redirect()->back();
    }

    /**
     * 恢复删除的评论
     *
     * @param         $id
     * @param Comment $commentModel
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function restore($id, Comment $commentModel)
    {
        Comment::onlyTrashed()->find($id)->restore();

        return redirect()->back();
    }

    /**
     * 彻底删除评论
     *
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function forceDelete($id)
    {
        Comment::onlyTrashed()->find($id)->forceDelete();

        return redirect()->back();
    }

    /**
     * 批量替换功能视图
     *
     * @return \Illuminate\View\View
     */
    public function replaceView()
    {
        return view('admin.comment.replaceView');
    }

    /**
     * 批量替换功能
     *
     * @param Request $request
     * @param Comment $commentModel
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function replace(Request $request, Comment $commentModel)
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
