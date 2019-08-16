@extends('layouts.default', ['title' => 'Supprimer mon compte'])

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('profiles.destroy', $user->id) }}">
            @csrf
            @method('DELETE')
            <p class="text-danger font-weight-bold">Êtes-vous sûr de vouloir supprimer votre compte <span
                    class="font-weight-bold text-black-50">{{ $user->username }} </span>?</p>
            <br>
            <div class="d-flex justify-content-around">
                @component('components.button', ['color' => 'danger'])
                    @lang('Supprimer')
                @endcomponent
                <a href="{{ route('profiles.show', $user->id) }}">Retourner à mon compte</a>
            </div>
        </form>
    </div>
@endsection
