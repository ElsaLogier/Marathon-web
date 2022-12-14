@extends('layouts.app')

@section('content')
    <h2>{{$oeuvre->nom}}</h2>
    <img src="{{asset("storage/".$oeuvre->media_url)}}">
    <p>par: {{$oeuvre->auteur}}&nbsp;
    </p>
    <p>liké {{count($oeuvre->likes)}} fois.</p>
    {!! $oeuvre->description !!}
    @foreach($oeuvre->commentaires as $com)
        <hr>
        <h3>{{$com->titre}}</h3>
        <p>le {{date_format($com->created_at, 'd/m/Y')}}</p>
        <p>{!! $com->contenu !!}</p>
    @endforeach
@endsection
