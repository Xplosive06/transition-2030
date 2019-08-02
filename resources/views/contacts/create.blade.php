@extends('layouts.default', ['title' => 'Contact'])

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                <h2>Entrez en contact</h2>
                <p class="text-muted">Si vous rencontrez des soucis particuliers <a
                            href="mailto:contact.transition2030@gmail.com">contactez-nous</a>.
                </p> <!-- Ne fonctionne pas sous mon chrome -->

                <form action="#" method="POST"></form>
                <div class="form-group">
                    <label for="name" class="control-label">Nom</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="email" class="control-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="message" class="control-label sr-only">Message</label>
                    <textarea class="form-control" rows="10" cols="10" required name="message" id="message"></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block">Soumettre &raquo;</button>
                </div>

            </div>
        </div>
    </div>
@endsection