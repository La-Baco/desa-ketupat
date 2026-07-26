<?php

use Illuminate\Support\Facades\Route;

// Public Controllers
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\ProfileController;
use App\Http\Controllers\Public\AparaturPublicController;
use App\Http\Controllers\Public\BeritaPublicController;
use App\Http\Controllers\Public\AgendaPublicController;
use App\Http\Controllers\Public\PotensiPublicController;
use App\Http\Controllers\Public\GalleryPublicController;
use App\Http\Controllers\Public\ContactPublicController;

// Auth Controller
use App\Http\Controllers\Auth\AuthController;

// Admin Controllers
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\DesaProfileController;
use App\Http\Controllers\Admin\DesaStatisticController;
use App\Http\Controllers\Admin\AparaturDesaController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\AgendaController;
use App\Http\Controllers\Admin\PotensiController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\WebsiteVisitController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PasswordController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profil', [ProfileController::class, 'index'])->name('profil');
Route::get('/aparatur-desa', [AparaturPublicController::class, 'index'])->name('aparatur');

Route::get('/berita', [BeritaPublicController::class, 'index'])->name('berita.index');
Route::get('/berita/{slug}', [BeritaPublicController::class, 'show'])->name('berita.show');

Route::get('/agenda', [AgendaPublicController::class, 'index'])->name('agenda.index');

Route::get('/potensi', [PotensiPublicController::class, 'index'])->name('potensi.index');
Route::get('/potensi/{slug}', [PotensiPublicController::class, 'show'])->name('potensi.show');

Route::get('/galeri', [GalleryPublicController::class, 'index'])->name('galeri.index');
Route::get('/kontak', [ContactPublicController::class, 'index'])->name('kontak');

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Admin Panel Routes (Protected by Auth Middleware)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Site Settings
    Route::get('/pengaturan', [SiteSettingController::class, 'index'])->name('pengaturan.index');
    Route::post('/pengaturan', [SiteSettingController::class, 'update'])->name('pengaturan.update');

    // Desa Profile
    Route::get('/profil', [DesaProfileController::class, 'index'])->name('profil.index');
    Route::post('/profil', [DesaProfileController::class, 'update'])->name('profil.update');

    // Desa Statistics
    Route::get('/statistik', [DesaStatisticController::class, 'index'])->name('statistik.index');
    Route::post('/statistik', [DesaStatisticController::class, 'store'])->name('statistik.store');
    Route::put('/statistik/{statistic}', [DesaStatisticController::class, 'update'])->name('statistik.update');
    Route::delete('/statistik/{statistic}', [DesaStatisticController::class, 'destroy'])->name('statistik.destroy');

    // Visitor Statistics
    Route::get('/statistik-pengunjung', [WebsiteVisitController::class, 'index'])->name('statistik-pengunjung.index');

    // Aparatur Desa CRUD
    Route::resource('aparatur', AparaturDesaController::class);

    // Berita CRUD
    Route::resource('berita', BeritaController::class);

    // Agenda CRUD
    Route::resource('agenda', AgendaController::class);

    // Potensi Desa CRUD
    Route::resource('potensi', PotensiController::class);

    // Galeri CRUD
    Route::resource('galeri', GalleryController::class);

    // Kelola Admin CRUD
    Route::resource('users', UserController::class);

    // Ganti Password
    Route::get('/password', [PasswordController::class, 'edit'])->name('password.edit');
    Route::put('/password', [PasswordController::class, 'update'])->name('password.update');
});
