<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function authOauthRedirectToProvider(string $service): RedirectResponse
    {
        return redirect()->route('auth.socialite.redirectToProvider', ['service' => $service])->withInput();
    }

    public function handleProviderCallback(Request $request, string $service): RedirectResponse
    {
        $url = route('auth.socialite.handleProviderCallback', ['service' => $service]) . '?' . $request->getQueryString();

        return redirect($url);
    }

    public function logout(): RedirectResponse
    {
        return redirect()->route('auth.socialite.logout')->withInput();
    }

    public function note(): RedirectResponse
    {
        return redirect()->route('home.note.index');
    }

    public function openSource(): RedirectResponse
    {
        return redirect()->route('home.openSource.index');
    }

    public function login(): RedirectResponse
    {
        return redirect()->route('auth.socialite.redirectToProvider', ['github']);
    }
}
