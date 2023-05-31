<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\OnlineController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowedController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Auth::routes(['register' => false]);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('registers')->group(function () {

    Route::get('/create', [RegisterController::class, "create"])->name('registers.create');
    Route::get('', [RegisterController::class, "index"])->name('registers.index');
    Route::post('/store', [RegisterController::class, "store"])->name('registers.store');
    Route::delete('/delete/{id}', [RegisterController::class, "delete"])->name('registers.delete');
    Route::get('/edit/{id}', [RegisterController::class, "edit"])->name('registers.edit');
    Route::put('{id}', [RegisterController::class, "update"])->name('registers.update');
})->middleware('auth');


Route::prefix('categories')->group(function () {
    Route::get('/create', [CategoryController::class, "create"])->name('categories.create');
    Route::get('', [CategoryController::class, "index"])->name('categories.index');
    Route::post('/store', [CategoryController::class, "store"])->name('categories.store');
    Route::delete('/delete/{id}', [CategoryController::class, "delete"])->name('categories.delete');
    Route::get('/edit/{id}', [CategoryController::class, "edit"])->name('categories.edit');
    Route::put('{id}', [CategoryController::class, "update"])->name('categories.update');
})->middleware('auth');


Route::prefix('borrows')->group(function () {
    Route::get('/create', [BorrowedController::class, "create"])->name('borrows.create');
    Route::get('', [BorrowedController::class, "index"])->name('borrows.index');
    Route::post('/store', [BorrowedController::class, "store"])->name('borrows.store');
    Route::post('/return/{id}', [BorrowedController::class, "return"])->name('borrows.return');
    Route::get('/edit/{id}', [BorrowedController::class, "edit"])->name('borrows.edit');
    Route::put('{id}', [BorrowedController::class, "update"])->name('borrows.update');
})->middleware('auth');


Route::prefix('books')->group(function () {
    Route::get('/create', [BookController::class, "create"])->name('books.create');
    Route::get('', [BookController::class, "index"])->name('books.index');
    Route::post('/store', [BookController::class, "store"])->name('books.store');
    Route::delete('/delete/{id}', [BookController::class, "delete"])->name('books.delete');
    Route::get('/edit/{id}', [BookController::class, "edit"])->name('books.edit');
    Route::put('{id}', [BookController::class, "update"])->name('books.update');
})->middleware('auth');


Route::prefix('authors')->group(function () {
    Route::get('/create', [AuthorController::class, "create"])->name('authors.create');
    Route::get('', [AuthorController::class, "index"])->name('authors.index');
    Route::post('/store', [AuthorController::class, "store"])->name('authors.store');
    Route::delete('/delete/{id}', [AuthorController::class, "delete"])->name('authors.delete');
    Route::get('/edit/{id}', [AuthorController::class, "edit"])->name('authors.edit');
    Route::put('{id}', [AuthorController::class, "update"])->name('authors.update');
})->middleware('auth');
