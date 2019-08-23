@extends('layouts.default')

@section('script_up')
    <script src="//cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
@stop

@section('content')
    <div class="container">
        <form class="panel-primary" method="post" action="{{ route('static_pages.update') }}">
            @csrf
            <div class="panel-heading">
                <h2>{{ $page_to_update->page_title }}</h2>
            </div>


            <div class="control-group">

                <label for="content">Contenu : </label>
                <textarea class="input-lg" id="page-content" type="text"
                          name="page_content">{{ $page_to_update->page_content }}</textarea>
                <input type="hidden" name="page_id" id="page_id" value="{{ $page_to_update->id }}"/>

                <script>
                    CKEDITOR.replace('page-content');
                </script>

                <button type="submit" class="btn btn-primary">Envoyer</button>

            </div>
        </form>
    </div>
@endsection
