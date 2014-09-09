@extends(Config::get('Sentinel::config.layout'))

{{-- Web site Title --}}
@section('title')
@parent
Create New Retainer
@stop

{{-- Content --}}
@section('content')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
            <h2>Create New Retainer</h2>

            {{--<div class="form_group">--}}
                {{--<button class="btn btn-primary" onClick="location.href='{{ URL::action('RetainersController@upload') }}'">Import Organizations from file</button>--}}
            {{--</div>--}}

            <div class="form_group">
                * denotes required fields.
            </div>
            {{ Form::open(array('action' => 'RetainersController@store')) }}

            <div class="form-group {{ ($errors->has('title')) ? 'has-error' : '' }}">
                {{ Form::text('title', null, array('class' => 'form-control', 'placeholder' => 'Title *')) }}
                {{ ($errors->has('title') ? $errors->first('title') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('hours')) ? 'has-error' : '' }}">
                {{ Form::text('hours', null, array('class' => 'form-control', 'placeholder' => 'Hours')) }}
                {{ ($errors->has('hours') ? $errors->first('hours') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('domain')) ? 'has-error' : '' }}">
                {{ Form::text('domain', null, array('class' => 'form-control', 'placeholder' => 'Domain')) }}
                {{ ($errors->has('domain') ? $errors->first('domain') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('comments')) ? 'has-error' : '' }}">
                {{ Form::label('comments', 'Comments: ') }}
                {{ Form::textarea('comments') }}
            </div>

            <div class="form-group {{ ($errors->has('strategiest_id')) ? 'has-error' : '' }}">
                {{ Form::label('strategiest_id', 'Marketing Strategiest: ') }}
                {{ Form::select('strategiest_id', $marketers) }}
            </div>

            <div class="form-group {{ ($errors->has('account_manager_id')) ? 'has-error' : '' }}">
                {{ Form::label('account_manager_id', 'Account Manager: ') }}
                {{ Form::select('account_manager_id', $accountManagers) }}
            </div>

            {{ Form::submit('Create Retainer', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}
    </div>
</div>


@stop