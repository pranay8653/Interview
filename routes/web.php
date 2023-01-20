<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\SessionController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::view('/login','login')->name('login');
Route::post('/login_user', [SessionController::class,'login'])->name('login.user');

// Route::get('/create_blog', [BlogController::class, 'create']);
// Admin create
Route::get('/create_admin', [AdminController::class, 'create'])->name('create.admin');
Route::post('/store_admin', [AdminController::class, 'store'])->name('admin.register.data');

// Guest create
Route::get('/create_guest', [GuestController::class, 'create'])->name('create.guest');
Route::post('/store_guest', [GuestController::class, 'store'])->name('guest.register.data');

//Show Font page
Route::get('/', [BlogController::class, 'show2'])->name('show.blogs2');

Route::middleware('auth:web')->group(function(){
    Route::get('/logout', [SessionController::class, 'logout'])->name('logout');

    // Admin
    Route::group(['middleware' => ['loginuser:admin']], function(){
        Route::view('/admin_dashboard', 'Admin.dashboard');
        Route::get('/create_blog', [BlogController::class, 'create'])->name('create.blog');
        Route::post('/store_blog', [BlogController::class, 'store'])->name('store.blog');
        Route::get('/show_blog', [BlogController::class, 'show'])->name('show.blogs');
        Route::get('/edit_blog/{id}', [BlogController::class, 'edit'])->name('edit.blog');
        Route::put('/update_blog/{id}', [BlogController::class, 'update'])->name('update.blog');
        Route::get('/delete_blog/{id}', [BlogController::class, 'destroy'])->name('delete.blog');
    });

    // Guest
    Route::group(['middleware' => ['loginuser:guest']], function(){
        Route::view('/Guest_dashboard', 'Guest.dashboard');

    });
});
