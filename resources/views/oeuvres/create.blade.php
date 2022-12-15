@extends('layouts.app')

@section('titre')Creation @endsection

@section('vite')@vite(['resources/scss/app.scss','resources/css/app.css','resources/js/app.js']) @endsection

@section('content')
    <form method="post" action="{{ route('oeuvres.store') }}" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="titre">Titre :</label>
            <input type="text" name="titre" placeholder="titre">
        </div>
        <div>
            <label for="auteur">Auteur :</label>
            <input type="text" name="auteur" placeholder="auteur">
        </div>
        <div>
            <label for="style">Style :</label>
            <input type="text" name="style" placeholder="style">
        </div>
        <div>
            <label for="description">Description :</label>
            <textarea rows="10" cols="20" name="description"></textarea>
        </div>
            <div>
            <label for="img">Image : </label>
            <input type="file" name="img" id="img">
            </div>
            <div>
                <label for="thumbnail">Image : </label>
                <input type="file" name="thumbnail" id="thumbnail">
            </div>
            <div>
                <label for="x">Coordonnées en x :</label>
                <input type="text" name="x" placeholder="x">
            </div>
            <div>
                <label for="y">Coordonnées en y :</label>
                <input type="text" name="y" placeholder="y">
            </div>
        <div>
            <label for="date">Date de création :</label>
            <input type="date" name="date">
        </div>




        <button type="submit">valider</button>
    </form>
@endsection
