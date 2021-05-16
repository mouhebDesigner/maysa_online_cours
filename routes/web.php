<?php

use App\Models\Classe;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormateurController;
use App\Http\Controllers\StagiaireController;
use App\Http\Controllers\Admin\CourController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\ClasseController;
use App\Http\Controllers\Admin\DiplomeController;
use App\Http\Controllers\Admin\MatiereController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Enseignant\ExamenController;
use App\Http\Controllers\Enseignant\AbsenceController;
use App\Http\Controllers\Enseignant\PresenceController;
use App\Http\Controllers\Enseignant\RegistreController;
use App\Http\Controllers\CourController as CourController_client;
use App\Http\Controllers\EventController as EventController_client;
use App\Http\Controllers\Admin\SeanceController as SeanceController_admin;
use App\Http\Controllers\Enseignant\MatiereController as matiere_enseignant;
use App\Http\Controllers\Admin\FormateurController as FormateurController_admin;
use App\Http\Controllers\Admin\StagiaireController as StagiaireController_admin;
use App\Http\Controllers\Enseignant\SeanceController as SeanceController_enseignant;

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
    Route::middleware(['auth'])->group(function () {
        //
        Route::resource('diplomes', DiplomeController::class);
        Route::resource('events', EventController::class);
        Route::resource('cours', CourController::class);
        Route::resource('matieres', MatiereController::class);
        Route::resource('formateurs', FormateurController_admin::class);
        Route::resource('stagiaires', StagiaireController_admin::class);
        Route::resource('examens', ExamenController_admin::class);
        Route::resource('classes', ClasseController::class);
        Route::resource('seances', SeanceController_admin::class);
        Route::get('user/{id}/approuver', [UserController::class, 'approuver']);
        Route::get('users', [UserController::class, 'index']);
        Route::delete('user/{id}', [UserController::class, 'destroy']);
    
        Route::prefix('cour/{cour_id}')->group(function ($cour_id){
            Route::resource('videos', VideoController::class)->only(['index', 'create', 'store']);
        });
        Route::resource('videos', VideoController::class)->only(['update', 'destroy', 'edit']);
    });
});
Route::prefix('enseignant')->group(function () {
    Route::middleware(['auth'])->group(function () {
        //
        Route::resource('examens', ExamenController::class);
        Route::resource('seances', SeanceController_enseignant::class);
        Route::resource('matieres', matiere_enseignant::class);
        Route::get('absences/{stagiaire_id}/{seance_id}', [RegistreController::class, 'absence']);
        Route::get('presences/{stagiaire_id}/{seance_id}', [AbsenceController::class, 'absence']);
        Route::get('seance/{matiere_id}/registre', [RegistreController::class, 'index']);
        Route::get('/examen/{examen_id}/stagiaires', [ExamenController::class, 'stagiaires']);
    });
});

Route::get('/classe_list/{diplome_id}', function($diplome_id){
    $classes = Classe::where('diplome_id', $diplome_id)->get();
    return response()->json($classes);
});
Route::resource('cours', CourController_client::class);
Route::resource('events', EventController_client::class);

Route::get('contact', function(){
    return view('contact');
})->name('contact');
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
