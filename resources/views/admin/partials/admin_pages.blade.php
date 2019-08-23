<div id="pages" class="tab-pane panel-primary fade">

    <div class="panel-heading">
        <h2>Éditer les pages</h2>
    </div>

    @foreach($pages as $page)
        <div class="post-preview bordering">
            <form class="panel-primary" method="get" action="{{ route('static_pages.update_form', $page->id) }}">
                <div class="control-group">
                    <div class="user_bar">
                        <h3 class="h3">{{ $page->page_title }}</h3>

                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </div>

                </div>
            </form>
        </div>
    @endforeach
</div>
