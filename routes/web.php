<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usercontroller;
use App\Http\Controllers\dashboardcontroller;
use App\Http\Controllers\subscriptioncontroller;
use App\Http\Controllers\songcontroller;

Route::get('/', [usercontroller::class, 'opening'])->name('opening');
Route::get('/register', [usercontroller::class, 'register'])->name('register');
Route::post('/registersubmit', [usercontroller::class, 'registerSubmit'])->name('register.submit');
Route::get('/login', [usercontroller::class, 'login'])->name('login');
Route::post('/loginsubmit', [usercontroller::class, 'loginSubmit'])->name('login.submit');
Route::get('/dashboard', [usercontroller::class, 'dashboard'])->middleware('auth')->name('dashboard');
Route::post('/logout', [usercontroller::class, 'logout'])->middleware('auth')->name('logout');
Route::get('/dashboard', [dashboardcontroller::class, 'showDashboard'])->middleware('auth');
Route::get('/search', [dashboardcontroller::class, 'search'])->middleware('auth');
Route::get('/dashboard', [dashboardcontroller::class, 'index'])->name('dashboard');
Route::get('/profile', [dashboardcontroller::class, 'profile'])->name('profile');
Route::get('/subscription', [subscriptioncontroller::class, 'show'])->name('subscription');
Route::get('/playsong/{song}', [songcontroller::class, 'playSong'])->name('playsong');

use App\Http\Controllers\AdminLoginController;

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [AdminLoginController::class, 'dashboard'])->name('admin.dashboard');
        Route::post('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
    });
});

// routes/web.php

use App\Http\Controllers\AdminSongController;

Route::get('admin/dashboard', [AdminSongController::class, 'index'])->name('admin.dashboard');
Route::post('admin/add-song', [AdminSongController::class, 'store'])->name('admin.add_song');
Route::post('admin/edit-song', [AdminSongController::class, 'update'])->name('admin.edit_song');
Route::post('admin/delete-song', [AdminSongController::class, 'destroy'])->name('admin.delete_song');

// routes/web.php

// routes/web.php

use App\Http\Controllers\ArtistController;

Route::get('/songslist', [ArtistController::class, 'index'])->name('songslist');

use App\Http\Controllers\AdminController;

// // Route for the dashboard
// Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

// Route for the Add Song page (to show the form)
Route::get('/admin/add-song', [AdminController::class, 'showAddSongPage'])->name('admin.add_song_page');

// // Route for handling form submission (adding the song)
// Route::post('/admin/add-song', [AdminController::class, 'addSong'])->name('admin.add_song');

