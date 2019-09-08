@extends('layouts.default', ['title' => 'Profil'])

@section('css')
    <link href="{{ asset('css/images.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <div class="container col-md-8 col-sm-10 col-lg-8">

        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <img class="card-img-top" src="{{ asset('img/uploads/avatars/' . $user->avatar) }}">

                    <h1 class="card-title margin-username">
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
