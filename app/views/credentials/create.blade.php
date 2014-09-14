@extends(Config::get('Sentinel::config.layout'))

{{-- Web site Title --}}
@section('title')
@parent
Create New Credential
@stop

{{-- Content --}}
@section('content')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
            <h2>Create New Credential</h2>

            <div class="form_group">
                <button class="btn btn-primary" onClick="location.href='{{ URL::action('CredentialsController@upload') }}'">Import Credentials from file</button>
            </div>

            <div class="form_group">
                * denotes required fields.
            </div>
            {{ Form::open(array('action' => array('CredentialsController@store', $organization_id))) }}

            <div class="form-group {{ ($errors->has('service_name')) ? 'has-error' : '' }}">
                {{ Form::text('service_name', null, array('class' => 'form-control', 'placeholder' => 'Service Name *')) }}
                {{ ($errors->has('service_name') ? $errors->first('service_name') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('user_name')) ? 'has-error' : '' }}">
                {{ Form::text('user_name', null, array('class' => 'form-control', 'placeholder' => 'User Name')) }}
                {{ ($errors->has('user_name') ? $errors->first('user_name') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('password')) ? 'has-error' : '' }}">
                {{ Form::text('password', null, array('class' => 'form-control', 'placeholder' => 'Password')) }}
                {{ ($errors->has('password') ? $errors->first('password') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('comments')) ? 'has-error' : '' }}">
                {{ Form::label('comments', 'Comments: ') }}
                {{ Form::textarea('comments') }}
            </div>

            {{ Form::submit('Create Credential', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}
    </div>
</div>


@stop