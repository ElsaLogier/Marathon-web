<?php

namespace App\Http\Controllers;

use App\Models\Oeuvre;
use Illuminate\Http\Request;

class OeuvreController extends Controller
{
    public function index() {

    }

    public function show(int $id) {
        return view('oeuvres.show', ['oeuvre' => Oeuvre::findOrFail($id)]);
    }

    public function create() {

    }

    public function store() {

    }

    public function edit() {

    }

    public function destroy() {

    }
}
