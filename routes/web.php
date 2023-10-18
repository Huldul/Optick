<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [PageController::class, "MainPage"]);


Route::middleware('admin')->group(function () {
    Route::get('admin', [AdminController::class, "AdminPage"]);
    Route::get('admin/edit/{id}', [AdminController::class, "Edit"]);
    Route::get('admin/add', [AdminController::class, "AddPage"]);
    Route::post('admin/edit/{id}', [AdminController::class, "EditProduct"]);
    Route::post('admin/add', [AdminController::class, "AddProduct"]);
});
Route::get('/login', [PageController::class, "LoginPage"])->name('login');
Route::post('login/checkPswd', [PageController::class, "CheckPswd"]);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
