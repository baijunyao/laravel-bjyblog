<?php

declare(strict_types=1);

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\Store;
use App\Models\Site;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class SiteController extends Controller
{
    public function index(): View
    {
        $sites = Site::select('id', 'name', 'url', 'description')
            ->where('audit', 1)
            ->orderBy('sort')
            ->get();
        $head = [
            'title'       => translate('Recommend Blog'),
            'keywords'    => translate('Recommend Blog'),
            'description' => translate('Recommend Blog'),
        ];
        $assign = [
            'sites'       => $sites,
            'head'        => $head,
            'category_id' => 'index',
            'tagName'     => '',
        ];

        return view('home.site.index', $assign);
    }

    public function store(Store $request): JsonResponse
    {
        /** @var \App\Models\SocialiteUser $socialite_user */
        $socialite_user = auth()->guard('socialite')->user();

        $socialite_user->update([
            'email' => $request->input('email'),
        ]);

        return response()->json(Site::create($request->only('name', 'url', 'description')));
    }
}
