<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Redis;

class SearchController extends Controller
{
    //! Mostrare il form di ricerca
    public function search_show()
    {
        return view("search.form");
    }




    //! Validazione per la ricerca
    public function results(Request $request)
    {
        $request->validate([
            "type" => "required|string",
        ], [
            "type.required" => "La tipologia è richiesta",
        ]);



        // Trova utenti che hanno fatto un attività di quel tipo
        $userIds = Activity::where('type', $request->type)
            ->pluck('user_id')
            ->unique();


        $users = User::whereIn('id', $userIds)->get();


        // Ritorna un dato 
        return view('search.results', compact('users', 'request'));
    }
}
