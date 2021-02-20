<?php

declare(strict_types=1);

namespace App\Console\Commands\Upgrade;

use Illuminate\Console\Command;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class V15_0_0 extends Command
{
    protected $signature   = 'upgrade:v15.0.0';
    protected $description = 'Upgrade to v15.0.0';

    public function handle(): int
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->boolean('is_audited')->default(0)->change();
        });

        return 0;
    }
}
