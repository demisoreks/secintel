@extends('app', ['page_title' => 'Dashboard'])

@section('content')
@include('commons.message')
<legend>Incidents (Last 14 days)</legend>
<div class="row">
    <div class="col-md-6">
        {!! $date_chart->container() !!}
        {!! $date_chart->script() !!}
    </div>
    <div class="col-md-6">
        {!! $type_chart->container() !!}
        {!! $type_chart->script() !!}
    </div>
</div>
@endsection