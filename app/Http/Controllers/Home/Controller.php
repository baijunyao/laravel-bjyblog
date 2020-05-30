<?php

declare(strict_types=1);

namespace App\Http\Controllers\Home;

use App\Extensions\Illuminate\View\Factory as ExtendViewFactory;
use App\Http\Controllers\Controller as BaseController;
use Illuminate\Contracts\View\Factory as BaseViewFactory;

class Controller extends BaseController
{
    public function __construct()
    {
        app()->extend(BaseViewFactory::class, function ($view, $app) {
            /** @var \Illuminate\View\Factory $view */
            return new ExtendViewFactory($view->getEngineResolver(), $view->getFinder(), $view->getDispatcher());
        });
    }
}
