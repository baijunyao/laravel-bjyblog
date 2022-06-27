<?php

declare(strict_types=1);

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Feed\Feed;
use Spatie\Feed\Helpers\ResolveFeedItems;

class FeedController extends Controller
{
    public function index(Request $request): Response
    {
        $items = ResolveFeedItems::resolve('main', config('feed.feeds.main.items'));

        $feed = new Feed(
            config('bjyblog.head.title', ''),
            $items,
            $request->url(),
            config('feed.feeds.main.view', 'feed::atom'),
            config('bjyblog.head.description', ''),
            config('feed.feeds.main.language', 'en-US'),
            config('feed.feeds.main.image', ''),
            config('feed.feeds.main.format', 'atom')
        );

        return $feed->toResponse($request);
    }
}
