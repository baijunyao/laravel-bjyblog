<?php

declare(strict_types=1);

namespace App\Http\Controllers\Resources;

use App\Http\Requests\ArticleCover\Store;
use Illuminate\Support\Facades\Date;

class ArticleImageController extends Controller
{
    public function store(Store $request)
    {
        $result = [
            'success' => 1,
            'message' => 'success',
            'url'     => '',
        ];

        foreach (config('bjyblog.upload_disks') as $disk) {
            $result['url'] = '/' . $request->file('image')->store('uploads/article/' . Date::now()->format('Ymd'), $disk);
        }

        return response()->json($result);
    }
}
