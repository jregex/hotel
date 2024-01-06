<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TamuController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/', 'middleware' => 'user-auth'], function () {
    // Admin
    Route::controller(AdminController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
        // tipe kamar
        Route::get('/category', 'list_tipe')->name('categories.index');
        Route::get('/category/create', 'create_tipe')->name('categories.create');
        Route::post('/category', 'store_tipe')->name('categories.store');
        Route::delete('/category/{categoryRoom}', 'delete_tipe')->name('categories.delete');
        Route::get('/category/{categoryRoom}/edit', 'edit_tipe')->name('categories.edit');
        Route::patch('/category/{categoryRoom}', 'update_tipe')->name('categories.update');
    });
    // profile & profile
    Route::controller(UserController::class)->group(function () {
        Route::get('/profile_', 'profile')->name('profile_');
        Route::post('/logout_', 'logout')->name('logout_');
        Route::get('/users', 'index')->name('users.index');
        Route::get('/users/create', 'create')->name('users.create');
        Route::post('/users', 'store')->name('users.store');
        Route::delete('/users/{user}', 'destroy')->name('users.delete');
        Route::get('/users/{user}/edit', 'edit')->name('users.edit');
        Route::patch('/users/{user}', 'update')->name('users.update');
        Route::patch('/myprofile_/{user}', 'updateProfile')->name('profile.update');
    });

    // kamar transaksi
    Route::resource('/rooms', RoomController::class)->except(['show']);
    Route::resource('/tamu', TamuController::class)->except(['show']);
    Route::controller(TransactionController::class)->group(function () {
        Route::get('/booking', 'index')->name('booking.index');
        Route::get('/booking/{id}', 'create')->name('booking.create');
        Route::post('/booking', 'store')->name('booking.store');
        Route::get('/list-booking', 'list_booking')->name('bookings.list');
        Route::get('/riwayat-booking', 'riwayat')->name('riwayat.list');
        Route::get('/laporan-booking', 'laporan')->name('riwayat.laporan');
        Route::get('/booking/{transaction}/edit', 'edit')->name('booking.edit');
        Route::patch('/booking/{transaction}', 'update')->name('booking.update');
        Route::delete('/booking/{transaction}', 'destroy')->name('booking.destroy');
        Route::get('/booking/checkout/{transaction}', 'checkout')->name('bookings.checkout');
        Route::post('/invoice-print', 'invoice_print')->name('invoice-print');
        Route::get('/generate-pdf/{transaction}', 'generate_pdf')->name('generatepdf');
    });
    Route::get('/downloadpdf', [AdminController::class, 'downloadPdf'])->name('jadwal.pdf');
    Route::get('/detail/{jadwal}', [AdminController::class, 'detail'])->name('jadwal.detail');
});

Route::get('/', [UserController::class, 'login'])->name('login');
Route::post('/', [UserController::class, 'login_check'])->name('login-check');
