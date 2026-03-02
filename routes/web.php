<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Home
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('home');
});

/*
|--------------------------------------------------------------------------
| Product group
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Route sinh viên
|--------------------------------------------------------------------------
*/
Route::get('/sinhvien/{name?}/{mssv?}', function (
    $name = "Mai Thanh Tung",
    $mssv = "0251667"
) {
    return "Sinh viên: $name - MSSV: $mssv";
});

/*
|--------------------------------------------------------------------------
| Bàn cờ vua
|--------------------------------------------------------------------------
*/
Route::get('/banco/{n}', function ($n) {
    return view('banco', compact('n'));
});

/*
|--------------------------------------------------------------------------
| Route không tồn tại
|--------------------------------------------------------------------------
*/
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
use App\Http\Controllers\AuthController;

// --- COMMIT 1: SIGN IN ---
Route::get('/signin', [AuthController::class, 'signIn'])->name('signin');
Route::post('/check-signin', [AuthController::class, 'checkSignIn'])->name('check.signin');
// --- COMMIT 2: MIDDLEWARE TUỔI ---
// 1. Route nhập và lưu tuổi
Route::get('/input-age', [AuthController::class, 'inputAge']);
Route::post('/save-age', [AuthController::class, 'saveAge'])->name('save.age');

// 2. Route cần bảo vệ bởi Middleware (Gom nhóm)
Route::middleware(['check.age'])->group(function () {
    Route::get('/admin', [AuthController::class, 'adminPage'])->name('admin.page');
});
use App\Http\Controllers\CategoryController;

Route::prefix('category')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
});

use App\Http\Controllers\ProductController;

Route::prefix('product')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('product.index');
    Route::get('/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::get('/delete/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
});