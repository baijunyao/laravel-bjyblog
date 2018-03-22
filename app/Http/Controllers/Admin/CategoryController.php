<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Category\Store;
use App\Http\Requests\Category\Update;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cache;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::withTrashed()->orderBy('sort')->get();
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request, Category $categoryModel)
    {
        $data = $request->except('_token');
        $result = $categoryModel->storeData($data);
        if ($result) {
            // 更新缓存
            Cache::forget('common:category');
        }
        return redirect('admin/category/index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Category::find($id);
        $assign = compact('data');
        return view('admin.category.edit', $assign);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request, $id, Category $categoryModel)
    {
        $map = [
            'id' => $id
        ];
        $data = $request->except('_token');
        $result = $categoryModel->updateData($map, $data);
        if ($result) {
            // 更新缓存
            Cache::forget('common:category');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Category $categoryModel)
    {
        $map = [
            'id' => $id
        ];
        $result = $categoryModel->destroyData($map);
        if ($result) {
            // 更新缓存
            Cache::forget('common:category');
        }
        return redirect('admin/category/index');
    }

    /**
     * 分类排序
     *
     * @param Request $request
     * @param Category $categoryModel
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sort(Request  $request, Category $categoryModel)
    {
        $data = $request->except('_token');
        $sortData = [];
        foreach ($data as $k => $v) {
            $sortData[] = [
                'id' => $k,
                'sort' => $v
            ];
        }
        $result = $categoryModel->updateBatch($sortData);
        if ($result) {
            // 更新缓存
            Cache::forget('common:category');
        }
        return redirect()->back();
    }

    /**
     * 恢复删除的分类
     *
     * @param          $id
     * @param Category $categoryModel
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function restore($id, Category $categoryModel)
    {
        $map = [
            'id' => $id
        ];
        $result = $categoryModel->restoreData($map);
        if ($result) {
            // 更新缓存
            Cache::forget('common:category');
        }
        return redirect('admin/category/index');
    }

    /**
     * 彻底删除分类
     *
     * @param          $id
     * @param Category $categoryModel
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function forceDelete($id, Category $categoryModel)
    {
        $categoryModel->where('id', $id)->forceDelete();
        return redirect('admin/category/index');
    }
}
