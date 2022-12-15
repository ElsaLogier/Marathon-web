<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/scss/app.scss', 'resources/css/acc.css','resources/js/app.js'])
    <title>Accueil</title>

    <body>
        <nav>
            <ul>
                @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    @if (Auth::user())
                        <li><a href="/home">Profil</a></li>
                    @endif
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.
              getElementById('logout-form').submit();">
                            Se déconnecter
                        </a></li>
                    <form id="logout-form" action="{{ route('logout') }}"
                          method="POST" style="display: none;"> {{ csrf_field() }}
                    </form>
                @endguest  </ul>
        </nav>

        <div class="section section-1" id="accueil">
            <h2 id="test">Anomaly</h2>
            <p class="type" style="--n:105">Bonjour et bienvenue à l'exposition Anomaly ! Nous sommes ravis de vous accueillir pour cette exploration de l'art généré par les intelligences artificielles.
                Le concept de l’exposition ? Incruster  des éléments de nos jours dans différents styles, complètement anachroniques ! Cette exposition met en lumière cinq mouvements artistiques emblématiques, en utilisant les dernières avancées en matière d'art génératif pour les reproduire dans notre époque. Nous espérons que vous apprécierez cette expérience unique et amusante !</p>
        <div class="Rsalles">
            <div class="start-div hover"><a href="/salle/1" id="start-btn">Commencer la visite</a></div>
            <div class="libre-div hover"><a href="#salles" id="libre-btn">Visite libre</a></div>
        </div>
        </div>
        <div class="section section-2" id="salles">
            <div class="BanCourant" id="ban1">
                <a href="/salle/1" class="banLink" id="Link1">
                <img class="banimg" id="imgban1" src="images/s-l500.png"/>
                <span class="courantBan"> Byzantin </span>
                <span class="dateBan">476-1453</span>
                <span class="nsalleBan">I</span></a>
            </div>
            <div class="BanCourant" id="ban2">
                <a href="/salle/2" class="banLink" id="Link2">
                <span class="courantBan"> Estampe<br>Japonaise </span>
                <span class="dateBan">1603-1868</span>
                <span class="nsalleBan">II</span></a>
            </div>
            <div class="BanCourant" id="ban3">
                <a href="/salle/3" class="banLink" id="Link3" >
                <span class="courantBan"> Impressionisme </span>
                <span class="dateBan">1874-1886</span>
                <span class="nsalleBan">III</span></a>
            </div>
            <div class="BanCourant" id="ban4">
                <a href="/salle/4" class="banLink" id="Link4">
                <span class="courantBan"> Cubisme </span>
                <span class="dateBan">1874-1886</span>
                <span class="nsalleBan">IV</span></a>
            </div>
            <div class="BanCourant" id="ban5">
                <a href="/salle/5" class="banLink" id="Link5">
                <span class="courantBan"> Pop Art </span>
                <span class="dateBan">1874-1886</span>
                <span class="nsalleBan">V</span></a>
            </div>
        </div>
    </div>

</body>
</html>
