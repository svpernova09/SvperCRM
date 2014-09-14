@extends(Config::get('Sentinel::config.layout'))

{{-- Web site Title --}}
@section('title')
@parent
Import Contracts
@stop

{{-- Content --}}
@section('content')
	<h4>Import Contracts from CSV</h4>

    <div class="col-md-8">
        <p><a href="/packages/contracts-import.csv" target="_blank">Download sample CSV</a></p>
        {{ Form::open(array('action' => 'ContractsController@import', 'files' => 'true')) }}

            <div class="form-group {{ ($errors->has('csv')) ? 'has-error' : '' }}">
                {{ Form::label('csv', 'Import Contracts') }}
                {{ Form::file('csv') }}
            </div>

            {{ Form::submit('Upload', array('class' => 'btn btn-primary')) }}
        {{ Form::close() }}
    </div>
	<hr />

@stop
