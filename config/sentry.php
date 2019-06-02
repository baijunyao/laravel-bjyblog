<?php

return array(
    'dsn' => env('SENTRY_LARAVEL_DSN'),

    'release' => config('bjyblog.version'),

    'breadcrumbs' => [

        // Capture bindings on SQL queries logged in breadcrumbs
        'sql_bindings' => true,

    ],
);
