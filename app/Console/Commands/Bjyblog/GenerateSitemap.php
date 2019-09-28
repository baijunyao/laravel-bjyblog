<?php

namespace App\Console\Commands\Bjyblog;

use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bjyblog:generateSitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generating the sitemap';

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
        $this->info('Start generating the sitemap.xml file');

        SitemapGenerator::create(config('app.url'))
            ->writeToFile(public_path('sitemap.xml'));

        $this->info('Generating the sitemap completed.');
        $this->info('Path: ' . public_path('sitemap.xml'));
    }
}
