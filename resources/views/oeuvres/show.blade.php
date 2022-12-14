@extends('layouts.app')

@section('content')
    <h2>{{$oeuvre->nom}}</h2>
    <img src="{{asset("storage/".$oeuvre->media_url)}}">
    <p>par: {{$oeuvre->auteur}}&nbsp;
    </p>
    <p>liké {{count($oeuvre->likes)}} fois.</p>
    @auth
        @if(Auth::user()->likes->contains($oeuvre))
            <b><p>Vous avez liké cette oeuvre </p></b>
            <form method="post" action=" {{ route('likes.destroy', $oeuvre->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit" name="like" value="{{$oeuvre->id}}">Enlever le like</button>
            </form>
        @else
            <form method="post" action="{{ route('likes.store') }}">
                @csrf
                <button type="submit" name="id" value="{{$oeuvre->id}}">mettre le like</button>
            </form>
        @endif
    @endauth

    {!! $oeuvre->description !!}

    <form method="post" action="{{ route('commentaires.store') }}">
        @csrf
        <div>
            <label for="titre">titre</label>
            <input type="text" name="titre" placeholder="titre">
        </div>
        <div>
            <label for="titre">contenu</label>
            <textarea rows="10" cols="20" name="contenu"></textarea>
        </div>
        <button name="oeuvre" value="{{$oeuvre->id}}" type="submit">valider</button>
    </form>


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
@endsection
