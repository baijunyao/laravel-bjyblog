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
            'title'       => '推荐博客',
            'keywords'    => '推荐博客',
            'description' => '推荐博客',
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

            return ajax_return(200, '提交成功');
        } else {
            return ajax_return(400, '提交失败');
        }
    }
}
