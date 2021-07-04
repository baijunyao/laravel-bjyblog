<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialiteClient;
use Illuminate\Http\Request;

/**
 * @deprecated This will be removed.
 */
class SocialiteClientController extends Controller
{
    public function index()
    {
        $socialite_clients   = SocialiteClient::all();
        $assign              = compact('socialite_clients');

        return view('admin.socialiteClient.index', $assign);
    }

    public function edit($id)
    {
        $socialite_client   = SocialiteClient::where('id', $id)->firstOrFail();
        $assign             = compact('socialite_client');

        return view('admin.socialiteClient.edit', $assign);
    }

    public function update(Request $request, $id)
    {
        $socialite_client = $request->only('client_id', 'client_secret');
        SocialiteClient::where('id', $id)->firstOrFail()->update($socialite_client);

        return redirect()->back();
    }
}
