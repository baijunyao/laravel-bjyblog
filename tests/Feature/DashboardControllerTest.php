<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\User;

class DashboardControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(User::find(static::ADMIN_USER_ID), 'api');
    }

    public function testAnalysis()
    {
        $this->assertResponse(
            $this->get(route('dashboard.analysis')),
            [],
            [
                '/"system":".*?"/'     => '"system":"system_in_ignore"',
                '/"web_server":".*?"/' => '"web_server":"web_server_in_ignore"',
                '/"php":".*?"/'        => '"php":"php_in_ignore"',
                '/"mysql":".*?"/'      => '"mysql":"mysql_in_ignore"',
            ]
        );
    }
}
