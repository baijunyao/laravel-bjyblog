<?php

namespace App\Console\Commands\Bjyblog;

use App\Models\Article;
use App\Models\Category;
use App\Models\Nav;
use App\Models\Tag;
use DateTime;
use File;
use Illuminate\Console\Command;

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
            $url .= $this->generateUrl(url('article', $article->id), $article->updated_at->format(DateTime::ATOM));
        }

        foreach ($categories as $category) {
            /** @var \App\Models\Category $category */
            $url .= $this->generateUrl(url('category', $category->id), $category->updated_at->format(DateTime::ATOM));
        }

        foreach ($tags as $tag) {
            /** @var \App\Models\Tag $tag */
            $url .= $this->generateUrl(url('tag', $tag->id), $tag->updated_at->format(DateTime::ATOM));
        }

        foreach ($navs as $nav) {
            /** @var \App\Models\Nav $nav */
            $url .= $this->generateUrl(url('nav', $nav->id), $nav->updated_at->format(DateTime::ATOM));
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

    public function generateUrl($loc, $lastmod)
    {
        return <<<XML
    <url>
        <loc>$loc</loc>
        <lastmod>$lastmod</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>

XML;
    }
}
