<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $commentaires = $user->commentaires;
        $oeuvresLikees = $user->likes;
        return view('compte', ['commentaires' => $commentaires, 'likes' => $oeuvresLikees]);
    }
    public function upload(Request $request)
    {
        $user = Auth::user();
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $file = $request->file('file');
        } else {
            return redirect()->route('compte');
        }
        $nom = 'avatar';
        $now = time();
        $nom = sprintf("%s_%d.%s", $nom, $now, $file->extension());

        $file->storeAs('images/avatars', $nom);
        // Si l'avatar de l'utilisateur n'est pas par défaut
        if ($user->avatar != 'images/avatars/avatar-1.png' || $user->avatar != 'images/avatars/avatar-2.png') {
            Storage::delete($user->avatar);
        }
        $user->avatar = 'images/avatars/'.$nom;
        $user->save();
        return redirect()->route('compte');
    }
}
