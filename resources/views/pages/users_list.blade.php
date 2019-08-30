@extends('layouts.default', ['title' => 'Transitionneurs'])

@section('css')

    <link href="{{ asset('css/users_list.css') }}" rel="stylesheet" type="text/css">

@endsection

@section('content')
    <section id="users" class="pb-5">
        <div class="container">
            <h1 class="section-title h1">Tous les transitionneurs</h1>
            <h2 class="card-subtitle h2">Total : {{ $users_list->total() }}</h2>
            <br>
            <div class="row">
            @foreach($users_list as $user)
                <!-- Team member -->
                    <div class="user-card col-xs-12 col-sm-6 col-md-3">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <p><img class="img-thumbnail users-list-img"
                                                    src="{{ asset('img/uploads/avatars/' . $user->avatar) }}"
                                                    alt="card image"></p>
                                            <h4 class="card-title">{{ $user->username }}</h4>
                                            <p class="card-text">{{strlen($user->description) > 90 ? substr($user->description, 0, 90) . ' ...' : $user->description}}</p>
                                            <hr>
                                            <div class="d-flex justify-content-around">
                                                <a href="{{ route('profiles.show', $user->id) }}"
                                                   class="btn btn-primary btn-sm"><i class="fas fa-user-circle"></i></a>
                                                <a href="{{ route('messages.create', $user->id) }}"
                                                   class="btn btn-primary btn-sm"><i class="far fa-comments"></i></a>
                                            </div>
                                        </div>
                                    </div>
                    </div>
                    <!-- ./Team member -->
                @endforeach

            </div>
            <br>
            <div class="d-flex justify-content-center">
                {{ $users_list->links() }}
            </div>
        </div>
    </section>


@endsection
