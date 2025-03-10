<?php

use App\Http\Controllers\CheckController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/check', [CheckController::class, 'check']);
Route::get('/history', [CheckController::class, 'history']);
