<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialiteUser;
use Illuminate\Http\Request;

/**
 * @deprecated This will be removed.
 */
class SocialiteUserController extends Controller
{
    public function index(Request $request)
    {
        $wd   = $request->input('wd');
        $data = SocialiteUser::orderBy('updated_at', 'desc')
            ->when($wd, function ($query) use ($wd) {
                return $query->where('name', 'like', "%$wd%");
            })
            ->with('socialiteClient')
            ->paginate(50);
        $assign = compact('data');

        return view('admin.socialiteUser.index', $assign);
    }

    public function edit($id)
    {
        $data   = SocialiteUser::where('id', $id)->firstOrFail();
        $assign = compact('data');

        return view('admin.socialiteUser.edit', $assign);
    }

    public function update(Request $request, $id)
    {
        $data             = $request->except('_token');
        $data['is_admin'] = $request->input('is_admin', 0);
        SocialiteUser::where('id', $id)->firstOrFail()->update($data);

        return redirect()->back();
    }
}
