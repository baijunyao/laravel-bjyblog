<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FriendshipLink\Store;
use App\Models\FriendshipLink;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FriendshipLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = FriendshipLink::orderBy('sort')->get();
        $assign = [
            'data' => $data
        ];
        return view('admin/friendshipLink/index', $assign);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/friendshipLink/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request, FriendshipLink $friendshipLinkModel)
    {
        $data = $request->except('_token');
        // 如果没有http 则补上http
        if (strpos($data['url'], 'http') === false) {
            $data['url'] = 'http://'.$data['url'];
        }
        // 删除右侧的/
        $data['url'] = rtrim($data['url'], '/');
        $friendshipLinkModel->addData($data);
        return redirect('admin/friendshipLink/index');

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

    public function sort(Request $request, FriendshipLink $friendshipLinkModel)
    {
        $data = $request->except('_token');
        $editData = [];
        foreach ($data as $k => $v) {
            $editData[] = [
                'id' => $k,
                'sort' => $v
            ];
        }
        $friendshipLinkModel->updateBatch($editData);
        return redirect()->back();
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
