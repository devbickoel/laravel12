<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('loading');
});
Route::get('/403', function () {
    return response()->view('errors.403', [], 403);
});
Route::middleware(['telegram_auth'])->group(function () {
    Route::get('/main', function () {
        return view('welcome');
    });
});