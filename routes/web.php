<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManagementUsers;
use App\Http\Controllers\ManagementContent;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\DashboardSantriController;

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



// Role superadmin
Route::middleware(['auth', 'superAdmin'])->group(function () {

    // management users
    Route::controller(ManagementUsers::class)->group(function () {
        // all users
        Route::get('/users/create', 'create');
        Route::post('/users/store', 'store');
        Route::get('/users/{id}/edit', 'edit');
        Route::put('/users/update/{id}', 'update');
        Route::put('/users/changepassword/{id}', 'changepassword');
        Route::delete('/users/{id}', 'destroy');
        // all panitia
        Route::get('/users/create-panitia', 'createPanitia');
        Route::post('/users/store-panitia', 'storePanitia');
        Route::get('/users/{id}/edit-panitia', 'editPanitia');
        Route::put('/users/update-panitia/{id}', 'updatePanitia');
        Route::put('/users/changepassword-panitia/{id}', 'changepasswordPanitia');
        Route::delete('/users/panitia/{id}', 'destroyPanitia');
    });

    // formulir pendaftaran
    Route::controller(DashboardSantriController::class)->group(function () {
        Route::get('/form-pendaftaran-users/{id}', 'formUsersPendaftaran');
        Route::post('/form-pendaftaran-users/store', 'storeUsersPendaftaran');
    });

    // management validasi pendaftaran santri
    Route::controller(DashboardSantriController::class)->group(function () {
        Route::put('/validasi-pendaftaran/{id}', 'updateValidasiPendaftaran');
    });
});

// Role Superadmin & admin
Route::middleware(['auth', 'adminSuperadmin'])->group(function () {
    // dashboard
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'dashboard');
    });
    // management users
    Route::controller(ManagementUsers::class)->group(function () {
        Route::get('/users', 'index');
    });
    // management content
    Route::controller(ManagementContent::class)->group(function () {
        Route::get('/content', 'index');
        Route::get('/content/create-general', 'createGeneral');
        Route::get('/content/create-alurpendaftaran', 'createAlurPendaftaran');
        Route::get('/content/create-syaratpendaftaran', 'createSyaratPendaftaran');
        Route::get('/content/create-alurpenyerahan', 'createAlurPenyerahan');
        Route::get('/content/create-informasipelayanan', 'createInformasiPelayanan');
        Route::post('/content/store-general', 'storeGeneral');
        Route::post('/content/store-alurpendaftaran', 'storeAlurPendaftaran');
        Route::post('/content/store-syaratpendaftaran', 'storeSyaratPendaftaran');
        Route::post('/content/store-image-syaratpendaftaran', 'storeImageSyaratPendaftaran');
        Route::post('/content/store-image-informasipelayanan', 'storeImageInformasiPelayanan');
        Route::post('/content/store-alurpenyerahan', 'storeAlurPenyerahan');
        Route::post('/content/store-informasipelayanan', 'storeInformasiPelayanan');
        Route::get('/content/{id}/edit-general', 'editGeneral');
        Route::get('/content/{id}/edit-alurpendaftaran', 'editAlurPendaftaran');
        Route::get('/content/{id}/edit-syaratpendaftaran', 'editSyaratPendaftaran');
        Route::get('/content/{id}/edit-alurpenyerahan', 'editAlurPenyerahan');
        Route::get('/content/{id}/edit-informasipelayanan', 'editInformasiPelayanan');
        Route::put('/content/update-general/{id}', 'updateGeneral');
        Route::put('/content/update-alurpendaftaran/{id}', 'updateAlurPendaftaran');
        Route::put('/content/update-syaratpendaftaran/{id}', 'updateSyaratPendaftaran');
        Route::put('/content/update-image-syaratpendaftaran/{id}', 'updateImageSyaratPendaftaran');
        Route::put('/content/update-alurpenyerahan/{id}', 'updateAlurPenyerahan');
        Route::put('/content/update-informasipelayanan/{id}', 'updateInformasiPelayanan');
        Route::put('/content/update-image-informasipelayanan/{id}', 'updateImageInformasiPelayanan');
        Route::delete('/content/general/{id}', 'destroyGeneral');
        Route::delete('/content/alurpendaftaran/{id}', 'destroyAlurPendaftaran');
        Route::delete('/content/syaratpendaftaran/{id}', 'destroySyaratPendaftaran');
        Route::delete('/content/image-syaratpendaftaran/{id}', 'destroyImageSyaratPendaftaran');
        Route::delete('/content/alurpenyerahan/{id}', 'destroyAlurPenyerahan');
        Route::delete('/content/informasipelayanan/{id}', 'destroyInformasiPelayanan');
        Route::delete('/content/image-informasipelayanan/{id}', 'destroyImageInformasiPelayanan');
    });
    Route::controller(DashboardSantriController::class)->group(function () {
        Route::get('/validasi-pendaftaran', 'validasiPendaftaran');
    });
    // cetak pdf form calon santri
    Route::get('/form-pendaftaran-users/cetak-pdf/{id}', [ManagementUsers::class, 'cetakPdfFormCalonSantri']);
});

