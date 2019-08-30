@extends('layouts.default')
@section('css')
    <link href="{{ asset('css/images.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/messenger.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <div class="container">
        <h1>Créer une nouvelle discussion</h1>
        <form action="{{ route('messages.store') }}" method="post">
            {{ csrf_field() }}
            <div class="col-md-12 col-lg-12 col-sm-12">
                <!-- Subject Form Input -->
                <div class="form-group">
                    <label class="control-label">Titre</label>
                    <input type="text" class="form-control" name="subject" placeholder="Titre"
                           value="{{ old('subject') }}">
                </div>

                <!-- Message Form Input -->
                <div class="form-group">
                    <label class="control-label">Message</label>
                    <textarea rows="5" name="message" class="form-control">{{ old('message') }}</textarea>
                </div>

                @if($users->count() > 0)
                    <label for="users-search">Ajouter des utilisateurs:</label>
                    <br>
                    <input type="search" id="users-search" name="search-bar"
                           aria-label="Cherchez à travers tous les utilisateurs" class="form-control">
                    <div id='search-results'></div>
                    <small><strong>Participant(s) :</strong>
                        <div class="checkbox" id="checkbox-div">

                        </div>
                    </small>
            @endif

            <!-- Submit Form Input -->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary form-control">Envoyer</button>
                </div>
            </div>
        </form>
    </div>
@stop

@section('script')
    @if(isset($asked_user))
        <script>let askedUser = @json($asked_user);</script>
    @endif
    @if(isset($users))
        <script>let usersList = @json($users);</script>
        <script src="{{ asset('js/search_users.js') }}" type="text/javascript"></script>
    @endif
@stop
