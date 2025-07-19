<?php

use App\Models\Activity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FollowController;



Route::get('/', function () {
    return view('auth.register');
});
Route::get('/users/{id}', [UserController::class, 'profile'])->middleware('auth')->name('user.profile');








//! ========================= REGISTRAZIONE ============================


//? Route per mostrare il form di registrazione
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');


//? Route per inviare i dati dal form al DB
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

//! ===================================================================













//! ========================= ACCESSO =================================

//? Route per mostrare il form di accesso
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');


//? Route per gestire il form
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

//! ===================================================================













//! ========================= DASHBOARD =================================

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

//! ===================================================================













//! ========================= LOGOUT =================================

Route::post('/logout', function () {
    //  Chiude la sessione utente
    Auth::logout();

    //  Rigenera la sessione per sicurezza
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    //  Torna alla pagina iniziale (puoi cambiarla)
    return redirect('/login');
})->name('logout');

//! ===================================================================















//! ========================= ATTIVITA =================================

//? Visualizza il form per inserire una nuova attività 
Route::get('/activities/create', [ActivityController::class, 'activity_create'])->middleware('auth')->name('activity.create');


//? Riceve i dati del form e salva
Route::post('/activities', [ActivityController::class, 'activity_store'])->middleware('auth')->name('activity.store');

//! ===================================================================















//! ========================= CERCA =================================

//? Pagina con form di ricerca per attivita
Route::get('/search', [SearchController::class, 'search_show'])->middleware('auth')->name('search.page');


//? Risultato della ricerca
Route::get('/search/results', [SearchController::class, 'results'])->middleware('auth')->name('search.results');

//! ===================================================================















//! ========================= EVENTI =================================

//? mostra il form per creare un evento 
Route::get('/events/create', [EventController::class, 'create'])->middleware('auth')->name('event.create');


//? Salva l'evento 
Route::post('/events', [EventController::class, 'store'])->middleware('auth')->name('event.store');

//! ===================================================================















//! ========================= CALENDARIO ============================

//? Mostra la pagina del calendario
Route::get('/calendar', [EventController::class, 'calendar'])->middleware('auth')->name('calendar');


//? Endpoint per gli eventi HSON
Route::get('/calendar/events', [EventController::class, 'calendarEvents'])->middleware('auth')->name('calendar.events');

//! ===================================================================

















//! ========================= FOLLOWER ================================

Route::post('/users/{id}/follow', [FollowController::class, 'follow'])->middleware('auth')->name('user.follow');
Route::post('/users/{id}/unfollow', [FollowController::class, 'unfollow'])->middleware('auth')->name('user.unfollow');

//! ===================================================================