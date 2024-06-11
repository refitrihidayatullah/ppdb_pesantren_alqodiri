<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\HomeController;
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
Route::get('/dashboard', [DashboardController::class, 'dashboard']);
Route::get('/register', [AuthenticateController::class, 'register']);
Route::post('/register', [AuthenticateController::class, 'register_action']);
Route::get('/login', [AuthenticateController::class, 'login']);
Route::post('/login', [AuthenticateController::class, 'login_action']);
