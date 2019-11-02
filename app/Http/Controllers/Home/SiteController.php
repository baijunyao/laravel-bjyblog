<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\Store;
use App\Models\Site;
use App\Models\SocialiteUser;
use App\Notifications\ApplySite;
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
        $socialiteUserId = auth()->guard('socialite')->user()->id;

        $siteData                      = $request->only('name', 'url', 'description');
        $siteData['socialite_user_id'] = $socialiteUserId;
        $sort                          = Site::orderBy('sort', 'desc')->value('sort');
        $siteData['sort']              = (int) $sort + 1;
        $result                        = Site::create($siteData);

        if ($result) {
            SocialiteUser::where('id', $socialiteUserId)->update([
                'email' => $request->input('email'),
            ]);

            Notification::route('mail', config('bjyblog.notification_email'))
                ->notify(new ApplySite());

            return response()->json();
        } else {
            return response()->json('', 500);
        }
    }
}
