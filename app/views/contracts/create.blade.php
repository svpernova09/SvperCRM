@extends(Config::get('Sentinel::config.layout'))

{{-- Web site Title --}}
@section('title')
@parent
Create New Contract
@stop

{{-- Content --}}
@section('content')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
            <h2>Create New Contract</h2>

            {{--<div class="form_group">--}}
                {{--<button class="btn btn-primary" onClick="location.href='{{ URL::action('ContractsController@upload') }}'">Import Contracts from file</button>--}}
            {{--</div>--}}

            <div class="form_group">
                * denotes required fields.
            </div>
            {{ Form::open(array('action' => 'ContractsController@store')) }}

            <div class="form-group {{ ($errors->has('title')) ? 'has-error' : '' }}">
                {{ Form::text('title', null, array('class' => 'form-control', 'placeholder' => 'Title *')) }}
                {{ ($errors->has('title') ? $errors->first('title') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('hours')) ? 'has-error' : '' }}">
                {{ Form::text('hours', null, array('class' => 'form-control', 'placeholder' => 'Hours')) }}
                {{ ($errors->has('hours') ? $errors->first('hours') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('start_date')) ? 'has-error' : '' }}">
                {{ Form::label('start_date', 'Start Date: (0000-00-00 00:00:00)') }}
                {{ Form::text('start_date') }}
            </div>

            <div class="form-group {{ ($errors->has('end_date')) ? 'has-error' : '' }}">
                {{ Form::label('end_date', 'End Date: (0000-00-00 00:00:00)') }}
                {{ Form::text('end_date') }}
            </div>

            <div class="form-group {{ ($errors->has('platform')) ? 'has-error' : '' }}">
                {{ Form::label('platform', 'Platform: ') }}
                {{ Form::textarea('platform') }}
            </div>

            <div class="form-group {{ ($errors->has('domain')) ? 'has-error' : '' }}">
                {{ Form::text('domain', null, array('class' => 'form-control', 'placeholder' => 'Domain')) }}
                {{ ($errors->has('domain') ? $errors->first('domain') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('designer_id')) ? 'has-error' : '' }}">
                {{ Form::label('designer_id', 'Designer: ') }}
                {{ Form::select('designer_id', $designers) }}
            </div>

            <div class="form-group {{ ($errors->has('developer_id')) ? 'has-error' : '' }}">
                {{ Form::label('developer_id', 'Developer: ') }}
                {{ Form::select('developer_id', $developers) }}
            </div>

            {{ Form::submit('Create Contract', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}
    </div>
</div>


@stop