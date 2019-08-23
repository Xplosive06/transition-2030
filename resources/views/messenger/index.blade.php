@extends('layouts.default')

@section('css')
    <link href="{{ asset('css/images.css') }}" rel="stylesheet" type="text/css">

@stop

@section('content')
    <div class="container">
        @include('messenger.partials.flash')

        @each('messenger.partials.thread', $threads, 'thread', 'messenger.partials.no-threads')
    </div>
@endsection
