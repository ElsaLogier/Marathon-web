<?php

namespace App\Http\Controllers;

use App\Models\Oeuvre;
use App\Models\Salle;
use App\Models\Tag;
use Illuminate\Http\Request;

class SalleController extends Controller
{
    public function show(Request $request, int $id)
    {
        $auteur = $request->get('auteur');
        $tag = $request->get('tag');
        $salle = Salle::findOrFail($id);
        if (empty($auteur) and empty($tag)) $oeuvres = $salle->oeuvres;
        else if (empty($auteur)) $oeuvres = Tag::where('intitule', $tag)->first()->oeuvres()->where('salle_id', $salle->id)->get();
        else $oeuvres = $salle->oeuvres()->where('auteur', $auteur)->get();
        $sallesSuivantes = $salle->suivantes;
        return view('salle', ['oeuvres' => $oeuvres, 'salle' => $salle, 'sallessuivantes' => $sallesSuivantes]);
    }
}
