<?php

declare(strict_types=1);

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;

class OpenSourceController extends Controller
{
    public function index()
    {
        $assign = [
            'category_id' => 'openSource',
            'title'       => translate('Open Source'),
            'head'        => [
                'title'       => 'Open Source',
                'keywords'    => '',
                'description' => '',
            ],
        ];

        return view('home.index.openSource', $assign);
    }
}
