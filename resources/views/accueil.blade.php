@extends('layouts.app')

@section('titre')Accueil @endsection

@section('vite')@vite(['resources/scss/app.scss','resources/css/app.css','resources/js/app.js']) @endsection

@section('content')
<div class="container">
    <div class="illustration">
        <img class="oeuvre" src="{{asset('storage/images/oeuvres/oeuvre-5.png')}}" alt="">
    </div>
    <div class="welcome">Bienvenue au musée virtuel !</div>
    <div>Voici la description de l'exposition. Je suis une description vraiment sympa</div>
    <a href="{{ route('salle.show', $salleexpo->id) }}">Vers la salle d'expo</a>

    <p>Liste des salles :</p>
    <ul>
        @forelse($salles as $salle)
            <li>
                <a href="{{ route('salle.show', $salle->id) }}">{{$salle->nom}}</a>
            </li>
        @empty
            <li>La liste des salles est vide</li>
        @endforelse
    </ul>


    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ&ab_channel=RickAstley">Notre Interview</a>
</div>
@endsection

