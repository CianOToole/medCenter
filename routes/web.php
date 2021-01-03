<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\DoctorController as AdminDoctorController;
use App\Http\Controllers\Admin\PatientController as AdminPatientController;
use App\Http\Controllers\Admin\VisitController as AdminVisitController;
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

Route::get('/admin/doctors/', [AdminDoctorController::class, 'index'])->name('admin.doctors.index');
Route::get('/admin/doctors/create', [AdminDoctorController::class, 'create'])->name('admin.doctors.create');
Route::get('/admin/doctors/{id}', [AdminDoctorController::class, 'show'])->name('admin.doctors.show');
Route::post('/admin/doctors/store', [AdminDoctorController::class, 'store'])->name('admin.doctors.store');
Route::get('/admin/doctors/{id}/edit', [AdminDoctorController::class, 'edit'])->name('admin.doctors.edit');
Route::put('/admin/doctors/{id}', [AdminDoctorController::class, 'update'])->name('admin.doctors.update');
Route::delete('/admin/doctors/{id}', [AdminDoctorController::class, 'destroy'])->name('admin.doctors.destroy');

Route::get('/admin/patients/', [AdminPatientController::class, 'index'])->name('admin.patients.index');
Route::get('/admin/patients/create', [AdminPatientController::class, 'create'])->name('admin.patients.create');
Route::get('/admin/patients/{id}', [AdminPatientController::class, 'show'])->name('admin.patients.show');
Route::post('/admin/patients/store', [AdminPatientController::class, 'store'])->name('admin.patients.store');
Route::get('/admin/patients/{id}/edit', [AdminPatientController::class, 'edit'])->name('admin.patients.edit');
Route::put('/admin/patients/{id}', [AdminPatientController::class, 'update'])->name('admin.patients.update');
Route::delete('/admin/patients/{id}', [AdminPatientController::class, 'destroy'])->name('admin.patients.destroy');

Route::get('/admin/visits/', [AdminVisitController::class, 'index'])->name('admin.visits.index');
Route::get('/admin/visits/create', [AdminVisitController::class, 'create'])->name('admin.visits.create');
Route::get('/admin/visits/{id}', [AdminVisitController::class, 'show'])->name('admin.visits.show');
Route::post('/admin/visits/store', [AdminVisitController::class, 'store'])->name('admin.visits.store');
Route::get('/admin/visits/{id}/edit', [AdminVisitController::class, 'edit'])->name('admin.visits.edit');
Route::put('/admin/visits/{id}', [AdminVisitController::class, 'update'])->name('admin.visits.update');
Route::delete('/admin/visits/{id}', [AdminVisitController::class, 'destroy'])->name('admin.visits.destroy');


Route::get('/user/doctors/', [AdminDoctorController::class, 'index'])->name('user.doctors.index');
Route::get('/user/doctors/{id}', [AdminDoctorController::class, 'show'])->name('user.doctors.show');
Route::delete('/user/doctors/{id}', [AdminDoctorController::class, 'destroy'])->name('user.doctors.destroy');

Route::get('/user/patients/', [AdminPatientController::class, 'index'])->name('admin.patients.index');
Route::get('/user/patients/create', [AdminPatientController::class, 'create'])->name('admin.patients.create');
Route::get('/user/patients/{id}', [AdminPatientController::class, 'show'])->name('admin.patients.show');
Route::post('/user/patients/store', [AdminPatientController::class, 'store'])->name('admin.patients.store');
Route::get('/user/patients/{id}/edit', [AdminPatientController::class, 'edit'])->name('admin.patients.edit');
Route::put('/user/patients/{id}', [AdminPatientController::class, 'update'])->name('admin.patients.update');
Route::delete('/user/patients/{id}', [AdminPatientController::class, 'destroy'])->name('admin.patients.destroy');