<h2>Nouveau message</h2>
<form action="{{ route('messages.update', $thread->id) }}" method="post">
{{ method_field('put') }}
@csrf

<!-- Message Form Input -->
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
</form>
