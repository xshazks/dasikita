<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\BerandaAdminController;
use App\Http\Controllers\BerandaPnsController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\IndikatorController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\Kelurahan_pnsController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\MendaliController;
use App\Http\Controllers\Opd_pnsController;
use App\Http\Controllers\OpdController;
use App\Http\Controllers\PnsController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\SaranaController;
use App\Http\Controllers\StuntingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Psy\VarDumper\PresenterAware;
use App\Http\Controllers\Auth\RegisterController; // Adjust the path according to your controller
use App\Http\Controllers\Auth\ResetPasswordController;


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

Route::prefix('admin')->middleware(['auth', 'auth.Admin'])->group(function () { //ini route khusus untuk admin
    Route::get('beranda', [BerandaAdminController::class, 'index'])->name('Admin.beranda');
    Route::resource('admin1', AdminController::class);
    Route::resource('user', PnsController::class);
    Route::resource('indikator', IndikatorController::class);
    Route::resource('opd', OpdController::class);
    Route::resource('program', ProgramController::class);
    Route::resource('kegiatan', KegiatanController::class);
    Route::resource('kelurahan', KelurahanController::class);
    Route::get('/kegiatan/create', [KegiatanController::class, 'create'])->name('kegiatan.create');
    Route::resource('kegiatan', KegiatanController::class);
    Route::get('/data', [KelurahanController::class, 'index'])->name('data.index');
    Route::get('admin/opd/{id}', [OpdController::class, 'show'])->name('opd.show');
});




Route::prefix('pns')->middleware(['auth', 'auth.Pns'])->group(function () { //ini route khusus untuk pns
    Route::get('beranda', [BerandaPnsController::class, 'index'])->name('Pns.beranda');
    Route::resource('opd-pns', Opd_pnsController::class);
    Route::resource('kelurahan-pns', Kelurahan_pnsController::class);
    Route::get('/data', [Kelurahan_pnsController::class, 'index'])->name('data_pns.index');
});

Route::get('logout', function () {
    Auth::logout();
    return redirect('/'); // Redirect to the desired route after logout
})->name('logout'); // Naming the route



Route::get('/register-sneat', [RegisterController::class, 'showRegistrationForm'])->name('register_sneat');

Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');

Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');

Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
