<?php $class = $thread->isUnread(Auth::id()) ? 'alert-info' : ''; ?>

<div class="alert {{ $class }}">
    <h4 class="media-heading">
        <a href="{{ route('messages.show', $thread->id) }}">{{ $thread->subject }}</a>
        ({{ $thread->userUnreadMessagesCount(Auth::id()) }} non lus)</h4>
    <p>

        <small><strong>Participant(s) :</strong>
            @foreach($thread->participants as $participant)<a href="{{ route('profiles.show', $participant->user->id) }}">{{ $participant->user->username }}
                <img class="card-img index-images" src="{{ asset('img/uploads/avatars/' . $participant->user->avatar) }}"></a>
        @endforeach
        </small>
    </p>

</div>
