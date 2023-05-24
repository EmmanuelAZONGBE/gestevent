<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LieuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\PrestataireController;
use App\Http\Controllers\ReclamationController;
use App\Http\Controllers\OrganisateurController;
use App\Http\Controllers\TypeEvenementController;
use App\Http\Controllers\Frontend\EvenementController as FrontendEvenementController;


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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::resource('user_profile', ProfileController::class);

route::get('/logout',[LoginController::class,'logout']);

route::get('/organisateur/forme',function(){
    return view('auth.organisateurform');
})->name('organisateurform');



route::get('/',[HomeController::class,'index']);

route::get('/redirect',[HomeController::class,'redirect']);

//partie view admin
Route::get('/welcome',[AdminController::class,'welcome']);

Route::get('/user/index', [UserController::class,'index'])->name('user.index');

Route::get('/user/create', [UserController::class,'create'])->name('user.create');

Route::post('/user/store', [UserController::class,'store'])->name('user.store');

Route::get('/user/edit/{id}', [UserController::class,'edit'])->name('user.edit');

Route::put('/user/update/{id}', [UserController::class,'update'])->name('user.update');

Route::delete('/user/destroy/{id}', [UserController::class,'destroy'])->name('user.destroy');



//client route
Route::get('/client/index', [ClientController::class,'index'])->name('client.index');

Route::get('/client/create', [ClientController::class,'create'])->name('client.create');

Route::post('/client/store', [ClientController::class,'store'])->name('client.store');

Route::get('/client/edit/{id}', [ClientController::class,'edit'])->name('client.edit');

Route::put('update/{client}', [ClientController::class,'update'])->name('client.update');

Route::get('/client/show', [ClientController::class,'show'])->name('client.show');

Route::delete('/client/destroy/{id}', [ClientController::class,'destroy'])->name('client.destroy');



//evenement route

Route::get('/evenement/index', [EvenementController::class,'index'])->name('evenement.index');

Route::get('/evenement/create', [EvenementController::class,'create'])->name('evenement.create');

Route::post('/evenement/store', [EvenementController::class,'store'])->name('evenement.store');

Route::get('/evenement/edit/{id}', [EvenementController::class,'edit'])->name('evenement.edit');

Route::put('/evenement/update/{id}', [EvenementController::class,'update'])->name('evenement.update');

Route::post('/evenement/update{evenement}', [EvenementController::class,'update']);

Route::delete('/evenement/destroy/{id}', [EvenementController::class,'destroy'])->name('evenement.destroy');

Route::get('/evenement/show', [EvenementController::class,'show'])->name('evenement.show');



//service route
Route::get('/service/index', [ServiceController::class,'index'])->name('service.index');

Route::get('/service/create', [ServiceController::class,'create'])->name('service.create');

Route::post('/service/store', [ServiceController::class,'store'])->name('service.store');

Route::get('/service/edit/{id}', [ServiceController::class,'edit'])->name('service.edit');

Route::put('/service/update/{id}', [ServiceController::class,'update'])->name('service.update');

Route::post('/service/update{service}', [ServiceController::class,'update']);

Route::delete('/service/destroy/{id}', [ServiceController::class,'destroy'])->name('service.destroy');

Route::get('/service/show', [ServiceController::class,'show'])->name('service.show');


// prestataire routes

Route::get('/prestataire/index', [PrestataireController::class,'index'])->name('prestataire.index');

Route::get('/prestataire/create', [PrestataireController::class,'create'])->name('prestataire.create');

Route::post('/prestataire/store', [PrestataireController::class,'store'])->name('prestataire.store');

Route::get('/prestataire/edit/{id}', [PrestataireController::class,'edit'])->name('prestataire.edit');

Route::put('/prestataire/update/{id}', [PrestataireController::class,'update'])->name('prestataire.update');

Route::post('/prestataire/update{prestataire}', [PrestataireController::class,'update']);

Route::delete('/prestataire/destroy/{id}', [PrestataireController::class,'destroy'])->name('prestataire.destroy');

Route::get('/prestataire/show', [PrestataireController::class,'show'])->name('prestataire.show');


// organisateur routes
Route::get('/organisateur/index', [OrganisateurController::class,'index'])->name('organisateur.index');

Route::get('/organisateur/create', [OrganisateurController::class,'create'])->name('organisateur.create');

Route::post('/organisateur/store', [OrganisateurController::class,'store'])->name('organisateur.store');

Route::get('/organisateur/edit/{id}', [OrganisateurController::class,'edit'])->name('organisateur.edit');

Route::put('/organisateur/update/{id}', [OrganisateurController::class,'update'])->name('organisateur.update');

Route::post('/organisateur/update{organisateur}', [OrganisateurController::class,'update']);

Route::delete('/organisateur/destroy/{id}', [OrganisateurController::class,'destroy'])->name('organisateur.destroy');

Route::get('/organisateur/show', [OrganisateurController::class,'show'])->name('organisateur.show');


Route::post('/organisateur/storeLogin', [OrganisateurController::class,'storeLogin'])->name('organisateur.storeLogin');


//Route::resource('profile', ProfileController::class);


Route::get('/lieu/index', [LieuController::class,'index'])->name('lieu.index');

Route::get('/lieu/create', [LieuController::class,'create'])->name('lieu.create');

Route::post('/lieu/store', [LieuController::class,'store'])->name('lieu.store');

Route::get('/lieu/edit/{id}', [LieuController::class,'edit'])->name('lieu.edit');

Route::put('/lieu/update{id}', [LieuController::class,'update'])->name('lieu.update');

Route::delete('/lieu/destroy/{id}', [LieuController::class,'destroy'])->name('lieu.destroy');

Route::get('/lieu/show', [LieuController::class,'show'])->name('lieu.show');


// Route::resource('/reclamations', ReclamationController::class);

Route::get('/reclamation/index', [ReclamationController::class,'index'])->name('reclamation.index');

Route::get('/reclamation/create', [ReclamationController::class,'create'])->name('reclamation.create');

Route::post('/reclamation/store', [ReclamationController::class,'store'])->name('reclamation.store');

Route::get('/reclamation/edit/{id}', [ReclamationController::class,'edit'])->name('reclamation.edit');

Route::put('/reclamation/update/{id}', [ReclamationController::class,'update'])->name('reclamation.update');

Route::delete('/reclamation/destroy/{id}', [ReclamationController::class,'destroy'])->name('reclamation.destroy');


// typeevenements routes

Route::get('type/index', [TypeEvenementController::class,'index'])->name('type.index');

Route::get('type/create', [TypeEvenementController::class,'create'])->name('type.create');

Route::post('type/store', [TypeEvenementController::class,'store'])->name('type.store');

Route::get('type/edit/{id}', [TypeEvenementController::class,'edit'])->name('type.edit');

Route::put('type/update/{id}', [TypeEvenementController::class,'update'])->name('type.update');

Route::post('type/update{typeevenement}', [TypeEvenementController::class,'update']);

Route::delete('type/destroy/{id}', [TypeEvenementController::class,'destroy'])->name('type.destroy');



//frontend routes

// Evenements Frontend routes
Route::get('frontend_evenements/create', [FrontendEvenementController::class,'create'])->name('frontend_evenements.create');
Route::post('frontend_evenements/store', [FrontendEvenementController::class,'store'])->name('frontend_evenements.store');

// Reclamations Frontend routes
Route::get('/frontend_reclamations/create', [ReclamationController::class,'create'])->name('frontend_reclamations.create');
Route::post('/frontend_reclamations/store', [ReclamationController::class,'store'])->name('frontend_reclamations.store');


//
