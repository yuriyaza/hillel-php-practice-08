<?php

use App\Http\Controllers\UrlMinimizeController;
use App\Http\Controllers\UrlRestoreController;
use Illuminate\Support\Facades\Route;

Route::get('/minimize', [UrlMinimizeController::class, 'index']);
Route::get('/{url}', [UrlRestoreController::class, 'index']);
