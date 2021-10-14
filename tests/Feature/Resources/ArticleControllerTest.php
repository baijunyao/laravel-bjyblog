<?php

declare(strict_types=1);

namespace Tests\Feature\Resources;

use Baijunyao\LaravelTestSupport\Restful\TestDestroy;
use Baijunyao\LaravelTestSupport\Restful\TestForceDelete;
use Baijunyao\LaravelTestSupport\Restful\TestIndex;
use Baijunyao\LaravelTestSupport\Restful\TestRestore;
use Baijunyao\LaravelTestSupport\Restful\TestShow;
use Baijunyao\LaravelTestSupport\Restful\TestStore;
use Baijunyao\LaravelTestSupport\Restful\TestUpdate;

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
        'description' => 'updated description',
        'cover'       => '/updated.jpg',
    ];

    public function testUpdateClearDescription(): void
    {
        $article                = $this->updateData;
        $article['description'] = '';

        $this->assertResponse(
            $this->putJson(route($this->getRoute() . '.update', $this->updateId), $article)
        );
    }
}
