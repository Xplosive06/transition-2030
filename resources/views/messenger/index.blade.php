@extends('layouts.default')

@section('css')
    <link href="{{ asset('css/images.css') }}" rel="stylesheet" type="text/css">

    @stop

@section('content')
    @include('messenger.partials.flash')

    @each('messenger.partials.thread', $threads, 'thread', 'messenger.partials.no-threads')
@stop
