<?php

namespace App\Http\Controllers;

use App\Models\Salle;
use Illuminate\Http\Request;

class SalleController extends Controller
{
    public function store(Request $request, int $id)
    {
        $salle = Salle::findOrFail($id);
        $oeuvres = $salle->oeuvres;
        $sallesSuivantes = $salle->suivantes;
        return view('salle', ['oeuvres' => $oeuvres, 'salle' => $salle, 'sallessuivantes' => $sallesSuivantes]);
    }
}
