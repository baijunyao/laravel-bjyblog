<?php

namespace App\Console\Commands\Upgrade;

use App\Models\SocialiteClient;
use Illuminate\Console\Command;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class V5_8_8_0 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'upgrade:v5.8.8.0';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'upgrade to v5.8.8.0';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Schema::table('socialite_clients', function (Blueprint $table) {
            $table->string('icon')->default('')->after('name');
        });

        SocialiteClient::all()->each(function ($socialiteClient) {
            $socialiteClient->update([
                'icon' => $socialiteClient->name,
            ]);
        });

        SocialiteClient::create([
            'id'            => 6,
            'name'          => 'vkontakte',
            'icon'          => 'vk',
            'client_id'     => '',
            'client_secret' => '',
            'created_at'    => '2019-07-01 23:26:38',
            'updated_at'    => '2019-07-01 23:26:38',
            'deleted_at'    => null,
        ]);
    }
}
