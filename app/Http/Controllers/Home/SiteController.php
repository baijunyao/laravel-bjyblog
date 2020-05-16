<?php

declare(strict_types=1);

namespace App\Http\Controllers\Home;

use App\Http\Requests\Site\Store;
use App\Models\Site;
use App\Models\SocialiteUser;
use App\Notifications\SiteApply;
use Notification;

class SiteController extends Controller
{
    public function index()
    {
        $site = Site::select('id', 'name', 'url', 'description')
            ->where('audit', 1)
            ->orderBy('sort')
            ->get();
        $head = [
            'title'       => __('Recommend Blog'),
            'keywords'    => __('Recommend Blog'),
            'description' => __('Recommend Blog'),
        ];
        $assign = [
            'site'        => $site,
            'head'        => $head,
            'category_id' => 'index',
            'tagName'     => '',
        ];

        return view('home.site.index', $assign);
    }

    public function store(Store $request)
    {
        /** @var \App\Models\SocialiteUser $socialiteUser */
        $socialiteUser = auth()->guard('socialite')->user();

        $siteData                      = $request->only('name', 'url', 'description');
        $siteData['socialite_user_id'] = $socialiteUser->id;
        $sort                          = Site::orderBy('sort', 'desc')->value('sort');
        $siteData['sort']              = (int) $sort + 1;
        $newSite                       = Site::create($siteData);

        SocialiteUser::where('id', $socialiteUser->id)->update([
            'email' => $request->input('email'),
        ]);

        Notification::route('mail', config('bjyblog.notification_email'))
            ->notify(new SiteApply());

        return response()->json($newSite);
    }
}
