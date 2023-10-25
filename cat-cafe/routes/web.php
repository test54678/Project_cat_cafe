<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactController;

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

Route::get('/', function () {
    return view('index');
});

Route::get('/contact',[ContactController::class, 'index'])->name('contact');
Route::post('/contact',[ContactController::class, 'sendMail']);
Route::get('/contact/complete',[ContactController::class, 'complete'])->name('contact.complete');
