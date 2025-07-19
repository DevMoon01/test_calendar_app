<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follower;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function follow($id)
    {
        Follower::firstOrCreate([
            'user_id' => $id,
            'follower_id' => Auth::id(),
        ]);

        return back()->with('success', 'Hai iniziato a seguire questo utente.');
    }

    public function unfollow($id)
    {
        Follower::where('user_id', $id)
            ->where('follower_id', Auth::id())
            ->delete();

        return back()->with('success', 'Hai smesso di seguire questo utente.');
    }
}
