@section('css')
    <link href="{{ asset('css/images.css') }}" rel="stylesheet" type="text/css">
@stop
<div class="media">
    <a class="pull-left" href="#">
        <img class="img-fluid img-show-message" src="{{ asset('img/uploads/avatars/' . $message->user->avatar) }}"
             alt="{{ $message->user->username }}">
    </a>
    <div class="media-body">
        <h5 class="media-heading">{{ $message->user->username }}</h5>
        <p>{{ $message->body }}</p>
        <div class="text-muted">
            <small>Posté {{ $message->created_at->diffForHumans() }}</small>
        </div>
    </div>
</div>
