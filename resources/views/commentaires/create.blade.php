@extends('layouts.app')

@section('content')
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
        <select name="oeuvre">
            @foreach($oeuvres as $oeuvre)
                <option value="{{$oeuvre->id}}">{{$oeuvre->nom}}</option>
            @endforeach
        </select>
        <button type="submit">valider</button>
    </form>
@endsection
