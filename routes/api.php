<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\UserController;

Route::get('/products',[ProductController::class,'index']);

Route::post('/purchase',[UserController::class,'purchase']);
