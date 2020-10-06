<?php

declare(strict_types=1);

namespace App\Console\Commands\Upgrade;

use App\Models\Config;
use Illuminate\Console\Command;

class V5_5_11_0 extends Command
{
    protected $signature = 'upgrade:v5.5.11.0';

    protected $description = 'Upgrade to v5.5.11.0';

    public function handle(): int
    {
        $webName = Config::where('name', 'bjyblog.web_name')->first();

        if (!empty($webName)) {
            $webName->update([
                'name' => 'app.name',
            ]);
        }

        $appLocale = Config::where('name', 'app.locale')->first();

        if (empty($appLocale)) {
            Config::create([
                'name'  => 'app.locale',
                'value' => 'zh-CN',
            ]);
        }

        Config::onlyTrashed()->where('id', '<', 101)->forceDelete();

        $this->info('Upgrade to v5.5.11.0 version completed');

        return 0;
    }
}
