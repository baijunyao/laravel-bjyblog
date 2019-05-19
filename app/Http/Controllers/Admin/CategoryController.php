<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\Store;
use App\Http\Requests\Category\Update;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data   = Category::withTrashed()->orderBy('sort')->get();
        $assign = compact('data');

        return view('admin.category.index', $assign);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        Category::create($request->except('_token'));

        return redirect('admin/category/index');
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
        $data   = Category::find($id);
        $assign = compact('data');

        return view('admin.category.edit', $assign);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request, $id)
    {
        Category::find($id)->update($request->except('_token'));

        return redirect()->back();
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
        Category::destroy($id);

        return redirect('admin/category/index');
    }

    /**
     * 分类排序
     *
     * @param Request  $request
     * @param Category $categoryModel
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sort(Request  $request, Category $categoryModel)
    {
        $data     = $request->except('_token');
        $sortData = [];
        foreach ($data as $k => $v) {
            $sortData[] = [
                'id'   => $k,
                'sort' => $v,
            ];
        }
        $categoryModel->updateBatch($sortData);

        return redirect()->back();
    }

    /**
     * 恢复删除的分类
     *
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function restore($id)
    {
        Category::onlyTrashed()->find($id)->restore();

        return redirect('admin/category/index');
    }

    /**
     * 彻底删除分类
     *
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function forceDelete($id)
    {
        Category::onlyTrashed()->find($id)->forceDelete();

        return redirect('admin/category/index');
    }
}
