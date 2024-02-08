<?php

use App\Http\Controllers\MinimizeUrlController;
use App\Http\Controllers\RestoreUrlController;
use Illuminate\Support\Facades\Route;

Route::get('/minimize', [MinimizeUrlController::class, 'index']);
Route::get('/{shortUrl}', [RestoreUrlController::class, 'index']);
