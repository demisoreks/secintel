@extends('app', ['page_title' => 'News Feeds', 'open_menu' => 'menu'])

@section('content')
<div class="row">
    <div class="col-12" style="margin-bottom: 20px;">
        <a class="btn btn-primary" href="{{ route('news_feeds.index') }}"><i class="fas fa-list"></i> Existing News Feeds</a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <legend>New News Feed</legend>
        {!! Form::model(new App\SecNewsFeed, ['route' => ['news_feeds.store'], 'class' => 'form-group']) !!}
            @include('news_feeds/form', ['submit_text' => 'Create News Feed'])
        {!! Form::close() !!}
    </div>
</div>
@endsection
