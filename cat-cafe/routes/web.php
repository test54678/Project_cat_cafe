<?php

use App\Http\Controllers\Admin\AdminBlogController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactController;

use App\Http\Controllers\CustomControllerGurey;

use App\Http\Controllers\CustomControllerGureyMultiMonth;

use App\Http\Controllers\CustomControllerGureyMultiMonthSeijou;

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
    // phpinfo();
    // exit();
    Session::flush();
    session(['今日はいい天気' => 'あいうえお']);
    session(['abcdefghijk' => 98765432]);
    // Session::flush();
    return view('index');
});

Route::get('/contact',[ContactController::class, 'index'])->name('contact');
Route::post('/contact',[ContactController::class, 'sendMail']);
Route::get('/contact/complete',[ContactController::class, 'complete'])->name('contact.complete');

//ブログ
Route::get('/admin/blogs',[AdminBlogController::class, 'index']);
Route::get('/admin/blogs/create',[AdminBlogController::class, 'create']);

Route::get('/ab',[CustomController::class, 'index']);
Route::get('/abc',[CustomControllerGurey::class, 'index']);

Route::get('/abcd',[CustomControllerGureyMultiMonth::class, 'index']);

Route::get('/abcde',[CustomControllerGureyMultiMonthSeijou::class, 'index']);