<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatatanController;

/**
 * Routes untuk aplikasi catatan sederhana
 * Dibuat oleh: RAFIF
 */

Route::get('/', function () {
    return redirect()->route('catatan.index');
});

// Resource route untuk CRUD catatan
Route::resource('catatan', CatatanController::class);
