<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('front.home');
})->name('home');

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'postLogin'])->name('postLogin');
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'postRegister'])->name('postRegister');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.home');
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'postLogin'])->name('admin.postLogin');
Route::get('/admin/register', [AdminController::class, 'register'])->name('admin.register');
Route::post('/admin/register', [AdminController::class, 'postRegister'])->name('admin.postRegister');
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');


// Property Type Routes
Route::get('/admin/types/', [TypeController::class, 'index'])->name('admin.type.index');
Route::get('/admin/types/create', [TypeController::class, 'create'])->name('admin.type.create');
Route::post('/admin/types/create', [TypeController::class, 'store'])->name('admin.type.store');
Route::get('/admin/types/{type}/edit', [TypeController::class, 'edit'])->name('admin.type.edit');
Route::put('/admin/types/{type}', [TypeController::class, 'update'])->name('admin.type.update');
Route::delete('/admin/types/{type}', [TypeController::class, 'destroy'])->name('admin.type.destroy');

// Property Routes
Route::get('/admin/properties/', [PropertyController::class, 'index'])->name('admin.property.index');
Route::get('/admin/properties/create', [PropertyController::class, 'create'])->name('admin.property.create');
// Route::post('/admin/properties/create', [TypeController::class, 'store'])->name('admin.property.store');
// Route::get('/admin/properties/{type}/edit', [TypeController::class, 'edit'])->name('admin.property.edit');
// Route::put('/admin/properties/{type}', [TypeController::class, 'update'])->name('admin.property.update');
// Route::delete('/admin/properties/{type}', [TypeController::class, 'destroy'])->name('admin.property.destroy');

// Ajax Routes
Route::get('/admin/division/getDistrictAjax/{id}', [DivisionController::class, 'getDistrictAjax'])->name('admin.division.getDistrictAjax');
Route::get('/admin/district/getUpazilaAjax/{id}', [DistrictController::class, 'getUpazilaAjax'])->name('admin.district.getUpazilaAjax');
