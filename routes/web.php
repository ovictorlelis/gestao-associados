<?php

use App\Http\Livewire\{
    Associate,
    Associates,
    Create,
    Document,
    Login
};
use Illuminate\Support\Facades\Route;

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

Route::get('/acessar', Login::class)->middleware('guest')->name('login');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', Associates::class)->name('home');
    Route::get('/associado/novo/{dependent?}', Create::class)->name('create');
    Route::get('/associado/{associate}', Associate::class)->name('associate');
    Route::get('/documento/{associate}/{documentId?}', Document::class)->name('document');
});
