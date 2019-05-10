<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OauthClient;
use Illuminate\Http\Request;

class OauthClientController extends Controller
{
    public function index()
    {
        $oauthClients   = OauthClient::all();
        $assign         = compact('oauthClients');

        return view('admin.oauthClient.index', $assign);
    }

    public function edit($id)
    {
        $oauthClient   = OauthClient::find($id);
        $assign        = compact('oauthClient');

        return view('admin.oauthClient.edit', $assign);
    }

    public function update(Request $request, $id)
    {
        $oauthClient = $request->only('client_id', 'client_secret');
        OauthClient::find($id)->update($oauthClient);

        return redirect()->back();
    }
}
