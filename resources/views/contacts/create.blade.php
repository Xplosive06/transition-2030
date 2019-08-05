@extends('layouts.default', ['title' => 'Contact'])

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                <h2>Entrez en contact</h2>
                <p class="text-muted">Si vous rencontrez des soucis particuliers <a
                        href="mailto:{{ config('transition2030.admin_support_email') }}">contactez-nous</a>.
                </p> <!-- Ne fonctionne pas sous mon chrome -->

                <form action="{{ route('contacts.store') }}" method="POST">
                    @csrf
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                        <label for="name" class="control-label">Nom</label>
                        <input type="text" value="{{ old('name') }}" name="name" id="name" class="form-control" required>
                        {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                    </div>

                    <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                        <label for="email" class="control-label">Email</label>
                        <input type="email" value="{{ old('email') }}" name="email" id="email" class="form-control" required>
                        {!! $errors->first('email', '<span class="help-block">:message</span>') !!}

                    </div>

                    <div class="form-group {{ $errors->has('message') ? 'has-error' : ''}}">
                        <label for="message" class="control-label sr-only">Message</label>
                        <textarea class="form-control" rows="10" cols="10" required name="message"
                                  id="message">{{ old('message') }}</textarea>
                        {!! $errors->first('message', '<span class="help-block">:message</span>') !!}

                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Soumettre &raquo;</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
