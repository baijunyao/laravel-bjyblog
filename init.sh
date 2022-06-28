#!/usr/bin/env bash

composer install
php artisan key:generate --force
php artisan passport:keys --force
php artisan migrate
php artisan db:seed
