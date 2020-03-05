<?php

declare(strict_types=1);

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function checkLogin()
    {
        return response()->json([
            'status' => (int) auth()->guard('socialite')->check(),
        ]);
    }
}
