@extends('layouts.app')

@section('viteLine')
@vite(['resources/scss/app.scss','ressources/css/salles.css','resources/css/app.css','resources/js/app.js','resources/js/burger.js','resources/css/salle.css'])
@endsection

@section('content')

<div class="content" id="content">
    <div class="courant">
      <span class="numCourant" id="eltC1">I</span>
        <span class="nomCourant" id="eltC2">{{ $salle->nom }}</span>
        {!!  $salle->description !!}
        </div>

    {{-- <a id="img1">
      <img src="images/joconde.jpeg" alt="images" >
    </a> --}}
        @php
            $i = 1;
        @endphp
        @forelse($oeuvres as $oeuvre)
            <a href="{{route('oeuvres.show', $oeuvre->id)}}" id="img{{$i}}">
                <img src="{{ asset('storage/'.$oeuvre->thumbnail_url) }}" alt="Miniature de l'oeuvre">
                {{-- par <a href="?auteur={{$oeuvre->auteur}}">{{ $oeuvre->auteur }}</a>. --}}
            </a>
            @php $i++ ;@endphp
        @empty
            Aucune œuvres trouvées dans la salle !
        @endforelse


    {{-- <p>Liste des portes vers les salles : </p>
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
    </ul> --}}

@endsection



