<?php

use Illuminate\Support\Facades\Route;

Route::get('/test-google-config', function () {
    return response()->json([
        'google_client_id' => config('services.google.client_id'),
        'google_redirect' => config('services.google.redirect'),
        'app_url' => config('app.url'),
        'env' => config('app.env'),
    ]);
});