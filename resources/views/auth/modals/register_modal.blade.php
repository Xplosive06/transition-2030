<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Register</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form id="formRegister" class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="first_name"
                               class="col-md-4 col-form-label text-md-right">{{ __('Prénom') }}</label>

                        <div class="col-md-6">
                            <input id="first_name" type="text"
                                   class="form-control @error('first_name') is-invalid @enderror"
                                   name="first_name"
                                   value="{{ old('first_name') }}" autocomplete="first_name" autofocus>

                            <small class="help-block invalid-feedback"></small>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="last_name"
                               class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

                        <div class="col-md-6">
                            <input id="last_name" type="text"
                                   class="form-control"
                                   name="last_name"
                                   value="{{ old('last_name') }}" autocomplete="last_name" autofocus>

                            <small class="help-block invalid-feedback"></small>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="username"
                               class="required col-md-4 col-form-label text-md-right">{{ __('Pseudonyme') }}</label>

                        <div class="col-md-6">
                            <input id="username" type="text"
                                   class="form-control"
                                   name="username"
                                   value="{{ old('username') }}" required autocomplete="username" autofocus>

                            <small class="help-block invalid-feedback"></small>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="address_city"
                               class="col-md-4 col-form-label text-md-right">{{ __('Ville') }}</label>

                        <div class="col-md-6">
                            <input id="address_city" type="search"
                                   class="form-control"
                                   name="address_city"
                                   value="{{ old('address_city') }}" autofocus>
                            <input type="hidden" name="address_latitude" id="address_latitude" value=""/>
                            <input type="hidden" name="address_longitude" id="address_longitude" value=""/>
                            <small class="help-block invalid-feedback"></small>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email"
                               class="required col-md-4 col-form-label text-md-right">{{ __('Adresse e-mail') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email"
                                   class="form-control" name="email"
                                   value="{{ old('email') }}" required autocomplete="username email">

                            <small class="help-block invalid-feedback"></small>


                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password_register"
                               class="required col-md-4 col-form-label text-md-right">{{ __('Mot de passe') }}</label>

                        <div class="col-md-6">
                            <input id="password_register" type="password"
                                   class="form-control   " name="password_register"
                                   required autocomplete="new-password">

                            <small class="help-block invalid-feedback"></small>


                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm"
                               class="required col-md-4 col-form-label text-md-right">{{ __('Confirmation du mot de passe') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control"
                                   name="password_register_confirmation" required autocomplete="new-password">

                            <small class="help-block invalid-feedback"></small>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('S\'enregistrer') }}
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>


