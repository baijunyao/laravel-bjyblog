<?php

declare(strict_types=1);

namespace App\Http\Controllers\Home;

use App\Models\FriendshipLink;

class FriendshipLinkController extends Controller
{
    public function index()
    {
        $friendshipLinks = FriendshipLink::paginate();

        return view('home.friendshipLink.index', compact('friendshipLinks'));
    }
}
