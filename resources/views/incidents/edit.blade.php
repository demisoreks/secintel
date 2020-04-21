@extends('app', ['page_title' => 'Incidents', 'open_menu' => 'menu'])

@section('content')
<div class="row">
    <div class="col-12" style="margin-bottom: 20px;">
        <a class="btn btn-primary" href="{{ route('incidents.index') }}"><i class="fas fa-list"></i> Existing Incidents</a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <legend>Edit Incident</legend>
        {!! Form::model($incident, ['route' => ['incidents.update', $incident->slug()], 'class' => 'form-group']) !!}
        @method('PUT')
        @include('incidents/form', ['submit_text' => 'Update Incident'])
        {!! Form::close() !!}
    </div>
</div>
@endsection