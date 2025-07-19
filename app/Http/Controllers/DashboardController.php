<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Recupera tutte le attività create 
        $activities = Activity::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();



        // Recupera tutti gli eventi creati
        $events = Event::where('user_id', Auth::id())
            ->orderBy('start_date', 'asc')
            ->get();




        // ritorna alla dash
        return view('dashboard', compact('activities', 'events'));
    }
}
