<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OauthUser;
use Illuminate\Http\Request;

class OauthUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $wd   = $request->input('wd');
        $data = OauthUser::orderBy('updated_at', 'desc')
            ->select('id', 'name', 'oauth_client_id', 'email', 'login_times', 'is_admin', 'last_login_ip', 'created_at', 'updated_at')
            ->when($wd, function ($query) use ($wd) {
                return $query->where('name', 'like', "%$wd%");
            })
            ->with('oauthClient')
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data   = OauthUser::find($id);
        $assign = compact('data');

        return view('admin.oauthUser.edit', $assign);
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
        $data             = $request->except('_token');
        $data['is_admin'] = $request->input('is_admin', 0);
        OauthUser::find($id)->update($data);

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
    }
}
