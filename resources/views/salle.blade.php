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
                <a href="{{route('oeuvres.show', $oeuvre->id)}}">{{ $oeuvre->nom }}</a>
                par <a href="?auteur={{$oeuvre->auteur}}">{{ $oeuvre->auteur }}</a>.
                <img src="{{ asset('storage/'.$oeuvre->thumbnail_url) }}" alt="Miniature de l'oeuvre">
                <ul>
                    <li>tag:
                        @foreach($oeuvre->tags as $tag)
                            <a href="?tag={{ $tag->intitule }}">{{$tag->intitule}},&nbsp;</a>
                        @endforeach
                    </li>
                </ul>
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
