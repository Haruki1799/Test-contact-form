<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;
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

Route::get('/', [ContactController::class, 'index']);
Route::post('/contacts/confirm', [ContactController::class, 'confirm'])->name('contacts.confirm');
Route::post('/contacts/thanks', [ContactController::class, 'store']);
Route::get('/', [CategoryController::class, 'index']);
Route::get('/register', [UserController::class, 'index']);
Route::post('/register', [RegisterController::class, 'Registration'])->name('register.store');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login.attempt');


Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/search', [AdminController::class, 'search'])->name('admin.search');
Route::get('/admin/{id}', [AdminController::class, 'show'])->name('admin.show');
Route::post('/admin/export', [AdminController::class, 'export'])->name('admin.export');

Route::delete('/admin/contacts/{id}', [AdminController::class, 'destroy'])->name('admin.contacts.destroy');


Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');