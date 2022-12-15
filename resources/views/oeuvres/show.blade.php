@extends('layouts.app')

@section('viteLine')
@vite(['resources/scss/app.scss','resources/css/app.css','resources/js/app.js','resources/js/burger.js','resources/css/oeuvre.css'])
@endsection

@section('content')
<section class="contenu">
<div class="oeuvre-infos">
    <div class="img_container">
    <img src="{{asset("storage/".$oeuvre->media_url)}}"></img>
    <div class="like">
    @auth
        @if(Auth::user()->likes->contains($oeuvre))
            <form method="post" action=" {{ route('likes.destroy', $oeuvre->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit" name="like" value="{{$oeuvre->id}}">👎</button>
            </form>
        @else
            <form method="post" action="{{ route('likes.store') }}">
                @csrf
                <button type="submit" name="id" value="{{$oeuvre->id}}">👍</button>
            </form>
        @endif
    @endauth
    <p>&nbsp;{{count($oeuvre->likes)}} like(s)</p>
    </div>
    </div>
    <h2>{{$oeuvre->nom}}</h2>
    <p>Image proposée par {{$oeuvre->auteur}}.&nbsp;</p>
</div>

<div class="commentaires-desc">
    <h2>Commentaires</h2>
    <div class="fentre-commentaires">

@foreach($oeuvre->commentaires as $com)
        @if($com->valide || (Auth::user() != null && Auth::user()->admin))
            <hr>
            <h3>{{$com->titre}}
            @if(Auth::user() != null && Auth::user()->admin && !$com->valide)
                <form method="post" action="{{ route('commentaires.valider', $com->id) }}">
                    @csrf
                    @method('put')
                    <button>valider</button>
                </form>
                <form method="post" action="{{ route('commentaires.destroy', $com->id) }}">
                    @csrf
                    @method('delete')
                    <button>refuser</button>
                </form>
            @endif
            </h3>
            <p>le {{date_format($com->created_at, 'd/m/Y')}}</p>
            <p>{!! $com->contenu !!}</p>
        @endif
    @endforeach


   
</div>

<form method="post" action="{{ route('commentaires.store') }}">
        @csrf
        <div>
            <input type="text" name="titre" placeholder="Titre de votre commentaire">
        </div>
        <div>
            <textarea rows="1" cols="20" name="contenu" style='resize: none;' placeholder="Votre commentaire"></textarea>
        </div>
        <button name="oeuvre" value="{{$oeuvre->id}}" type="submit">valider</button>
    </form>
<div class="desc">  {!! $oeuvre->description !!}</div>


</div>
</section>
@endsection