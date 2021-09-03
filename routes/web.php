<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('export', [App\Http\Controllers\HomeController::class, 'export'])->name('export');
// Route::get('importExportView', 'HomeController@importExportView');
Route::post('import', [App\Http\Controllers\HomeController::class, 'import'])->name('import');

Route::get('getFiles', [App\Http\Controllers\HomeController::class, 'getFiles'])->name('files');
Route::get('setUrls', [App\Http\Controllers\HomeController::class, 'setUrls'])->name('urls');