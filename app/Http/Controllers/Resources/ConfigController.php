<?php

declare(strict_types=1);

namespace App\Http\Controllers\Resources;

use App\Http\Requests\Config\QqQunOrCode;
use Baijunyao\LaravelRestful\Traits\Index;
use Baijunyao\LaravelRestful\Traits\Show;
use Baijunyao\LaravelRestful\Traits\Update;

class ConfigController extends Controller
{
    use Index, Show, Update;

    protected const PER_PAGE = 1000;

    public function uploadQqQunOrCode(QqQunOrCode $request)
    {
        $imagePath = $request->file('file')->store('uploads/images', 'public');

        return response()->json([
            'url' => $imagePath,
        ]);
    }
}
