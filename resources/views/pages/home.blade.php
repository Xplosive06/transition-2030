@extends('layouts.default', ['title' => 'Accueil'])
@section('css')
    <link href="{{ asset('css/images.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ asset('css/home.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('content')

    <div class="container">
        <h1 id="home_title">Les transitionneurs autour de vous</h1>
        <hr>
        <div id="map"></div>
        <h2 id="displayed_if_not_connected">Merci de vous <a href="{{ route('login') }}">connecter</a> ou de vous <a
                href="{{ route('register') }}">inscrire</a> pour accéder aux personnes présentes autour de vous.</h2>
    </div>
@endsection
@section('script')
    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}"
            type="text/javascript">google.maps.event.addDomListener(window, 'load', initMap);
    </script>

    <script
        src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"
        type="text/javascript"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js" type="text/javascript"></script>
    <script>let usersMapInfos = @json($users_map_infos);
            @if(isset($current_user))
        let currentUser = @json($current_user);
            @else
        let currentUser = String("undefined");
        @endif
    </script>

    <script src="{{ asset('js/map_constructor.js') }}" type="text/javascript"></script>
@stop

