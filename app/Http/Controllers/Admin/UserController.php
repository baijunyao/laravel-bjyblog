<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::withTrashed()->get();
        $assign = compact('data');
        return view('admin.user.index', $assign);
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
        $data = User::find($id);
        $assign = compact('data');
        return view('admin.user.edit', $assign);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, User $userModel)
    {
        $data = $request->except('_token');
        // 如果不修改密码 则去掉password字段
        $data = array_filter($data);
        $map = [
            'id' => $id
        ];
        $userModel->updateData($map, $data);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, User $userModel)
    {
        $map = [
            'id' => $id
        ];
        $userModel->destroyData($map);
        return redirect('admin/user/index');
    }

    /**
     * 恢复删除的标签
     *
     * @param         $id
     * @param User    $userModel
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function restore($id, User $userModel)
    {
        $map = [
            'id' => $id
        ];
        $userModel->restoreData($map);
        return redirect('admin/user/index');
    }

    /**
     * 彻底删除标签
     *
     * @param         $id
     * @param User    $userModel
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function forceDelete($id, User $userModel)
    {
        $map = compact('id');
        $userModel->forceDeleteData($map);
        return redirect('admin/user/index');
    }
}
