<?php

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator;

Breadcrumbs::for('home.index', function (BreadcrumbsGenerator $trail) {
    $trail->push('Home', url('/'));
});

Breadcrumbs::for('home.category', function (BreadcrumbsGenerator $trail, Category $category) {
    $trail->parent('home.index');
    $trail->push($category->name, route('home.category', $category->id));
});

Breadcrumbs::for('home.tag', function (BreadcrumbsGenerator $trail, Tag $tag) {
    $trail->parent('home.index');
    $trail->push($tag->name, route('home.tag', $tag->id));
});

Breadcrumbs::for('home.note', function (BreadcrumbsGenerator $trail) {
    $trail->parent('home.index');
    $trail->push(__('Note'), route('home.note'));
});

Breadcrumbs::for('home.chat', function (BreadcrumbsGenerator $trail) {
    $trail->parent('home.index');
    $trail->push(__('Note'), route('home.note'));
});

Breadcrumbs::for('home.git', function (BreadcrumbsGenerator $trail) {
    $trail->parent('home.index');
    $trail->push(__('Git'), route('home.git'));
});

Breadcrumbs::for('home.search', function (BreadcrumbsGenerator $trail) {
    $trail->parent('home.index');
    $trail->push(__('Search'), route('home.search'));
});

Breadcrumbs::for('home.site.index', function (BreadcrumbsGenerator $trail) {
    $trail->parent('home.index');
    $trail->push(__('Site'), route('home.site.index'));
});

Breadcrumbs::for('home.article', function (BreadcrumbsGenerator $trail, Article $article) {
    $trail->parent('home.category', $article->category);
    $trail->push($article->title, route('home.tag', $article->id));
});
