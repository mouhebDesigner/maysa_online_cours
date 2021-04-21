<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormateurController;
use App\Http\Controllers\StagiaireController;
use App\Http\Controllers\Admin\CourController;
use App\Http\Controllers\CourController as CourController_client;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\EventController as EventController_client;
use App\Http\Controllers\Admin\DiplomeController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\FormateurController as FormateurController_admin;

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
    return view('first');
});
Route::get('/welcome', function () {
    return view('welcome');
});
Route::prefix('admin')->group(function () {
    Route::resource('diplomes', DiplomeController::class);
    Route::resource('events', EventController::class);
    Route::resource('cours', CourController::class);
    Route::resource('formateurs', FormateurController_admin::class);
    Route::get('user/{id}/approuver', [UserController::class, 'approuver']);
    Route::get('users', [UserController::class, 'index']);
    Route::delete('user/{id}', [UserController::class, 'destroy']);
});
Route::get('cours/{id}/show', [CourController_client::class, 'show']);
Route::get('events/{id}/show', [EventController_client::class, 'show']);
// register forms 
Route::get('register/stagiaire', function(){
    return view('auth.register_stagiaire');
});
Route::get('register/formateur', function(){
    return view('auth.register_formateur');
});
Route::post('formateur', [FormateurController::class, 'store']);
Route::post('stagiaire', [StagiaireController::class, 'store']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
