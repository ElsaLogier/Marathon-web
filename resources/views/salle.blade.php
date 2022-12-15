@extends('layouts.app')

@section('viteLine')
@vite(['resources/scss/app.scss','ressources/css/salles.css','resources/css/app.css','resources/js/app.js','resources/js/burger.js','resources/css/salle.css'])
@endsection

@section('content')

<div class="content" id="content">
    <a href=""></a>
    <div class="courant">
      <span class="numCourant" id="eltC1">I</span>
        <span class="nomCourant" id="eltC2">Byzantin<span>
        <span class="datesCourant" id="eltC3">1912-1919</span>
        <p id="eltC4">Le cubisme est un mouvement artistique qui a émergé en France au début du XXe siècle. Les artistes cubistes étaient connus pour leur utilisation de formes géométriques et de lignes pour représenter les objets dans leurs peintures, plutôt que de les représenter de manière réaliste. Le cubisme a été l'un des premiers mouvements artistiques à remettre en question les conventions traditionnelles de la peinture, et il a influencé de nombreux artistes à travers le monde. Les peintures cubistes sont souvent considérées comme étant abstraites, mais elles peuvent également être interprétées comme des commentaires sur la société et la culture de l'époque. Si vous êtes intéressé par le cubisme, vous pouvez en découvrir plus en visitant notre exposition en ligne.</p>
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
            @php $i++;@endphp

        @empty
            Aucune œuvres trouvées dans la salle !
        @endforelse

    <ul class="SallesSuivantes">
        @forelse($sallessuivantes as $salle)
            <li>
                <a href="{{ route('salle.show', $salle->id) }}" class="liensSalles">Salle {{ $salle->nom }} ></a>
            </li>
        @empty
            <li>
                <p class="liensSalles">Aucune porte trouvée</p>
            </li>
        @endforelse
    </ul>

@endsection



