@extends('layouts.app2')

@section('viteLine')@vite(['resources/css/app.css','resources/css/login.css']) @endsection

@section('content')
    @include("_errors")
    <a href="{{route('accueil')}}" class="return">Retour à la page principale</a>
    <div class="login">
        <h1>Login</h1>
    <form action="{{route('login')}}" method="post" class="form-example">
        @csrf
        <div class="form-border">
            <input type="email" name="email" id="email" placeholder="email">
            <input type="password" name="password" id="pwd" placeholder="Mot de passe">
            <div class="form-submit">
                <input type="submit" value="Submit">
            </div>
        </div>
    </form>
</div>
<div class="redirection"><br/>
    <h3>Vous venez d'arriver ? <a href="{{route('register')}}">ça se passe ici.</a></h3>
</div>
@endsection

@section('login')
@endsection
