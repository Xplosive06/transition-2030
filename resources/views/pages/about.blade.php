@extends('layouts.default', ['title' => 'À propos'])

@section('content')
    <div class="container">
        <h2>Qu'est ce que <strong>{{ config('app.name') }}?</strong></h2>
        <p>Dreamcatcher &dash; artisan selvage biodiesel excepteur, health goth edison bulb godard <a
                    href="http://www.blog-p4.transition-2030.fr/home.html" target="_blank">Blog de Jean</a> sriracha
            wayfarers deserunt
            activated charcoal jean shorts.</p>
        <div class="row">
            <div class="col-md-6">
                <p class="alert alert-warning"><i class="fas fa-exclamation-circle"></i><strong> Cette application a été créé
                        par <a
                                href="https://www.linkedin.com/in/mike-notta-720942157/">Mike Notta</a> pour des raisons
                        d'apprentissage.</strong></p>
            </div>
        </div>

        <p>N'hésitez pas à venir aider sur ce projet ici : <a href="https://github.com/Xplosive06/transition-2030">Lien Github</a>.</p>
        <hr>

        <h2>Qu'est ce que la collapsologie?</h2>
        <p>Plus d'infos : <a href="https://fr.wikipedia.org/wiki/Collapsologie#Pr%C3%A9sentation">ici</a>. </p>
        <hr>

        <h2>Quels sont les outils et services utilisés sur <strong>{{ config('app.name') }}</strong>?</h2>
        <p>Globalement le site est construit à partir du Framework Laravel &amp stylisé avec Bootstrap. Mais il y'a
            pleins d'autres services utilisés : </p>
        <ul>
            <li>Laravel</li>
            <li>Bootstrap</li>
            <li>Amazon S3</li>
            <li>Mandrill</li>
            <li>Google Maps</li>
            <li>Gravatar</li>
            <li>Antony Martin's Geolocalisation package</li>
            <li>Michel Fortin's Markdown Parser Package</li>
            <li>Heroku</li>
        </ul>

    </div>
@endsection
