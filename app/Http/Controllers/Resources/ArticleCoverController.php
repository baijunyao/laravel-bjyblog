<?php

declare(strict_types=1);

namespace App\Http\Controllers\Resources;

use App\Http\Requests\ArticleCover\Store;
use Baijunyao\LaravelUpload\Upload;

class ArticleCoverController extends Controller
{
    public function store(Store $request)
    {
        $result = Upload::image('cover', 'uploads/article');

        if ($result['status_code'] === 200) {
            $data = [
                'success' => 1,
                'message' => $result['message'],
                'url'     => $result['data'][0]['path'],
            ];
        } else {
            $data = [
                'success' => 0,
                'message' => $result['message'],
                'url'     => '',
            ];
        }

        return response()->json($data);
    }
}
