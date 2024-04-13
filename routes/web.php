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
    // refactor and use model relation!
    Route::get('/admin/users', [AdminDashboardController::class, 'users'])->name('admin/users');
    Route::get('/admin/books', [AdminDashboardController::class, 'books'])->name('admin/books');
    // end refactor and use model relation!

    Route::get('/admin/returned-books', [AdminDashboardController::class, 'returnedBooks'])->name('admin/returned-books');
    Route::get('/admin/borrowed-books', [AdminDashboardController::class, 'borrowedBooks'])->name('admin/borrowed-books');

    Route::group(['prefix', 'admin'], function () {
        Route::resource('book', BookController::class);
    });

    // route to create a user 
    Route::resource('user', UserController::class);
});


require __DIR__.'/auth.php';
