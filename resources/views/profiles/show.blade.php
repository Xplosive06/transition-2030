@extends('layouts.default', ['title' => 'Profil'])


@section('content')
    <div class="container col-md-8 col-sm-10 col-lg-8">

        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <img class="card-img-top" src="{{ asset('img/uploads/avatars/' . $user->avatar) }}"
                         style="width:150px;height:150px;float:left;border-radius:50%">

                    <h1 class="card-title">
                        {{ $user->username }}
                    </h1>
                </div>
                <br>
                <small class="card-body">Enregistré {{ $user->created_at->diffForHumans() }}</small>
            </div>

            <div class="card-body">
                @include('layouts.partials.user_details', [
                    'title' => 'Description :',
                    'detail' => $user->description,
                ])

            </div>
        </div>

    </div>
@endsection
@section('script')
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&libraries=places"></script>

    <script type="text/javascript" src="{{ asset('js/google_input_city.js') }}"></script>
@show
