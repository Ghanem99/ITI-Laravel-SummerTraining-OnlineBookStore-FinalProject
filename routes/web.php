<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Models\Book;

use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReturnedBookController;

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminBookController;
use App\Http\Controllers\AdminUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



// User Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/books', [BookController::class, 'index'])->name('books.index');
    Route::post('/books/{book}', [BookController::class, 'borrow'])->name('books.borrow');
    Route::patch('/books/{book}', [BookController::class, 'return'])->name('books.return');
    Route::get('/users/returned-books', [ReturnedBookController::class, 'index'])->name('returned-books');

    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

});

// Admin Routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/users', [AdminDashboardController::class, 'users'])->name('admin/users');
    Route::get('/admin/books', [AdminDashboardController::class, 'books'])->name('admin/books');
    Route::get('/admin/returned-books', [AdminDashboardController::class, 'returnedBooks'])->name('admin/returned-books');
    Route::get('/admin/borrowed-books', [AdminDashboardController::class, 'borrowedBooks'])->name('admin/borrowed-books');

    Route::get('/admin/books/create', [AdminBookController::class, 'create'])->name('books.create');
    Route::post('/admin/books', [AdminBookController::class, 'store'])->name('books.store');
    Route::get('/admin/books/{book}/edit', [AdminBookController::class, 'edit'])->name('books.edit');
    Route::patch('/admin/books/{book}', [AdminBookController::class, 'update'])->name('books.update');
    Route::delete('/admin/books/{book}', [AdminBookController::class, 'destroy'])->name('books.destroy');

    // route to create a user 
    Route::get('/admin/users/create', [AdminUserController::class, 'create'])->name('users.create');
    Route::post('/admin/users', [AdminUserController::class, 'store'])->name('users.store');
    Route::get('/admin/users/{user}/edit', [AdminUserController::class, 'edit'])->name('users.edit');
    Route::patch('/admin/users/{user}', [AdminUserController::class, 'update'])->name('users.update');
    Route::delete('/admin/users/{user}', [AdminUserController::class, 'destroy'])->name('users.destroy');

});


require __DIR__.'/auth.php';
