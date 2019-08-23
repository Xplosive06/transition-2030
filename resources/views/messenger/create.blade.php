@extends('layouts.default')

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
                    <div class="checkbox">
                        @foreach($users as $user)
                            <label title="{{ $user->username }}"><input type="checkbox" name="recipients[]"
                                                                        value="{{ $user->id }}">{!!$user->username!!}
                            </label>
                        @endforeach
                    </div>
            @endif

            <!-- Submit Form Input -->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary form-control">Envoyer</button>
                </div>
            </div>
        </form>
    </div>
@stop
