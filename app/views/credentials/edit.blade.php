@extends(Config::get('Sentinel::config.layout'))

{{-- Web site Title --}}
@section('title')
@parent
Edit Credential
@stop

{{-- Content --}}
@section('content')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        {{ Form::model('Credential', array('method' => 'put', 'route' => array('organizations.credentials.update', $org->id, $credential->id))) }}
            <h2>Edit Credential</h2>

            <div class="form_group">
                * denotes required fields.
            </div>

            <div class="form-group {{ ($errors->has('service_name')) ? 'has-error' : '' }}">
                {{ Form::text('service_name', $credential->service_name, array('class' => 'form-control', 'placeholder' => 'Service Name *')) }}
                {{ ($errors->has('service_name') ? $errors->first('service_name') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('user_name')) ? 'has-error' : '' }}">
                {{ Form::text('user_name', $credential->user_name, array('class' => 'form-control', 'placeholder' => 'User Name *')) }}
                {{ ($errors->has('user_name') ? $errors->first('user_name') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('password')) ? 'has-error' : '' }}">
                {{ Form::text('password', $credential->password, array('class' => 'form-control', 'placeholder' => 'Password *')) }}
                {{ ($errors->has('password') ? $errors->first('password') : '') }}
            </div>
            <div class="form-group {{ ($errors->has('comments')) ? 'has-error' : '' }}">
                {{ Form::textarea('comments', $credential->comments, array('class' => 'form-control', 'placeholder' => 'Comments *')) }}
                {{ ($errors->has('comments') ? $errors->first('comments') : '') }}
            </div>


            {{ Form::submit('Update Contract', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}
    </div>
</div>


@stop