<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\Site\Store;
use App\Models\Site;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cache;

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
        $site = Cache::remember('common:site', 10080, function () {
            return Site::select('id', 'name', 'url')
                ->orderBy('sort')
                ->get();
        });
        $head = [
            'title' => '推荐博客',
            'keywords' => '推荐博客',
            'description' => '推荐博客',
        ];
        $assign = [
            'site' => $site,
            'head' => $head,
            'category_id' => 'index',
            'tagName' => ''
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
