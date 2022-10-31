<?php

use App\Http\Controllers\CardController;
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

Route::get('/', function () {
    return view('generator');
});

Route::post('/generator', [CardController::class, 'getCard'])->name('get.card');
Route::get('/generator', [CardController::class, 'index'])->name('generator.index');
Route::get('/generator/{card}', [CardController::class, 'generateQRCode'])->name('generator.qrcode');

Route::get('/card/{card}/{nome}', [CardController::class, 'showCard'])->name('card.show');

