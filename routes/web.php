<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/all-users', [UserController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard.users');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::delete('/delete-user/{id}', [UserController::class, 'destroy'])->middleware('checkUserRole')->name('delete-user.destroy');
    Route::get('/product/add-product', [ProductController::class,'create'])->middleware('checkUserRole')->name('add.product');
    Route::post('/product/add-product', [ProductController::class,'store'])->name('store.product');
});

Route::get('/product', [ProductController::class,'index'])->name('product');
Route::get('/product/{id}', [ProductController::class,'show'])->name('product.id');


require __DIR__.'/auth.php';
