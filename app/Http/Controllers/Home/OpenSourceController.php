<?php

declare(strict_types=1);

namespace App\Http\Controllers\Home;

class OpenSourceController extends Controller
{
    public function index()
    {
        $assign = [
            'category_id' => 'openSource',
            'title'       => __('Open Source'),
        ];

        return view('home.index.openSource', $assign);
    }
}
