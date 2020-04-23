@extends('app', ['page_title' => 'News Feeds', 'open_menu' => 'menu'])

@section('content')
<div class="row">
    <div class="col-12" style="margin-bottom: 20px;">
        <a class="btn btn-primary" href="{{ route('news_feeds.index') }}"><i class="fas fa-list"></i> Existing News Feeds</a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <legend>Edit News Feed</legend>
        {!! Form::model($news_feed, ['route' => ['news_feeds.update', $news_feed->slug()], 'class' => 'form-group']) !!}
        @method('PUT')
        @include('news_feeds/form', ['submit_text' => 'Update News Feed'])
        {!! Form::close() !!}
    </div>
</div>
@endsection