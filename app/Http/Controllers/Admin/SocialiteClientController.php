<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialiteClient;
use Illuminate\Http\Request;

class SocialiteClientController extends Controller
{
    public function index()
    {
        $socialiteClients   = SocialiteClient::all();
        $assign             = compact('socialiteClients');

        return view('admin.socialiteClient.index', $assign);
    }

    public function edit($id)
    {
        $socialiteClient   = SocialiteClient::find($id);
        $assign            = compact('socialiteClient');

        return view('admin.socialiteClient.edit', $assign);
    }

    public function update(Request $request, $id)
    {
        $socialiteClient = $request->only('client_id', 'client_secret');
        SocialiteClient::find($id)->update($socialiteClient);

        return redirect()->back();
    }
}
