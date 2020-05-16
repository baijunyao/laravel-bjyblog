<?php

declare(strict_types=1);

namespace App\Http\Controllers\Home;

use App\Models\Category;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $articles = $category->articles()
            ->orderBy('created_at', 'desc')
            ->with('tags')
            ->paginate(10);

        if ($articles->isNotEmpty()) {
            $articles->setCollection(
                collect(
                    $articles->items()
                )->map(function ($v) use ($category) {
                    $v->category = $category;

                    return $v;
                })
            );
        }

        $head = [
            'title'       => $category->name,
            'keywords'    => $category->keywords,
            'description' => $category->description,
        ];
        $assign = [
            'category_id'  => $category->id,
            'articles'     => $articles,
            'tagName'      => '',
            'title'        => $category->name,
            'head'         => $head,
        ];

        return view('home.index.index', $assign);
    }
}
