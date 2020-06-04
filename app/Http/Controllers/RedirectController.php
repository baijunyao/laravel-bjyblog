<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function authOauthRedirectToProvider($service)
    {
        return redirect()->route('auth.socialite.redirectToProvider', ['service' => $service])->withInput();
    }

    public function handleProviderCallback(Request $request, $service)
    {
        $url = route('auth.socialite.handleProviderCallback', ['service' => $service]) . '?' . $request->getQueryString();

        return redirect($url);
    }

    public function logout()
    {
        return redirect()->route('auth.socialite.logout')->withInput();
    }

    public function note()
    {
        return redirect()->route('home.note.index');
    }

    public function openSource()
    {
        return redirect()->route('home.openSource.index');
    }

    public function login()
    {
        return redirect()->route('auth.socialite.redirectToProvider', ['github']);
    }
}
