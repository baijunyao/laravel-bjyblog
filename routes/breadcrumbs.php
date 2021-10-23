<?php

declare(strict_types=1);

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator;

Breadcrumbs::for('home.articles.index', function (BreadcrumbsGenerator $trail) {
    $trail->push('Home', url('/'));
});

Breadcrumbs::for('home.categories.show', function (BreadcrumbsGenerator $trail, Category $category) {
    $trail->parent('home.articles.index');
    $trail->push($category->name, route('home.categories.show', $category->id));
});

Breadcrumbs::for('home.tags.show', function (BreadcrumbsGenerator $trail, Tag $tag) {
    $trail->parent('home.articles.index');
    $trail->push($tag->name, route('home.tags.show', $tag->id));
});

Breadcrumbs::for('home.notes.index', function (BreadcrumbsGenerator $trail) {
    $trail->parent('home.articles.index');
    $trail->push(translate('Note'), route('home.notes.index'));
});

Breadcrumbs::for('home.chat.index', function (BreadcrumbsGenerator $trail) {
    $trail->parent('home.articles.index');
    $trail->push(translate('Note'), route('home.notes.index'));
});

Breadcrumbs::for('home.openSources.index', function (BreadcrumbsGenerator $trail) {
    $trail->parent('home.articles.index');
    $trail->push(translate('Open Source'), route('home.openSources.index'));
});

Breadcrumbs::for('home.sites.index', function (BreadcrumbsGenerator $trail) {
    $trail->parent('home.articles.index');
    $trail->push(translate('Site'), route('home.sites.index'));
});

Breadcrumbs::for('home.articles.show', function (BreadcrumbsGenerator $trail, Article $article) {
    $trail->parent('home.categories.show', $article->category);
    $trail->push($article->title, route('home.tags.show', $article->id));
});

Breadcrumbs::for('home.articles.search', function (BreadcrumbsGenerator $trail) {
    $trail->parent('home.articles.index');
    $trail->push(translate('Search'), route('home.articles.search'));
});
