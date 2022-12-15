@extends('layouts.app')

@section('titre')Home @endsection

@section('vite')@vite(['resources/scss/app.scss','resources/css/app.css','resources/js/app.js']) @endsection

@section('content')
    @vite(['resources/css/app.css', 'resources/css/profil.css'])
    <div class="info">
        <div id="avatar">
            <img class="icone" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAAAXNSR0IArs4c6QAAAn5JREFUaEPtmd1t2zAQx++c9LnZIMkGygbuBG3ebEkB1A3aETpBs0EFVJT8VneCZIN4hGSCxI9FYl9BIwoEmt+iJAeQXkmefv/7IikhvPMH3zk/jAKGjuAYgRARyGazs5cJ/gSEKQCcAMFyC/ijLMuVyb42ArVhQogQ4MxkzDC+3hJORag4jqMJ0s0OXHiQ8Ovvssx1dpUCdvBHeCcz7CHEGb5+h0mEUkCSzJYI+NkDVlziDW8jQikgTeaPAbzvBE8A3yeET4T0a89xSJ+KYnG7l2YqD6fJnJpjBauCdCxVzjdT5SqOM1EEAdwzVp0PKsAGvgaUiTje0Hm+WNw3RehSKGgEXLuNbP6W8ELsYr0I0MHLClUxf12war/Vdl0DNvBNERuAlXRfQLgsimrZaw2k6WwKhH/EbsYLloNIuw3AkzifdyfGqmuZsztLIVkRcgBTt3HdjTsRYAOv6zY2G9jbnNA14ALP3+3SWjtPob7hdykZKgJdwmdZdpLnOS/u/RNGCAGu8LruJB6fOfzL87+bglUXnQhwhXeZX8MDQKQ6i7VKIRcY7j2X+U14vja4ABcYV3g+P03m/DIV1WkTXIB43BY3qWa+uop9FWB1mPROIVGA6urnAz+IAFmIfeEPQkAb+MEFtIUfRIBqQ3Q5mDVt2N7JgxWxToDp245s7cEI8IE/mBTyhe9FgCnn2453nkJtAU3rRwG2HjB50nfc9v26NspvQB99AQKveyhYJf0/0cfn9dZaCOgvY4svTjey1x8c/BfP0FFYH28oEj/qvu3wOvdwEc9HcI2A/GJx2tqVbgYeCGj1YQPfVPC7O4ibzcObPQoYOiZjBMYItPTAfzyvZU8gEWtWAAAAAElFTkSuQmCC"/>
            <img src="{{ asset('storage/'.Auth::user()->avatar) }}" alt="Avatar" class="pp">
        </div>

    {{--  Falcultative, changement d'avatar  --}}
    <div>
        <p>Utilisateur : {{ Auth::user()->name }}</p>
        <p>Email : {{ Auth::user()->email }}</p>
    </div>
    </div>
    <div class="perso">
        <div class="liked">
            <p id="aime">Oeuvres aimées ({{count(Auth::user()->likes)}})</p>
            <ul>
                @forelse($likes as $like)
                    <li>
                        {{ $like->nom }} par {{ $like->auteur }}.
                    </li>
                @empty
                    <li>
                        Vous n'avez aucunes œuvres likées.
                    </li>
                @endforelse
            </ul>
        </div>
    <div class="comments">
        <p id="commentaire">Liste des commentaires ({{ count($commentaires) }}): </p>
        <ul>
            @forelse($commentaires as $commentaire)
                <li>
                    <img style="width: 25px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAAAXNSR0IArs4c6QAAAcxJREFUaEPtmbFNBDEQRd+FkEAHQAcgYiQiUiiBDoACkJAoAFqgA0iJkC5GQAdQAZBACBrJlvZ83mWG9dzeSna0wXj8v+d7vPt3wsjHZOT4qQSGrmBbBTaBK2AbkOchxyvwDJwB8jwzcgQE8BOwPiTqzNofwE5KIkfgFjhcMvARzh1w1MSWI/C+hLsfMYuEtv4i8KOQ2SIL1IknV4FKoHB5agWGvq1rBWoFeh5qVwntAufAQQB5D1wCjy2grfGSxo2AgJkCKwnYb2AvQ8IaH9O6Eeh6Z5p7ZwGs8e4EvjK7HxeVKqwmlbHGVwJxB9raqFUS1nj3ClgPpTXenYAsYG2L1njXNtrzflJPd2ujagQ9AyuB+jJXJdThZdWP+p7y0Ew3dyGx8NY0mZX+0QlwUcgse0u92pLWYpprv2EQ/2M/slNU1qKYu+IGW6sQCYgpLM72cSnUIc9ncMtnHOoue/06TNhQApFcJeUSlxXZyIaeau11Jd65b1VZRP4n5MZNACDnq+joc8um3SEH7CUAfyiKupHMi4DoVTqPyNB1eBBwk0tuJ0oScJeLF4GFycWDwELlUpqA3LRu3UV78vucAe0arnGVgOv2KpKPvgK/9JKJMci+SmsAAAAASUVORK5CYII="/>
                    Oeuvre : {{ $commentaire->oeuvre->nom }}<br/>
                    Titre : {{ $commentaire->titre }}<br/>
                    Contenu : {!! $commentaire->contenu !!}<br/>
                </li>
            @empty
                <li>
                    Vous n'avez aucun commentaires.
                </li>
            @endforelse
        </ul>
    </div>
@endsection

@section('logout')

@endsection