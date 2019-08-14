@extends('layouts.default', ['title' => 'Editer mon profil'])


@section('content')
    <div class="container">
        <div class="card-group">
            <div class="card-headerr">
                <h1>
                    {{ $user->username }}
                </h1>
                <small class="card-body">Enregistré {{ $user->created_at->diffForHumans() }}</small>
            </div>
        </div>

        <hr>

            <form method="POST" action="{{ route('profiles.update', $user->id) }}">
                @csrf
                @method('PUT')

                @foreach($arrayOfParams as $key => $value)
                @include('layouts.partials.form-group', [
                    'title' => __($value["title"]),
                    'type' => $value["type"],
                    'name' => $value["name"],
                    'required' => $value["required"],
                    'value' => $value["value"],
                ])

                @endforeach
                <br>
                @component('components.button')
                    @lang('Envoyer')
                @endcomponent


            </form>


    </div>
@endsection
