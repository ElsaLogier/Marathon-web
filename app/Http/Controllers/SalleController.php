<?php

namespace App\Http\Controllers;

use App\Models\Oeuvre;
use App\Models\Salle;
use Illuminate\Http\Request;

class SalleController extends Controller
{
    public function show(Request $request, int $id)
    {
        $auteur = $request->get('auteur');
        $salle = Salle::findOrFail($id);
        if (empty($auteur)) $oeuvres = $salle->oeuvres;
        else $oeuvres = $salle->oeuvres()->where('auteur', $auteur)->get();
        $sallesSuivantes = $salle->suivantes;
        return view('salle', ['oeuvres' => $oeuvres, 'salle' => $salle, 'sallessuivantes' => $sallesSuivantes]);
    }
}
