@extends(Config::get('Sentinel::config.layout'))

{{-- Web site Title --}}
@section('title')
@parent
Import People
@stop

{{-- Content --}}
@section('content')
	<h4>Import People from CSV</h4>

    <div class="col-md-8">
        <p><a href="/packages/people-import.csv" target="_blank">Download sample CSV</a></p>
        {{ Form::open(array('action' => 'PeopleController@import', 'files' => 'true')) }}

            <div class="form-group {{ ($errors->has('name')) ? 'has-error' : '' }}">
                {{ Form::label('csv', 'Import People') }}
                {{ Form::file('csv') }}
            </div>

            {{ Form::submit('Upload', array('class' => 'btn btn-primary')) }}
        {{ Form::close() }}
    </div>
	<hr />

@stop
