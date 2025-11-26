<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
    ]);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
        ? back()->with('status', __($status))
        : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth']);


// Authentication routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Library UI routes
Route::get('/books', [LibraryController::class, 'booksIndex'])->name('books.index');
Route::get('/books/create', [LibraryController::class, 'bookCreate'])->name('books.create');
Route::get('/books/{id}/edit', [LibraryController::class, 'bookEdit'])->name('books.edit');
Route::get('/authors', [LibraryController::class, 'authorsIndex'])->name('authors.index');

// Protected book management routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::post('/books', [BookController::class, 'store'])->name('books.store');
    Route::put('/books/{book}', [BookController::class, 'update'])->name('books.update');
    Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');
});
