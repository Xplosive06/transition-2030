@extends('layouts.default')
@section('css')
    <link href="{{ asset('css/images.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/messenger.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <div class="container">
        <h1>Créer une nouvelle discussion</h1>
        <form action="{{ route('messages.store') }}" method="post">
            @csrf
            <div class="col-md-12 col-lg-12 col-sm-12">
                <!-- Subject Form Input -->
                <div class="form-group">
                    <label for="subject" class="required control-label">Titre</label>
                    <input id="subject" type="text" class="form-control @error('subject') is-invalid @enderror"
                           name="subject"
                           placeholder="Titre"
                           value="{{ old('subject') }}" required>

                    @error('subject')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror

                </div>


                <!-- Message Form Input -->
                <div class="form-group">
                    <label for="message" class="required control-label">Message</label>
                    <textarea rows="5" id="message" name="message" required placeholder="Message" class="form-control
                              @error('message') is-invalid @enderror">{{ old('message') }}</textarea>

                    @error('message')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror

                </div>


                @if($users->count() > 0)
                    <label for="users-search">Ajouter des utilisateurs</label>
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