// Role Superadmin & Admin Putra
Route::middleware(['auth', 'adminPutraSuperadmin'])->group(function () {
    // management user putra
    Route::controller(ManagementUsers::class)->group(function () {
        Route::get('/users/create-user-putra', 'createUserPutra');
        Route::post('/users/store-putra', 'storePutra');
        Route::get('/users/{id}/edit-putra', 'editPutra');
        Route::put('/users/update-putra/{id}', 'updatePutra');
        Route::put('/users/changepassword-putra/{id}', 'changepasswordPutra');
        Route::delete('/users/putra/{id}', 'destroyPutra');
    });

    // formulir pendaftaran putra
    Route::controller(DashboardSantriController::class)->group(function () {
        Route::get('/form-pendaftaran-putra/{id}', 'formPutraPendaftaran');
        Route::post('/form-pendaftaran-putra/store', 'storePutraPendaftaran');
    });
    // management validasi pendaftaran santri putra
    Route::controller(DashboardSantriController::class)->group(function () {
        Route::put('/validasi-pendaftaran-putra/{id}', 'updateValidasiPendaftaranPutra');
    });
});
// Role Superadmin & Admin Putri
Route::middleware(['auth', 'adminPutriSuperadmin'])->group(function () {
    Route::controller(ManagementUsers::class)->group(function () {
        Route::get('/users/create-user-putri', 'createUserPutri');
        Route::post('/users/store-putri', 'storePutri');
        Route::get('/users/{id}/edit-putri', 'editPutri');
        Route::put('/users/update-putri/{id}', 'updatePutri');
        Route::put('/users/changepassword-putri/{id}', 'changepasswordPutri');
        Route::delete('/users/putri/{id}', 'destroyPutri');
    });

    // formulir pendaftaran putri
    Route::controller(DashboardSantriController::class)->group(function () {
        Route::get('/form-pendaftaran-putri/{id}', 'formPutriPendaftaran');
        Route::post('/form-pendaftaran-putri/store', 'storePutriPendaftaran');
    });
    // management validasi pendaftaran santri putra
    Route::controller(DashboardSantriController::class)->group(function () {
        Route::put('/validasi-pendaftaran-putri/{id}', 'updateValidasiPendaftaranPutri');
    });
});

// Role CalonSantri
Route::middleware(['auth', 'calonSantri'])->group(function () {
    Route::controller(DashboardSantriController::class)->group(function () {
        Route::get('/dashboard-santri', 'index');
    });
});


// all auth first
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [DashboardSantriController::class, 'profile']);
    Route::put('/profile-changepassword', [DashboardSantriController::class, 'changepassword']);
    Route::post('/profile-changeimages', [DashboardSantriController::class, 'changeimages']);
    Route::get('/form-pendaftaran', [DashboardSantriController::class, 'formPendaftaran']);
    Route::post('/form-pendaftaran/store', [DashboardSantriController::class, 'storePendaftaran']);

    Route::get('/form-pendaftaran/{id}/edit', [DashboardSantriController::class, 'EditFormPendaftaran']);
    Route::post('/form-pendaftaran/update/{id}', [DashboardSantriController::class, 'updatePendaftaran']);
    Route::get('/form-info-pendaftaran', [DashboardSantriController::class, 'formInfoPendaftaran']);
    // import excell data wilayah first
    // Route::get('/provinsi', [DashboardSantriController::class, 'provinsi']);
    // Route::post('/provinsi/store', [DashboardSantriController::class, 'storeProvinsi']);
    // import excell data wilayah end

    Route::get('/form-pendaftaran/cetak/{id}', [DashboardSantriController::class, 'cetakPendaftaran']);

    Route::post('/getkabupaten', [DashboardSantriController::class, 'getkabupaten'])->name('getkabupaten');
    Route::post('/getkecamatan', [DashboardSantriController::class, 'getkecamatan'])->name('getkecamatan');
    Route::post('/getkelurahan', [DashboardSantriController::class, 'getkelurahan'])->name('getkelurahan');
});
