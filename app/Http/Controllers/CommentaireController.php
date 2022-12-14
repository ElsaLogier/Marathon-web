<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Oeuvre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentaireController extends Controller
{
    public function create() {
        return view('commentaires.create', ['oeuvres' => Oeuvre::all()]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'titre' => 'required',
            'oeuvre' => 'required',
            'contenu' => 'required'
        ]);

        $com = new Commentaire();
        $com->titre = $request->titre;
        $com->contenu = $request->contenu;
        $com->user_id = Auth::user()->id;
        $com->oeuvre_id = $request->oeuvre;
        $com->valide = true;
        $com->save();
        return redirect()->route('oeuvres.show', $request->oeuvre);
    }
}
