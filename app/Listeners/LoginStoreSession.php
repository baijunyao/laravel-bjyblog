<?php

namespace App\Listeners;

use App\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;

class LoginStoreSession
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        $user = Auth::user();
        // 组合存入session中的值
        $sessionData = [
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'avatar' => asset('statics/gentelella/production/images/img.jpg'),
                'type' => 0,
                'is_admin' => 1,
                'email' => $user->email
            ]
        ];
        // 将数据存入数据库
        session($sessionData);
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        //
    }
}
