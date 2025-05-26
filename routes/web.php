<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestbookController;
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
Route::view('/', 'index1');
Route::get('index1', [GuestbookController::class, 'index'])->name('guestbook.index');
Route::post('index1', [GuestbookController::class, 'store'])->name('guestbook.store');
