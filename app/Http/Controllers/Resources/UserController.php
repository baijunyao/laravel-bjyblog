<?php

declare(strict_types=1);

namespace App\Http\Controllers\Resources;

use App\Http\Resources\User as UserResource;
use App\Models\User;
use Auth;
use Baijunyao\LaravelRestful\Traits\Destroy;
use Baijunyao\LaravelRestful\Traits\ForceDelete;
use Baijunyao\LaravelRestful\Traits\Index;
use Baijunyao\LaravelRestful\Traits\Restore;
use Baijunyao\LaravelRestful\Traits\Update;

class UserController extends Controller
{
    use Index, Update, Destroy, Restore, ForceDelete;

    public function show($id)
    {
        if ($id === 'me') {
            /** @var \App\Models\User $user */
            $user = Auth::user();
        } else {
            $user = User::findorFail($id);
        }

        return new UserResource($user);
    }
}
