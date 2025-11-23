<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    // Book CRUD routes
    Route::apiResource('books', BookController::class);

    // Borrow routes
    Route::apiResource('borrows', BorrowController::class)->only(['index', 'store', 'update', 'show', 'destroy']);
});
