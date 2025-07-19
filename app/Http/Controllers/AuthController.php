<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\User;





class AuthController extends Controller
{



    //!======================= Mostra la pagina del form =================================
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    //!===================================================================================













    //! ======================== Inserimento dati nel DB =================================
    public function register(Request $request)
    {
        // Validazione dei dati dal form 
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users', // Campo univoco 
            'password' => 'required|confirmed|min:6',
        ], [
            'name.required' => 'Il nome è richiesto',
            'email.required' => 'La email è richiesta',
            'password.required' => 'La password è richiesta',
            'password.confirmed' => 'Le password non sono identiche',
        ]);



        // Passaggio dei dati validati al DB
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);




        // Login automatico dopo la registrazione
        Auth::login($user);




        // Redirect alla pagina profilo utente loggato
        return redirect('/dashboard')->with('success', 'Registrazione effettuata con successo');
    }

    //! ====================================================================================















    //! ================================= Gestione del login =================================

    public function showLoginForm()
    {
        return view('auth.login');
    }




    public function login(Request $request)
    {

        // Validazione dati prima di passarli 
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'La email è obbligatoria',
            'password.required' => 'La password è obbligatoria',
        ]);




        // Preparazione dati per il tentativo di login
        $credentials  = $request->only('email', 'password');


        // Tenta il login 
        if (Auth::attempt($credentials)) {

            // Genera la sessione per sicurezza
            $request->session()->regenerate();

            // Reindirizza alla dashboard 
            return redirect('/dashboard')->with('success', 'Accesso effettuato');
        }



        // Login fallito
        return back()->withErrors([
            'email' => 'Credenziali non valide',
        ]);
    }

    //! ======================================================================================
}
