<?php

namespace App\Http\Controllers;

use App\Models\Salle;
use Illuminate\Http\Request;

class AccueilController extends Controller
{
    public function index()
    {
        $salles = Salle::all();
        $salleExpo = Salle::where('entree', 1)->first();
        return view('accueil', ['salles' => $salles, 'salleexpo' => $salleExpo]);
    }
}
