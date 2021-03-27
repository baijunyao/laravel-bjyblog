<?php

declare(strict_types=1);

namespace Tests\Feature\Resources;

use Baijunyao\LaravelTestSupport\Restful\TestIndex;
use Baijunyao\LaravelTestSupport\Restful\TestShow;
use Baijunyao\LaravelTestSupport\Restful\TestUpdate;
use Illuminate\Http\UploadedFile;

class ConfigControllerTest extends TestCase
{
    use TestIndex, TestShow, TestUpdate;

    protected $showId     = 101;
    protected $updateId   = 101;
    protected $updateData = [
        'value' => 'Update',
    ];

    public function testUploadQqQunOrCode()
    {
        $response = $this->json('POST', '/api/configs/uploadQqQunOrCode', [
            'file' => UploadedFile::fake()->image('photo1.jpg'),
        ]);

        $path = json_decode($response->getContent(), true)['url'];

        static::assertFileExists(public_path($path));
    }
}
