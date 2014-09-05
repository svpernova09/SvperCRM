@extends(Config::get('Sentinel::config.layout'))

{{-- Web site Title --}}
@section('title')
@parent
Create New Organization
@stop

{{-- Content --}}
@section('content')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        {{ Form::open(array('action' => 'OrganizationsController@store')) }}

            <h2>Create New Organization</h2>

            <div class="form_group">
                * denotes required fields.
            </div>

            <div class="form-group {{ ($errors->has('name')) ? 'has-error' : '' }}">
                {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Name *')) }}
                {{ ($errors->has('name') ? $errors->first('name') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('address')) ? 'has-error' : '' }}">
                {{ Form::text('address', null, array('class' => 'form-control', 'placeholder' => 'Address')) }}
                {{ ($errors->has('address') ? $errors->first('address') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('address2')) ? 'has-error' : '' }}">
                {{ Form::text('address2', null, array('class' => 'form-control', 'placeholder' => 'Address 2')) }}
                {{ ($errors->has('address2') ? $errors->first('address2') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('city')) ? 'has-error' : '' }}">
                {{ Form::text('city', null, array('class' => 'form-control', 'placeholder' => 'City')) }}
                {{ ($errors->has('city') ? $errors->first('city') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('state')) ? 'has-error' : '' }}">
                {{ Form::text('state', null, array('class' => 'form-control', 'placeholder' => 'State')) }}
                {{ ($errors->has('state') ? $errors->first('state') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('zip')) ? 'has-error' : '' }}">
                {{ Form::text('zip', null, array('class' => 'form-control', 'placeholder' => 'Post Code')) }}
                {{ ($errors->has('zip') ? $errors->first('zip') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('phone')) ? 'has-error' : '' }}">
                {{ Form::text('phone', null, array('class' => 'form-control', 'placeholder' => 'Phone')) }}
                {{ ($errors->has('phone') ? $errors->first('phone') : '') }}
            </div>

            <div class="checkbox {{ ($errors->has('is_agency')) ? 'has-error' : '' }}">
                {{ Form::label('is_agency', 'This is an Agency') }}
                {{ Form::checkbox('is_agency', '1', null, ['class' => 'checkbox']) }}
                {{ ($errors->has('is_agency') ? $errors->first('is_agency') : '') }}
            </div>

            {{ Form::submit('Create Organization', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}
    </div>
</div>


@stop