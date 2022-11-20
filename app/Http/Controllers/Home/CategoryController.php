<?php

declare(strict_types=1);

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function show(Category $category): View
    {
        $articles = $category->articles()
            ->orderBy('created_at', 'desc')
            ->with('tags')
            ->paginate(10);

        foreach ($articles as $article) {
            $article->setRelation('category', $category);
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
