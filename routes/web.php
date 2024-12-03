<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware' => ['auth', 'role:admin']], function() {
    Route::resource('/books', BookController::class);
    Route::get('books.borrow', [BookController::class, 'borrow'])->name('books.borrow');
    Route::put('/books/{id}/status', [BookController::class, 'status'])->name('books.status');

    Route::resource('/users', UserController::class);
    Route::get('users.admin', [UserController::class, 'admin'])->name('users.admin');
    Route::post('users.adminStore', [UserController::class, 'admin_store'])->name('admins.store');
});

Route::group(['middleware' => ['auth', 'role:member']], function() {
    Route::resource('member', MemberController::class);
    Route::get('member.borrow', [MemberController::class, 'borrow'])->name('member.borrow');
    Route::get('member.history', [MemberController::class, 'history'])->name('member.history');
});

// Route::resource('borrow', BorrowController::class);




require __DIR__.'/auth.php';
