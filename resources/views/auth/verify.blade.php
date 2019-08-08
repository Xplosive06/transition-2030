@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Vérifiez votre email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Un lien de vérification vous a été envoyé à votre adresse. (Expirera dans une heure)') }}
                        </div>
                    @endif

                    {{ __('Avant de procéder, merci de vérifier votre email.') }}
                    {{ __('Si vous n\'avez pas reçu d\'email de vérification') }}, <a href="{{ route('verification.resend') }}">{{ __('cliquez ici pour en recevoir un nouveau.') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
