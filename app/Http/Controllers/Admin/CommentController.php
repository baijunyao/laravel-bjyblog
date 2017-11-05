<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    /**
     * 评论列表
     *
     * @param Comment $commentModel
     * @return mixed
     */
    public function index(Comment $commentModel)
    {
        $data = $commentModel->getAdminList();
        $assign = compact('data');
        return view('admin.comment.index', $assign);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Comment $commentModel)
    {
        $map = [
            'id' => $id
        ];
        $commentModel->deleteData($map);
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
        $commentModel->where('id', $id)->restore();
        return redirect('admin/comment/index');
    }

    /**
     * 彻底删除评论
     *
     * @param         $id
     * @param Comment $commentModel
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function forceDelete($id, Comment $commentModel)
    {
        $commentModel->where('id', $id)->forceDelete();
        return redirect('admin/tag/index');
    }
}
