<?php

declare(strict_types=1);

namespace App\Http\Controllers\Resources;

use App\Http\Requests\Config\QqQunOrCode;
use Baijunyao\LaravelRestful\Traits\Index;
use Baijunyao\LaravelRestful\Traits\Show;
use Baijunyao\LaravelRestful\Traits\Update;
use Baijunyao\LaravelUpload\Upload;

class ConfigController extends Controller
{
    use Index, Show, Update;

    protected const PER_PAGE = 1000;

    public function uploadQqQunOrCode(QqQunOrCode $request)
    {
        $file = Upload::file('file', 'uploads/images', [], false);
        $path = $file['status_code'] === 200 ? $file['data'][0]['path'] : '';

        return response()->json([
            'url' => $path,
        ]);
    }
}
