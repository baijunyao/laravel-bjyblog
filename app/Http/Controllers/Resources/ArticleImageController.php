<?php

declare(strict_types=1);

namespace App\Http\Controllers\Resources;

use App\Http\Requests\ArticleCover\Store;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Date;

class ArticleImageController extends Controller
{
    public function store(Store $request): JsonResponse
    {
        $result = [
            'success' => 1,
            'message' => 'success',
            'url'     => '',
        ];

        foreach (config('bjyblog.upload_disks') as $disk) {
            $image = $request->file('image');

            assert($image instanceof \Illuminate\Http\UploadedFile);

            $result['url'] = '/' . $image->store('uploads/article/' . Date::now()->format('Ymd'), $disk);
        }

        return response()->json($result);
    }
}
