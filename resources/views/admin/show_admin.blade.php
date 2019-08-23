@extends('layouts.default', ['title' => 'Administration'])

@section('css')
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet" type="text/css">
@stop

@section('content')

    <div class="container admin-container">
        <h1>Administration</h1>

        <div class="admin-block">

            <ul class="nav nav-pills admin-navbar">

                <li class="nav-item">
                    <a class="nav-link active" data-toggle="pill" href="#users">Gestion utilisateurs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" href="#pages">Vos pages</a>
                </li>
            </ul>
            <div class="tab-content admin-main-part">

                @include('admin.partials.admin_users')

                @include('admin.partials.admin_pages')

            </div>

        </div>
    </div>

@endsection
