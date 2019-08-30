@extends('layouts.default')

@section('css')
    <link href="{{ asset('css/images.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/messenger.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <div class="container">
        <h1>{{ $thread->subject }}</h1>
        @each('messenger.partials.messages', $thread->messages, 'message')

        @include('messenger.partials.form-message')
    </div>
@stop

@section('script')
    @if(isset($users))
        <script>let usersList = @json($users);</script>
        <script src="{{ asset('js/search_users.js') }}" type="text/javascript"></script>
    @endif
@stop
