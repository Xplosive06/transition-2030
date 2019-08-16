<nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample03"
                aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample03">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ set_active_route('home') }}">
                    <a class="nav-link" href="{{ route('home') }}">Accueil</a>
                </li>
                <li class="nav-item {{ set_active_route('users_list') }}">
                    <a class="nav-link" href="{{ route('users_list') }}">Transitionneurs</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="planetDropdown" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">Planet</a>
                    <div class="dropdown-menu" aria-labelledby="planetDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                        <a class="dropdown-item" href="#">Separated link</a>
                        <a class="dropdown-item" href="#">One more separated link</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ set_active_route('contacts.create') }}" href="{{ route('contacts.create') }}">Contact</a>
                </li>
                <li class="nav-item {{ set_active_route('about') }}">
                    <a class="nav-link" href="{{ route('about') }}">À propos</a>
                </li>

            </ul>
            <ul class="navbar-nav mr-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Se connecter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">S'enregistrer</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="position:relative;padding-left:50px">
                            <img class="img-fluid" src="{{ asset('img/uploads/avatars/' . Auth::user()->avatar) }}"
                             style="width:40px;height:40px;position:absolute;bottom:1px;left:2px;border-radius:50%">
                            {{ Auth::user()->username }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('profiles.show', auth()->id()) }}">
                                {{ __('Mon profil') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('profiles.edit', auth()->id()) }}">
                                {{ __('Modifier mon profil') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Déconnexion') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
