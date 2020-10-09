<?php

declare(strict_types=1);

namespace App\Console\Commands\Upgrade;

use Illuminate\Console\Command;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class V14_0_0 extends Command
{
    protected $signature   = 'upgrade:v14.0.0';
    protected $description = 'Upgrade to v14.0.0';

    public function handle(): void
    {
        if (!Schema::hasColumn('failed_jobs', 'uuid')) {
            Schema::table('failed_jobs', function (Blueprint $table) {
                $table->string('uuid')->unique()->after('id');
            });
        }
    }
}
