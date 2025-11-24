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
    Route::get('books', [BookController::class, 'index']);
    Route::get('books/{book}', [BookController::class, 'show']);
    Route::middleware(\App\Http\Middleware\CheckAdmin::class)->group(function () {
        Route::post('books', [BookController::class, 'store']);
        Route::put('books/{book}', [BookController::class, 'update']);
        Route::delete('books/{book}', [BookController::class, 'destroy']);
    });

    // Borrow routes
    Route::apiResource('borrows', BorrowController::class)->only(['index', 'store', 'update', 'show', 'destroy']);

    // Reservation routes
    Route::apiResource('reservations', ReservationController::class)->only(['index', 'store', 'destroy']);
});
