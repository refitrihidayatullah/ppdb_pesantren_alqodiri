<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthenticateController;
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
Route::get('/users/{id}/edit', [ManagementUsers::class, 'edit'])->middleware('auth');
Route::post('/users/store', [ManagementUsers::class, 'store']);
Route::post('/users/{id}', [ManagementUsers::class, 'changepassword']);
Route::put('/users/{id}', [ManagementUsers::class, 'update']);
Route::delete('/users/{id}', [ManagementUsers::class, 'destroy']);
