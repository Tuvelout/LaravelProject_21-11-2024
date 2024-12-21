<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::get('/products', [ApiController::class, 'index']);
Route::get('/products/{id}', [ApiController::class, 'show']);
