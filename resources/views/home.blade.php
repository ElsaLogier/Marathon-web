@extends('layouts.app')

@section('content')
    <img src="{{ asset('storage/'.Auth::user()->avatar) }}" alt="Avatar">

    {{--  Falcultative, changement d'avatar  --}}
    <form method="POST" action="{{route('home.upload')}}"
      enctype="multipart/form-data">
        @csrf
        <label for="file">Changer l'avatar : </label>
        <input type="file" name="file" id="file">
        <button type="submit">
            Valider
        </button>
    </form>
    <p>Utilisateur : {{ Auth::user()->name }}</p>
    <p>Email : {{ Auth::user()->email }}</p>
    <p>Liste des commentaires ({{ count($commentaires) }}): </p>
    <ul>
        @forelse($commentaires as $commentaire)
            <li>
                Oeuvre : {{ $commentaire->oeuvre }}
                Titre : {{ $commentaire->titre }}
                Contenu : {{ $commentaire->contenu }}
            </li>
        @empty
            <li>
                Vous n'avez aucun commentaires.
            </li>
        @endforelse
    </ul>
    <p>Oeuvres aimées ({{ count($likes) }}):</p>
    <ul>
        @forelse($likes as $like)
            <li>
                {{ $like->nom }} par {{ $like->auteur }}.
            </li>
        @empty
            <li>
                Vous n'avez aucunes œuvres likées.
            </li>
        @endforelse
    </ul>
@endsection
