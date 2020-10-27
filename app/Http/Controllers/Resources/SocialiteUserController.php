<?php

declare(strict_types=1);

namespace App\Http\Controllers\Resources;

use App\Http\Resources\SocialiteUser as SocialiteUserResource;
use App\Models\SocialiteUser;
use Baijunyao\LaravelRestful\Traits\Destroy;
use Baijunyao\LaravelRestful\Traits\ForceDelete;
use Baijunyao\LaravelRestful\Traits\Index;
use Baijunyao\LaravelRestful\Traits\Restore;
use Baijunyao\LaravelRestful\Traits\Update;

class SocialiteUserController extends Controller
{
    use Index, Update, Destroy, Restore, ForceDelete;

    protected const FILTERS = [
        'name',
    ];

    protected const SORTS = [
        'created_at',
    ];

    public function show($id)
    {
        if ($id === 'me') {
            $socialiteUser = SocialiteUser::where('is_admin', 1)->firstOrFail();
        } else {
            $socialiteUser = SocialiteUser::findorFail($id);
        }

        return new SocialiteUserResource($socialiteUser);
    }
}
