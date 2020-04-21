@extends('app', ['page_title' => 'Incident Types', 'open_menu' => 'menu'])

@section('content')
<div class="row">
    <div class="col-12" style="margin-bottom: 20px;">
        <a class="btn btn-primary" href="{{ route('incident_types.index') }}"><i class="fas fa-list"></i> Existing Incident Types</a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <legend>New Incident Type</legend>
        {!! Form::model(new App\SecIncidentType, ['route' => ['incident_types.store'], 'class' => 'form-group']) !!}
            @include('incident_types/form', ['submit_text' => 'Create Incident Type'])
        {!! Form::close() !!}
    </div>
</div>
@endsection
