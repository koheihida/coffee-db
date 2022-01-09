<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommentsController;

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
    return view('other.top');
});
Route::get('/test', function () {
    return view('other.test');
});
Route::get('/load', function () {
    return view('other.loading');
});

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('index');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/store', [HomeController::class, 'store'])->name('store');
Route::get('/edit/{id}', [HomeController::class, 'edit'])->name('edit');
Route::post('/update', [HomeController::class, 'update'])->name('update');
Route::post('/destroy', [HomeController::class, 'destroy'])->name('destroy');
Route::get('/find', [HomeController::class, 'find'])->name('find');
Route::get('/search', [HomeController::class, 'search'])->name('search');

Route::get('/open', [CommentsController::class, 'index'])->name('index');
Route::get('/open/{id}', [CommentsController::class, 'show'])->name('show');

