@extends('app', ['page_title' => 'News Feeds', 'open_menu' => 'menu'])

@section('content')
<div class="row">
    <div class="col-12" style="margin-bottom: 20px;">
        <a class="btn btn-primary" href="{{ route('news_feeds.create') }}"><i class="fas fa-plus"></i> New News Feed</a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div id="accordion1">
            <div class="card">
                <div class="card-header bg-white text-primary" id="heading3" style="padding: 0;">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse3" aria-expanded="true" aria-controls="collapse3">
                            <strong>Active</strong>
                        </button>
                    </h5>
                </div>
                <div id="collapse3" class="collapse show" aria-labelledby="heading3" data-parent="#accordion1">
                    <div class="card-body">
                        <table id="myTable3" class="display-1 table table-condensed table-hover table-striped responsive" width="100%">
                            <thead>
                                <tr class="text-center">
                                    <th width="10%"><strong>S/N</strong></th>
                                    <th><strong>TITLE</strong></th>
                                    <th><strong>INFO</strong></th>
                                    <th width="15%" data-priority="1">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($news_feeds as $news_feed)
                                    @if ($news_feed->show)
                                <tr>
                                    <td>{{ $news_feed->id }}</td>
                                    <td>{{ $news_feed->title }}</td>
                                    <td>{{ $news_feed->link }}</td>
                                    <td class="text-center">
                                        <a title="Edit" href="{{ route('news_feeds.edit', [$news_feed->slug()]) }}"><i class="fas fa-edit"></i></a>&nbsp;&nbsp;
                                        <a title="Trash" href="{{ route('news_feeds.disable', [$news_feed->slug()]) }}" onclick="return confirmDisable()"><i class="fas fa-trash"></i></a>&nbsp;&nbsp;
                                        <a title="Delete" href="{{ route('news_feeds.delete', [$news_feed->slug()]) }}" onclick="return confirmDelete()"><i class="fas fa-times text-danger"></i></a>
                                    </td>
                                </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> 
            </div>
            <div class="card">
                <div class="card-header bg-white text-primary" id="heading4" style="padding: 0;">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse4" aria-expanded="true" aria-controls="collapse4">
                            <strong>Inactive</strong>
                        </button>
                    </h5>
                </div>
                <div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#accordion1">
                    <div class="card-body">
                        <table id="myTable2" class="display-1 table table-condensed table-hover table-striped responsive" width="100%">
                            <thead>
                                <tr class="text-center">
                                    <th width="10%"><strong>S/N</strong></th>
                                    <th><strong>TITLE</strong></th>
                                    <th><strong>INFO</strong></th>
                                    <th width="15%" data-priority="1">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($news_feeds as $news_feed)
                                    @if (!$news_feed->show)
                                <tr>
                                    <td>{{ $news_feed->id }}</td>
                                    <td>{{ $news_feed->title }}</td>
                                    <td>{{ $news_feed->link }}</td>
                                    <td class="text-center">
                                        <a title="Restore" href="{{ route('news_feeds.enable', [$news_feed->slug()]) }}"><i class="fas fa-undo"></i></a>&nbsp;&nbsp;
                                        <a title="Delete" href="{{ route('news_feeds.delete', [$news_feed->slug()]) }}" onclick="return confirmDelete()"><i class="fas fa-times text-danger"></i></a>
                                    </td>
                                </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection