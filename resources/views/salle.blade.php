@extends('layouts.app')

@section('content')

    <p>
        <strong>Nom de la salle</strong> : {{ $salle->nom }}
    </p>
    <p>
        <strong>Theme de la salle </strong>: {{ $salle->theme }}
    </p>
    <p>
        <strong>Description de la salle</strong> : <br/> {!! $salle->description !!}
    </p>
    <p>
        <strong>Liste des œuvres de la salle :</strong>
    </p>
    <ul>
        @forelse($oeuvres as $oeuvre)
            <li>
                {{ $oeuvre->nom }} par <a href="?auteur={{$oeuvre->auteur}}">{{ $oeuvre->auteur }}</a>.
            </li>
        @empty
            <li>
                Aucune œuvres trouvées dans la salle !
            </li>
        @endforelse
    </ul>

    <p>Liste des portes vers les salles : </p>
    <ul>
        @forelse($sallessuivantes as $salle)
            <li>
                <a href="{{ route('salle.show', $salle->id) }}">{{ $salle->nom }}</a>
            </li>
        @empty
            <li>
                Aucune porte trouvée
            </li>
        @endforelse
    </ul>

@endsection
