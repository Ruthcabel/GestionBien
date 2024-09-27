<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

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

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'auth'])->name('auth');
Route::delete('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/properties', [PropertyController::class, 'index'])->name('property.index');
Route::get('/properties/{slug}-{property}', [PropertyController::class, 'show'])->name('property.show')->where([
    'property' => '[0-9]+',
    'slug' => '[0-9a-z\-]+'
]);
Route::post('/properties/{property}', [PropertyController::class, 'contact'])->name('property.contact');

Route::prefix('admin')->middleware('auth')->name('admin.')->group(function (){
    Route::resource('property', \App\Http\Controllers\Admin\PropertyController::class)->except(['show']);
    Route::resource('option', OptionController::class)->except(['show']);
});

