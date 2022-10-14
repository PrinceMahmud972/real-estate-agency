<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UpazilaController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/properties', [HomeController::class, 'propertyIndex'])->name('property.index');
Route::get('/properties/{property}', [HomeController::class, 'propertyShow'])->name('property.show');
Route::post('/properties/{property}/bookings', [BookingController::class, 'store'])->name('booking.store');

// User login/register routes
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'postLogin'])->name('postLogin');
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'postRegister'])->name('postRegister');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

// Admin login/regiser routes
Route::get('/admin', [AdminController::class, 'index'])->name('admin.home');
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'postLogin'])->name('admin.postLogin');
Route::get('/admin/register', [AdminController::class, 'register'])->name('admin.register');
Route::post('/admin/register', [AdminController::class, 'postRegister'])->name('admin.postRegister');
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// Booking Routes
Route::get('/admin/bookings', [BookingController::class, 'index'])->name('admin.booking.index');
Route::put('/admin/bookings/{booking}/accept', [BookingController::class, 'statusAccept'])->name('admin.booking.statusAccept');
Route::put('/admin/bookings/{booking}/reject', [BookingController::class, 'statusReject'])->name('admin.booking.statusReject');
Route::delete('/admin/bookings/{booking}', [BookingController::class, 'destroy'])->name('admin.booking.destroy');


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
Route::post('/admin/properties/create', [PropertyController::class, 'store'])->name('admin.property.store');
Route::get('/admin/properties/{property}/edit', [PropertyController::class, 'edit'])->name('admin.property.edit');
Route::put('/admin/properties/{property}', [PropertyController::class, 'update'])->name('admin.property.update');
Route::delete('/admin/properties/{property}', [PropertyController::class, 'destroy'])->name('admin.property.destroy');

// Location Routes
Route::get('/admin/upazilas', [UpazilaController::class, 'index'])->name('admin.upazila.index');
Route::get('/admin/upazilas/create', [UpazilaController::class, 'create'])->name('admin.upazila.create');
Route::post('/admin/upazilas', [UpazilaController::class, 'store'])->name('admin.upazila.store');
Route::delete('/admin/upazilas/{upazila}', [UpazilaController::class, 'destroy'])->name('admin.upazila.destroy');

// Ajax Routes
Route::get('/admin/division/getDistrictAjax/{id}', [DivisionController::class, 'getDistrictAjax'])->name('admin.division.getDistrictAjax');
Route::get('/admin/district/getUpazilaAjax/{id}', [DistrictController::class, 'getUpazilaAjax'])->name('admin.district.getUpazilaAjax');
