<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormateurController;
use App\Http\Controllers\StagiaireController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SectionController;

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
Route::prefix('admin')->group(function () {
    Route::resource('sections', SectionController::class);
    Route::get('user/{id}/approuver', [UserController::class, 'approuver']);
    Route::get('users', [UserController::class, 'index']);
    Route::delete('user/{id}', [UserController::class, 'destroy']);
});

Route::post('formateur', [FormateurController::class, 'store']);
Route::post('stagiaire', [StagiaireController::class, 'store']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
