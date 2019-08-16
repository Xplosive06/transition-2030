@extends('layouts.default', ['title' => 'Transitionneurs'])

@section('css')

    <link href="{{ asset('css/users_list.css') }}" rel="stylesheet" type="text/css">

@endsection

@section('content')
    <section id="team" class="pb-5">
        <div class="container">
            <h1 class="section-title h1">Tous les transitionneurs</h1>
            <h2 class="card-subtitle h2">Total : {{ count($users_list) }}</h2>
            <br>
            <div class="row">
            @foreach($users_list as $user)
                <!-- Team member -->
                    <div class="user-card col-xs-12 col-sm-6 col-md-4">
                        <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                            <div class="mainflip">
                                <div class="frontside">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <p><img class=" img-fluid"
                                                    src="{{ asset('img/uploads/avatars/' . $user->avatar) }}"
                                                    alt="card image"></p>
                                            <h4 class="card-title">{{ $user->username }}</h4>
                                            <p class="card-text">{{ $user->description }}</p>
                                            <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ./Team member -->
                @endforeach

            </div>
        </div>
    </section>


@endsection
