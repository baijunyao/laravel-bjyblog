<?php

declare(strict_types=1);

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator;

Breadcrumbs::for('home.article.index', function (BreadcrumbsGenerator $trail) {
    $trail->push('Home', url('/'));
});

Breadcrumbs::for('home.category.show', function (BreadcrumbsGenerator $trail, Category $category) {
    $trail->parent('home.article.index');
    $trail->push($category->name, route('home.category.show', $category->id));
});

Breadcrumbs::for('home.tag.show', function (BreadcrumbsGenerator $trail, Tag $tag) {
    $trail->parent('home.article.index');
    $trail->push($tag->name, route('home.tag.show', $tag->id));
});

Breadcrumbs::for('home.note.index', function (BreadcrumbsGenerator $trail) {
    $trail->parent('home.article.index');
    $trail->push(translate('Note'), route('home.note.index'));
});

Breadcrumbs::for('home.chat.index', function (BreadcrumbsGenerator $trail) {
    $trail->parent('home.article.index');
    $trail->push(translate('Note'), route('home.note.index'));
});

Breadcrumbs::for('home.openSource.index', function (BreadcrumbsGenerator $trail) {
    $trail->parent('home.article.index');
    $trail->push(translate('Open Source'), route('home.openSource.index'));
});

Breadcrumbs::for('home.site.index', function (BreadcrumbsGenerator $trail) {
    $trail->parent('home.article.index');
    $trail->push(translate('Site'), route('home.site.index'));
});

Breadcrumbs::for('home.article.show', function (BreadcrumbsGenerator $trail, Article $article) {
    $trail->parent('home.category.show', $article->category);
    $trail->push($article->title, route('home.tag.show', $article->id));
});

Breadcrumbs::for('home.article.search', function (BreadcrumbsGenerator $trail) {
    $trail->parent('home.article.index');
    $trail->push(translate('Search'), route('home.article.search'));
});
