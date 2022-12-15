@extends('layouts.app')

@section('viteLine')@vite(['resources/css/app.css','resources/css/register.css']) @endsection


@section('content')

<div>
    @include("_errors")
    <div>
        <a class="return" href="{{route('accueil')}}">Retour à la page d'accueil</a>
    </div>
    <div class="register">
        <h1>Register</h1>
        <form action="{{route('register')}}" method="post" class="form-example">
            @csrf
            <div>
                <input type="text" name="name" id="name" placeholder="Nom d'utilisateur">
            </div>

            <!-- Email Address -->
            <div>
                <input type="email" name="email" id="email" placeholder="Email">
            </div>


            <!-- Password -->
            <div>
                <input type="password" name="password" id="pwd" placeholder="Mot de passe">
            </div>

            <!-- Confirm Password -->
            <div>
                <input type="password" name="password_confirmation" id="conf_pwd" placeholder="Confirmer le mot de passe">
            </div>
            <div class="form-submit">
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>
</div>
<div class="redirection"><br />
    <h3>Déjà inscrit ? <a href="{{route('login')}}">Cliquez ici !</a></h3>
</div>

@endsection

@section('login')
@endsection
