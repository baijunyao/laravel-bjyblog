<?php

declare(strict_types=1);

namespace Tests\Feature\Resources;

use App\Models\SocialiteUser;
use App\Notifications\SiteAudit;
use Baijunyao\LaravelTestSupport\Restful\TestDestroy;
use Baijunyao\LaravelTestSupport\Restful\TestForceDelete;
use Baijunyao\LaravelTestSupport\Restful\TestIndex;
use Baijunyao\LaravelTestSupport\Restful\TestRestore;
use Baijunyao\LaravelTestSupport\Restful\TestShow;
use Baijunyao\LaravelTestSupport\Restful\TestStore;
use Baijunyao\LaravelTestSupport\Restful\TestStoreValidation;
use Baijunyao\LaravelTestSupport\Restful\TestUpdateValidation;
use Notification;

class SiteControllerTest extends TestCase
{
    use TestIndex, TestShow, TestStore, TestStoreValidation, TestUpdateValidation, TestDestroy, TestRestore, TestForceDelete;

    protected $storeData = [
        'socialite_user_id' => 0,
        'name'              => 'Store',
        'description'       => 'Store',
        'url'               => 'https://test.test',
        'audit'             => 1,
        'sort'              => 2,
    ];
    protected $updateData = [
        'socialite_user_id' => 1,
        'name'              => 'Update',
        'description'       => 'Update',
        'url'               => 'https://update.test',
        'audit'             => 1,
        'sort'              => 2,
    ];

    public function testUpdate()
    {
        Notification::fake();

        $this->assertResponse(
            $this->putJson(route($this->getRoute() . '.update', $this->updateId), $this->updateData)
        );

        Notification::assertSentTo(SocialiteUser::find(1), SiteAudit::class);
    }
}
