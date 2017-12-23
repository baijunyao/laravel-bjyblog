<?php

namespace App\Http\Controllers\Admin;

use App\Models\OauthUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OauthUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = OauthUser::orderBy('updated_at', 'desc')
            ->select('id', 'name', 'type', 'email', 'login_times', 'is_admin', 'created_at', 'updated_at')
            ->paginate(50);
        $assign = compact('data');
        return view('admin.oauthUser.index', $assign);
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
        $data = OauthUser::find($id);
        $assign = compact('data');
        return view('admin.oauthUser.edit', $assign);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, OauthUser $oauthUserModel)
    {
        $data = $request->except('_token');
        $data['is_admin'] = $request->input('is_admin', 0);
        $map = [
            'id' => $id
        ];
        $oauthUserModel->updateData($map, $data);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
