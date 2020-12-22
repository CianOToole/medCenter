<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController as AdminUserController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home');
Route::get('/user/home', [App\Http\Controllers\User\HomeController::class, 'index'])->name('user.home');

Route::get('/admin/users/', [AdminUserController::class, 'index'])->name('admin.users.index');
Route::get('/admin/users/create', [AdminUserController::class, 'create'])->name('admin.users.create');
Route::get('/admin/users/{id}', [AdminUserController::class, 'show'])->name('admin.users.show');
Route::post('/admin/users/store', [AdminUserController::class, 'store'])->name('admin.users.store');
Route::get('/admin/users/{id}/edit', [AdminUserController::class, 'edit'])->name('admin.users.edit');
Route::put('/admin/users/{id}', [AdminUserController::class, 'update'])->name('admin.users.update');
Route::delete('/admin/users/{id}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');

Route::get('/admin/doctors/', [AdminUserController::class, 'index'])->name('admin.doctors.index');
Route::get('/admin/doctors/create', [AdminUserController::class, 'create'])->name('admin.doctors.create');
Route::get('/admin/doctors/{id}', [AdminUserController::class, 'show'])->name('admin.doctors.show');
Route::post('/admin/doctors/store', [AdminUserController::class, 'store'])->name('admin.doctors.store');
Route::get('/admin/doctors/{id}/edit', [AdminUserController::class, 'edit'])->name('admin.doctors.edit');
Route::put('/admin/doctors/{id}', [AdminUserController::class, 'update'])->name('admin.doctors.update');
Route::delete('/admin/doctors/{id}', [AdminUserController::class, 'destroy'])->name('admin.doctors.destroy');

Route::get('/admin/patients/', [AdminUserController::class, 'index'])->name('admin.patients.index');
Route::get('/admin/patients/create', [AdminUserController::class, 'create'])->name('admin.patients.create');
Route::get('/admin/patients/{id}', [AdminUserController::class, 'show'])->name('admin.patients.show');
Route::post('/admin/patients/store', [AdminUserController::class, 'store'])->name('admin.patients.store');
Route::get('/admin/patients/{id}/edit', [AdminUserController::class, 'edit'])->name('admin.patients.edit');
Route::put('/admin/patients/{id}', [AdminUserController::class, 'update'])->name('admin.patients.update');
Route::delete('/admin/patients/{id}', [AdminUserController::class, 'destroy'])->name('admin.patients.destroy');
