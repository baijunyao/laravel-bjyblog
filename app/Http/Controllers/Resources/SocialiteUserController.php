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

    /**
     * @param string|int $id
     */
    public function show($id): SocialiteUserResource
    {
        if ($id === 'me') {
            $socialite_user = SocialiteUser::where('is_admin', 1)->firstOrFail();
        } else {
            $socialite_user = SocialiteUser::where('id', $id)->firstOrFail();
        }

        return new SocialiteUserResource($socialite_user);
    }
}
