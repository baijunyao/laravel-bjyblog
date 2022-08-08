<?php

declare(strict_types=1);

namespace Tests\Unit\Support;

use App\Support\TencentTranslate;
use TencentCloud\Common\Exception\TencentCloudSDKException;
use Tests\TestCase;

class TencentTranslateTest extends TestCase
{
    public function testToEnglish()
    {
        $this->expectException(TencentCloudSDKException::class);
        $this->expectExceptionMessage('The provided credentials could not be validated. Please check your signature is correct.');

        $tencent_translate = new TencentTranslate(
            config('services.tencent_cloud.secret_id'),
            config('services.tencent_cloud.secret_key'),
            config('services.tencent_cloud.region'),
            config('services.tencent_cloud.project_id'),
        );

        $tencent_translate->toEnglish('test');
    }
}
