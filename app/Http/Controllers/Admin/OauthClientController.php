<?php

namespace App\Http\Controllers\Admin;

use App\Models\OauthClient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OauthClientController extends Controller
{
    public function index()
    {
        $oauthClients   = OauthClient::all();
        $assign = compact('oauthClients');

        return view('admin.oauthClient.index', $assign);
    }

    public function edit($id)
    {
        $oauthClient   = OauthClient::find($id);
        $assign = compact('oauthClient');

        return view('admin.oauthClient.edit', $assign);
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
    public function destroy($id)
    {
        //
    }
}
