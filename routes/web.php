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
Route::prefix('product')->group(function () {

    // /product
    Route::get('/', function () {
        return view('product.index');
    })->name('product.index');

    // /product/add
    Route::get('/add', function () {
        return view('product.add');
    })->name('product.add');

    // /product/{id}
    Route::get('/{id?}', function ($id = '123') {
        return "Chi tiết sản phẩm có ID: $id";
    });
});

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