<?php

declare(strict_types=1);

namespace Tests\Feature\Resources;

use Baijunyao\LaravelTestSupport\Rest\TestStore;
use Illuminate\Http\UploadedFile;

class ArticleImageControllerTest extends TestCase
{
    public function testStore()
    {
        $file     = UploadedFile::fake()->image('article.jpg');
        $response = $this->call('POST', route($this->getRoute() . '.store'), [], [], ['image' => $file]);

        $content = json_decode($response->getContent(), true);

        static::assertSame(1, $content['success']);
        static::assertFileExists(public_path($content['url']));
    }
}
