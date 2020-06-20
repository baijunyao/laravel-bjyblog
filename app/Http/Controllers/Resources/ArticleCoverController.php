<?php

declare(strict_types=1);

namespace App\Http\Controllers\Resources;

use App\Http\Requests\ArticleCover\Store;
use Illuminate\Support\Facades\Date;

class ArticleCoverController extends Controller
{
    public function store(Store $request)
    {
        $imagePath = $request->file('cover')->store('uploads/article' . Date::now()->format('Ymd'), 'public');

        return response()->json([
            'success' => 1,
            'message' => 'success',
            'url'     => '/' . $imagePath,
        ]);
    }
}
