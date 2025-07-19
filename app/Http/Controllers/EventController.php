<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    // mostrare il form 
    public function create()
    {
        return view("events.create");
    }





    // Validazione dei dati per la creazione dell'evento
    public function store(Request $request)
    {
        $request->validate([
            "title" => "required|string|max:100",
            "description" => "nullable|string|max:300",
            "location" => "nullable|string|max:150",
            "start_date" => "required|date",
            "end_date" => "required|date",
        ]);



        // Salva evento
        Event::create([
            "user_id" => Auth::id(),
            "title" => $request->title,
            "description" => $request->description,
            "location" => $request->location,
            "start_date" => $request->start_date,
            "end_date" => $request->end_date,
            'category' => $request->category ?? 'altro',
        ]);




        // reindirizzamento 
        return redirect('/dashboard')->with("success", "Evento creato con successo");
    }















    //! Visualizzazione calendario 
    public function calendar()
    {
        return view("calendar.index");
    }


    // recupera eventi dell'utente per inserirli nel calendario
    public function calendarEvents(): JsonResponse
    {
        $events = Event::where('user_id', Auth::id())->get();

        $colorMap = [
            'compleanno' => '#e53935',   // rosso
            'festival' => '#fdd835',     // giallo
            'allenamento' => '#43a047',  // verde
            'altro' => '#1e88e5',        // blu
        ];

        $formatted = $events->map(function ($event) use ($colorMap) {
            return [
                'title' => $event->title,
                'start' => $event->start_date,
                'end' => $event->end_date,
                'color' => $colorMap[$event->category] ?? '#9e9e9e', // colore predefinito grigio
            ];
        });

        return response()->json($formatted);
    }
}
