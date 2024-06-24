<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\DashboardSantriController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManagementUsers;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'index']);
Route::get('/register', [AuthenticateController::class, 'register']);
Route::post('/register', [AuthenticateController::class, 'register_action']);
Route::get('/login', [AuthenticateController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthenticateController::class, 'login_action']);
Route::get('/logout', [AuthenticateController::class, 'logout_action']);


Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth']);
Route::get('/users', [ManagementUsers::class, 'index'])->middleware('auth');
Route::get('/users/create', [ManagementUsers::class, 'create'])->middleware('auth');
Route::get('/users/create-panitia', [ManagementUsers::class, 'createPanitia'])->middleware('auth');
Route::get('/users/{id}/edit', [ManagementUsers::class, 'edit'])->middleware('auth');
Route::get('/users/{id}/edit-panitia', [ManagementUsers::class, 'editPanitia'])->middleware('auth');
Route::post('/users/store', [ManagementUsers::class, 'store']);
Route::post('/users/store-panitia', [ManagementUsers::class, 'storePanitia']);
Route::put('/users/changepassword/{id}', [ManagementUsers::class, 'changepassword']);
Route::put('/users/changepassword-panitia/{id}', [ManagementUsers::class, 'changepasswordPanitia']);
Route::put('/users/update/{id}', [ManagementUsers::class, 'update']);
Route::put('/users/update-panitia/{id}', [ManagementUsers::class, 'updatePanitia']);
Route::delete('/users/{id}', [ManagementUsers::class, 'destroy']);
Route::delete('/users/panitia/{id}', [ManagementUsers::class, 'destroyPanitia']);


// santri first
Route::get('/dashboard-santri', [DashboardSantriController::class, 'index']);
Route::get('/form-pendaftaran', [DashboardSantriController::class, 'formPendaftaran']);
Route::post('/form-pendaftaran/store', [DashboardSantriController::class, 'storePendaftaran']);
Route::get('/provinsi', [DashboardSantriController::class, 'provinsi']);
Route::post('/provinsi/store', [DashboardSantriController::class, 'storeProvinsi']);
// select2 wilayah indonesia first
Route::get('selectProvinsi', [DashboardSantriController::class, 'selectProvinsi']);
Route::get('selectKabupaten/{id}', [DashboardSantriController::class, 'selectKabupaten']);
// select2 wilayah indonesia end
//santri end
