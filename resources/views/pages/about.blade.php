@extends('layouts.default', ['title' => 'À propos'])

@section('content')
    <div class="container" id="about-content">
        <div class="row">
            <div class="col-md-10 col-sm-12 mx-auto">
                {!! $about_page->page_content !!}
            </div>
        </div>
    </div>
@endsection
