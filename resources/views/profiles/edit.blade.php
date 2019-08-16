@extends('layouts.default', ['title' => 'Editer mon profil'])

@section('css')

    <link href="{{ asset('css/profile_edit.css') }}" rel="stylesheet" type="text/css">

@endsection

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('profiles.update', $user->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="container">
                <div class="card-header">
                    <div class="row">
                        <img class="img-thumbnail" src="{{ asset('img/uploads/avatars/' . $user->avatar) }}"
                             style="width:150px;height:150px;float:left;border-radius:50%">

                        <h1 class="card-title">
                            {{ $user->username }}
                        </h1>
                    </div>
                    <br>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">

                            <label for="avatar" hidden>Insérer une image : </label>
                            <input type="hidden" name="MAX_FILE_SIZE" value="512000"/>
                            <input type="file" name="avatar" id="avatar"
                                   class="form-control{{ $errors->has('avatar') ? ' is-invalid' : '' }}">

                            @if ($errors->has('avatar'))
                                <div class="invalid-feedback">
                                    {!! $errors->first('avatar') !!}
                                </div>
                            @endif
                        </div>
                    </div>

                    <br>
                    <small class="card-body">Enregistré {{ $user->created_at->diffForHumans() }}</small>
                </div>
            </div>

            <hr>

            @foreach($arrayOfParams as $key => $value)
                @include('layouts.partials.form-group', [
                    'title' => $value["title"],
                    'type' => $value["type"],
                    'name' => $value["name"],
                    'required' => $value["required"],
                    'value' => $value["value"],
                    'label_id' => 'label_'.$value["name"],
                ])

            @endforeach
            <div class="form-group">
                <label for="description">Déscription</label>
                <textarea id="description" type="description" rows="5"
                          class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                          name="description">{{ old("description", isset($user->description) ? $user->description : '') }}</textarea>

                @if ($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
            </div>
            <br>
            <div class="d-flex justify-content-around">
                @component('components.button')
                    @lang('Envoyer')
                @endcomponent
                <a class="text-danger" href="{{ route('profiles.show_delete', $user) }}">Supprimer votre compte</a>
            </div>


        </form>


    </div>
@endsection
@section('script')
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&libraries=places"></script>

    <script type="text/javascript" src="{{ asset('js/google_input_city.js') }}"></script>
@stop
