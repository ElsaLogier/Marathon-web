<?php

namespace App\Http\Controllers;

use App\Models\Oeuvre;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function destroy(int $id) {
        $user = User::find(Auth::user()->id);
        $oeuvre = Oeuvre::find($id);
        $user->likes()->detach($oeuvre);
        return redirect()->route('oeuvres.show', $id);
    }

    public function store(Request $request) {
        $user = User::find(Auth::user()->id);
        $oeuvre = Oeuvre::find($request->id);
        $user->likes()->save($oeuvre);
        return redirect()->route('oeuvres.show', $request->id);
    }
}
