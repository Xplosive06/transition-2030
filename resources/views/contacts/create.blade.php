@extends('layouts.default', ['title' => 'Contact'])

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-10 mx-auto">
                <h2>Entrez en contact</h2>
                <p class="text-muted">Si vous rencontrez des soucis particuliers <a
                        href="mailto:{{ config('transition2030.admin_support_email') }}">contactez-nous</a>.
                </p> <!-- Ne fonctionne pas sous mon chrome -->

                <form action="{{ route('contacts.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="control-label">Nom</label>
                        <input type="text" value="{{ old('name') }}" name="name" id="name"
                               class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="form-group">
                        <label for="email" class="control-label">Email</label>
                        <input type="email" value="{{ old('email') }}" name="email" id="email"
                               class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}

                    </div>

                    <div class="form-group">
                        <label for="message" class="control-label sr-only">Message</label>
                        <textarea class="form-control {{ $errors->has('message') ? 'is-invalid' : ''}}" rows="10"
                                  cols="10" required name="message"
                                  id="message">{{ old('message') }}</textarea>
                        {!! $errors->first('message', '<div class="invalid-feedback">:message</div>') !!}

                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Soumettre</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
