<?php

namespace Tests\Feature\Resources;

use Baijunyao\LaravelTestSupport\Rest\TestDestroy;
use Baijunyao\LaravelTestSupport\Rest\TestForceDelete;
use Baijunyao\LaravelTestSupport\Rest\TestIndex;
use Baijunyao\LaravelTestSupport\Rest\TestRestore;
use Baijunyao\LaravelTestSupport\Rest\TestShow;
use Baijunyao\LaravelTestSupport\Rest\TestStore;
use Baijunyao\LaravelTestSupport\Rest\TestUpdate;

class ArticleControllerTest extends TestCase
{
    use TestIndex, TestShow, TestStore, TestUpdate, TestDestroy, TestRestore, TestForceDelete;

    protected $storeData     = [
        'category_id' => 1,
        'title'       => 'title',
        'author'      => 'baijunyao',
        'keywords'    => 'keywords',
        'markdown'    => 'content',
        'tag_ids'     => [1],
        'description' => '',
        'cover'       => '',
    ];
    protected $updateData = [
        'category_id' => 1,
        'title'       => 'updated title',
        'author'      => 'updated baijunyao',
        'keywords'    => 'updated keywords',
        'markdown'    => 'updated content',
        'tag_ids'     => [1],
        'description' => '',
        'cover'       => '',
    ];
}
