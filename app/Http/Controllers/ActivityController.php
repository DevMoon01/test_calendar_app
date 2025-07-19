<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    //! ===================== Mostra il form ==================
    public function activity_create()
    {
        return view("activities.create");
    }






    //! ================== Validazione dati per inserimento dell'attività 
    public function activity_store(Request $request)
    {
        $request->validate([
            "type" => "required|string|max:100",
            "amount" => "nullable|integer",
            "note" => "nullable|string|max:250",
            "date" => "required|date",
        ]);




        // Creazione nuova attivià 
        Activity::create([
            "user_id" => Auth::id(),
            "type" => $request->type,
            "amount" => $request->amount,
            "note" => $request->note,
            "date" => $request->date,
        ]);




        // Reindirizza 
        return redirect("/dashboard")->with("success","Attività creata con successo");
    }
}
