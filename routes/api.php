<?php

use Illuminate\Support\Facades\Route;


Route::get('/news/{slug}', [App\Http\Controllers\Api\NewsController::class, 'show']);
Route::get('/news', [App\Http\Controllers\Api\NewsController::class, 'index']);
