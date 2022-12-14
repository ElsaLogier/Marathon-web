@extends('layouts.app')

@section('content')
    <img src="{{ asset('storage/'.Auth::user()->avatar) }}" alt="Avatar">
    <p>Utilisateur : {{ Auth::user()->name }}</p>
    <p>Email : {{ Auth::user()->email }}</p>
    <p>Nombres de commentaires : {{ count(Auth::user()->commentaires) }}</p>
    <p>Nombre d'œuvres likées : {{ count(Auth::user()->likes) }}</p>
@endsection
