<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;





Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('/product', [ProductController::class, 'index']);
Route::post('/product/add', [ProductController::class, 'store']);
Route::get('/product/destroy/{id}', [ProductController::class, 'destroy']);
Route::post('/product/edit', [ProductController::class, 'edit']);
Route::post('/product/change', [ProductController::class, 'change']);


