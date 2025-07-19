<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile($id)
    {
        $user = User::findOrFail($id);
        $activities = $user->activities()->orderBy('date', 'desc')->get();
      

        return view('users.profile', compact('user', 'activities'));
    }
}
