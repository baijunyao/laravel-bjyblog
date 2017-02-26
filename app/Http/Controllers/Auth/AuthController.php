<?php

namespace App\Http\Controllers\Auth;

use Socialite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function redirectToProvider(Request $request, $service)
    {
        return Socialite::driver($service)->redirect();
    }

    public function handleProviderCallback(Request $request, $service)
    {
        $user = Socialite::driver($service)->user();
        dd($user);
    }
}
