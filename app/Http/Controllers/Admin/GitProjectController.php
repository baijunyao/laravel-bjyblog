<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\GitProject\Store;
use App\Models\GitProject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GitProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = GitProject::withTrashed()->get();
        $gitProjectType = [
            1 => 'github',
            2 => 'gitee'
        ];
        $assign = compact('data', 'gitProjectType');
        return view('admin.gitProject.index', $assign);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gitProject.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request, GitProject $gitProjectModel)
    {
        $data = $request->except('_token');
        $gitProjectModel->addData($data);
        return redirect('admin/gitProject/index');
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
