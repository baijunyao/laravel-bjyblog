<?php

declare(strict_types=1);

namespace App\Console\Commands\Bjyblog;

use App\Models\Article;
use App\Models\Category;
use App\Models\Nav;
use App\Models\Tag;
use Carbon\CarbonInterface;
use DateTime;
use File;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Date;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bjyblog:generate-sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generating the sitemap';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $articles = Article::select('id', 'updated_at')
            ->latest('updated_at')
            ->get();

        $categories = Category::select('id', 'updated_at')
            ->latest('updated_at')
            ->get();

        $tags = Tag::select('id', 'updated_at')
            ->latest('updated_at')
            ->get();

        $navs = Nav::select('id', 'updated_at')
            ->latest('updated_at')
            ->get();

        $url = '';
        foreach ($articles as $article) {
            /** @var \App\Models\Article $article */
            $url .= $this->generateUrl(url('article', $article->id), $article->updated_at);
        }

        foreach ($categories as $category) {
            /** @var \App\Models\Category $category */
            $url .= $this->generateUrl(url('category', $category->id), $category->updated_at);
        }

        foreach ($tags as $tag) {
            /** @var \App\Models\Tag $tag */
            $url .= $this->generateUrl(url('tag', $tag->id), $tag->updated_at);
        }

        foreach ($navs as $nav) {
            /** @var \App\Models\Nav $nav */
            $url .= $this->generateUrl(url('nav', $nav->id), $nav->updated_at);
        }

        $url = rtrim($url);

        $xml = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">
$url
</urlset>
XML;

        File::put(public_path('sitemap.xml'), $xml);

        $this->info('Generating the sitemap completed.');
        $this->info('Path: ' . public_path('sitemap.xml'));
    }

    private function generateUrl(string $url, ?CarbonInterface $carbo): string
    {
        $date = $carbo === null ? Date::now()->format(DateTime::ATOM) : $carbo->format(DateTime::ATOM);

        return <<<XML
    <url>
        <loc>$url</loc>
        <lastmod>$date</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>

XML;
    }
}
