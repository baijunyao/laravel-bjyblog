<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\Store;
use App\Models\OauthUser;
use App\Models\Site;
use App\Notifications\ApplySite;
use Cache;
use Illuminate\Http\Request;
use Notification;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 获取文章
        $site = Cache::remember('home:site', 10080, function () {
            return Site::select('id', 'name', 'url', 'description')
                ->where('audit', 1)
                ->orderBy('sort')
                ->get();
        });
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * 新增
     *
     * @param Store     $request
     * @param Site      $siteModel
     * @param OauthUser $oauthUser
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Store $request, OauthUser $oauthUser)
    {
        $oauthUserId = auth()->guard('oauth')->user()->id;

        $siteData                  = $request->only('name', 'url', 'description');
        $siteData['oauth_user_id'] = $oauthUserId;
        // 获取序号
        $sort             = Site::orderBy('sort', 'desc')->value('sort');
        $siteData['sort'] = (int) $sort + 1;
        $result           = Site::create($siteData);

        if ($result) {
            OauthUser::where('id', $oauthUserId)->update([
                'email' => $request->input('email'),
            ]);

            Notification::route('mail', config('bjyblog.notification_email'))
                ->notify(new ApplySite());

            return ajax_return(200, '提交成功');
        } else {
            return ajax_return(400, '提交失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
