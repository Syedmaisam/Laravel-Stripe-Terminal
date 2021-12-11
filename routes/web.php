<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StripeTerminalController;
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
    return view('index');
});
Route::post('/create', [StripeTerminalController::class, 'create'])->name('create');

Route::post('/token', [StripeTerminalController::class, 'token'])->name('token');

Route::post('/capture', [StripeTerminalController::class, 'capture'])->name('capture');
