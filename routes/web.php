<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ValidatorController;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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
})->name('home');

Route::get('pdf', function(){
    return view('pdf');
});

Route::get('registration', [RegisterController::class, 'index'])->name('register');
Route::post('registration', [RegisterController::class,'store'])->name('register.store');

Route::get('validate/{slug}', [ValidatorController::class, 'qrvalidate'])->name('qrvalidate')->middleware('admin.user');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::get('scan', function(){
        return view('admin.scan');
    })->middleware('admin.user');
});
