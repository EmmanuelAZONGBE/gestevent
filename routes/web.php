<?php

use App\Events\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LieuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\NouvelleNotification;
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

Route::resource('paniers',PanierController::class);
});
Route::delete('panier/destroy/{id}', [PanierController::class, 'destroy'])->name('panier.destroy');

Route::get('panier/downloadPDF/{id}', [PanierController::class, 'downloadPDF'])->name('panier.downloadPDF');

Route::get('panier/sendMessage/{id}', [PanierController::class, 'sendMessage'])->name('panier.sendMessage');

Route::post('/send-message', function (Request $request) {
    event(new App\Events\Message($request->first_name, $request->last_name, $request->message));
    return ['success' => true];
});

Route::resource('user_profile', ProfileController::class);

route::get('/logout',[LoginController::class,'logout']);

route::get('/organisateur/forme',function(){
    return view('auth.organisateurform');
})->name('organisateurform');



route::get('/',[HomeController::class,'index']);

Route::get('/notifications/index', [NouvelleNotification::class, 'index'])->name('notifications.index');



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

Route::delete('/evenement/destroy/{id}', [EvenementController::class,'destroy'])->name('evenement.destroy');

Route::get('/evenement/show', [EvenementController::class,'show'])->name('evenement.show');

// Route::post('/evenement/accepter/{id}', [EvenementController::class, 'accepter'])->name('evenement.accepter');

// Route::post('/evenement/rejeter/{id}', [EvenementController::class, 'rejeter'])->name('evenement.rejeter');



//service route
Route::get('/service/index', [ServiceController::class,'index'])->name('service.index');

Route::get('/service/create', [ServiceController::class,'create'])->name('service.create');

Route::post('/service/store', [ServiceController::class,'store'])->name('service.store');

Route::get('/service/edit/{id}', [ServiceController::class,'edit'])->name('service.edit');

Route::put('/service/update/{id}', [ServiceController::class,'update'])->name('service.update');

Route::delete('/service/destroy/{id}', [ServiceController::class,'destroy'])->name('service.destroy');

Route::get('/service/show', [ServiceController::class,'show'])->name('service.show');

Route::post('/service/accepter/{id}', [ServiceController::class, 'accepter'])->name('service.accepter');

Route::post('/service/rejeter/{id}', [ServiceController::class, 'rejeter'])->name('service.rejeter');

Route::post('/service/ajout_panier/{id}',[ServiceController::class,'ajout_panier'])->name('service.ajout_panier');

Route::get('/service/show_panier',[ServiceController::class,'show_panier'])->name('service.show_panier');

Route::get('/service/retir_panier',[ServiceController::class,'retir_panier'])->name('service.retir_panier');

Route::get('/service/print_pdf/{id}',[ServiceController::class,'print_pdf'])->name('service.print_pdf');




// prestataire routes

Route::get('/prestataire/index', [PrestataireController::class,'index'])->name('prestataire.index');

Route::get('/prestataire/create', [PrestataireController::class,'create'])->name('prestataire.create');

Route::post('/prestataire/store', [PrestataireController::class,'store'])->name('prestataire.store');

Route::get('/prestataire/edit/{id}', [PrestataireController::class,'edit'])->name('prestataire.edit');

Route::put('/prestataire/update/{id}', [PrestataireController::class,'update'])->name('prestataire.update');

Route::delete('/prestataire/destroy/{id}', [PrestataireController::class,'destroy'])->name('prestataire.destroy');

Route::get('/prestataire/show', [PrestataireController::class,'show'])->name('prestataire.show');



// organisateur routes
Route::get('/organisateur/index', [OrganisateurController::class,'index'])->name('organisateur.index');

Route::get('/organisateur/create', [OrganisateurController::class,'create'])->name('organisateur.create');

Route::post('/organisateur/store', [OrganisateurController::class,'store'])->name('organisateur.store');

Route::get('/organisateur/edit/{id}', [OrganisateurController::class,'edit'])->name('organisateur.edit');

Route::put('/organisateur/update/{id}', [OrganisateurController::class,'update'])->name('organisateur.update');

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

// Route::post('/lieu/accepter/{id}', [LieuController::class, 'accepter'])->name('lieu.accepter');

// Route::post('/lieu/rejeter/{id}', [LieuController::class, 'rejeter'])->name('lieu.rejeter');

// Route::resource('/reclamations', ReclamationController::class);

Route::get('/reclamation/index', [ReclamationController::class,'index'])->name('reclamation.index');

Route::get('/reclamation/create', [ReclamationController::class,'create'])->name('reclamation.create');

Route::post('/reclamation/store', [ReclamationController::class,'store'])->name('reclamation.store');

Route::get('/reclamation/edit/{id}', [ReclamationController::class,'edit'])->name('reclamation.edit');

Route::put('/reclamation/update/{id}', [ReclamationController::class,'update'])->name('reclamation.update');

Route::delete('/reclamation/destroy/{id}', [ReclamationController::class,'destroy'])->name('reclamation.destroy');

// Route::post('/reclamation/accepter/{id}', [ReclamationController::class, 'accepter'])->name('reclamation.accepter');

// Route::post('/reclamation/rejeter/{id}', [ReclamationController::class, 'rejeter'])->name('reclamation.rejeter');


// typeevenements routes

Route::get('type/index', [TypeEvenementController::class,'index'])->name('type.index');

Route::get('type/create', [TypeEvenementController::class,'create'])->name('type.create');

Route::post('type/store', [TypeEvenementController::class,'store'])->name('type.store');

Route::get('type/edit/{id}', [TypeEvenementController::class,'edit'])->name('type.edit');

Route::put('type/update/{id}', [TypeEvenementController::class,'update'])->name('type.update');

Route::delete('type/destroy/{id}', [TypeEvenementController::class,'destroy'])->name('type.destroy');

// Route::post('/type/accepter/{id}', [TypeEvenementController::class, 'accepter'])->name('type.accepter');

// Route::post('/type/rejeter/{id}', [TypeEvenementController::class, 'rejeter'])->name('type.rejeter');

//frontend routes

// Evenements Frontend routes
Route::get('frontend_evenements/create', [FrontendEvenementController::class,'create'])->name('frontend_evenements.create');
Route::post('frontend_evenements/store', [FrontendEvenementController::class,'store'])->name('frontend_evenements.store');

// Reclamations Frontend routes
Route::get('/frontend_reclamations/create', [ReclamationController::class,'create'])->name('frontend_reclamations.create');
Route::post('/frontend_reclamations/store', [ReclamationController::class,'store'])->name('frontend_reclamations.store');


//contact
Route::get('/contact/index', [ContactController::class,'index'])->name('contact.index');
Route::get('/contact/thankyou', [ContactController::class,'thankYou'])->name('contact.thankyou');
Route::post('/contact', [ContactController::class, 'sendEmail'])->name('contact.send');
