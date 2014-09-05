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
        {{ Form::model('Organization', array('method' => 'put', 'route' => array('organizations.update', $org->id))) }}
            <h2>Edit Organization</h2>

            <div class="form_group">
                * denotes required fields.
            </div>

            <div class="form-group {{ ($errors->has('name')) ? 'has-error' : '' }}">
                {{ Form::text('name', $org->name, array('class' => 'form-control', 'placeholder' => 'Name *')) }}
                {{ ($errors->has('name') ? $errors->first('name') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('address')) ? 'has-error' : '' }}">
                {{ Form::text('address', $org->address, array('class' => 'form-control', 'placeholder' => 'Address')) }}
                {{ ($errors->has('address') ? $errors->first('address') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('address2')) ? 'has-error' : '' }}">
                {{ Form::text('address2', $org->address2, array('class' => 'form-control', 'placeholder' => 'Address 2')) }}
                {{ ($errors->has('address2') ? $errors->first('address2') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('city')) ? 'has-error' : '' }}">
                {{ Form::text('city', $org->city, array('class' => 'form-control', 'placeholder' => 'City')) }}
                {{ ($errors->has('city') ? $errors->first('city') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('state')) ? 'has-error' : '' }}">
                {{ Form::text('state', $org->state, array('class' => 'form-control', 'placeholder' => 'State')) }}
                {{ ($errors->has('state') ? $errors->first('state') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('zip')) ? 'has-error' : '' }}">
                {{ Form::text('zip', $org->zip, array('class' => 'form-control', 'placeholder' => 'Post Code')) }}
                {{ ($errors->has('zip') ? $errors->first('zip') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('phone')) ? 'has-error' : '' }}">
                {{ Form::text('phone', $org->phone, array('class' => 'form-control', 'placeholder' => 'Phone')) }}
                {{ ($errors->has('phone') ? $errors->first('phone') : '') }}
            </div>

            <div class="radio {{ ($errors->has('is_agency')) ? 'has-error' : '' }}">
                Is this an Agency?<br>
                {{ Form::radio('is_agency', '1', ($org->is_agency == '1'), array('id'=>'1', 'class'=>'radio')) }} Yes<br>
                {{ Form::radio('is_agency', '0', ($org->is_agency == '0'), array('id'=>'0', 'class'=>'radio')) }} No
                {{ ($errors->has('is_agency') ? $errors->first('is_agency') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('agency_id')) ? 'has-error' : '' }}">
                {{ Form::label('agency_id', 'Related Agency: ') }}
                {{ Form::select('agency_id', $possibleAgencies, $org->agency_id) }}
            </div>

            {{ Form::submit('Update Organization', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}
    </div>
</div>


@stop