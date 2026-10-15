<?php

use App\Http\Controllers\AlatMedisController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/alat-medis', [AlatMedisController::class, 'index']);
