<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibraryController;

Route::get('/', function () {
    return view('welcome');
});

// Library UI routes
Route::get('/books', [LibraryController::class, 'booksIndex'])->name('books.index');
Route::get('/books/create', [LibraryController::class, 'bookCreate'])->name('books.create');
Route::get('/books/{id}/edit', [LibraryController::class, 'bookEdit'])->name('books.edit');
