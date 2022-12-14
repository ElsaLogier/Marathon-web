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
    @foreach($oeuvre->commentaires as $com)
        <hr>
        <h3>{{$com->titre}}</h3>
        <p>le {{date_format($com->created_at, 'd/m/Y')}}</p>
        <p>{!! $com->contenu !!}</p>
    @endforeach
@endsection
