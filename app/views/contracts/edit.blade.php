@extends(Config::get('Sentinel::config.layout'))

{{-- Web site Title --}}
@section('title')
@parent
Edit Contract
@stop

{{-- Content --}}
@section('content')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        {{ Form::model('Contract', array('method' => 'put', 'route' => array('contracts.update', $contract->id))) }}
            <h2>Edit Contract</h2>

            <div class="form_group">
                * denotes required fields.
            </div>

            <div class="form-group {{ ($errors->has('title')) ? 'has-error' : '' }}">
                {{ Form::text('title', $contract->title, array('class' => 'form-control', 'placeholder' => 'Title *')) }}
                {{ ($errors->has('title') ? $errors->first('title') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('hours')) ? 'has-error' : '' }}">
                {{ Form::text('hours', $contract->hours, array('class' => 'form-control', 'placeholder' => 'Hours')) }}
                {{ ($errors->has('hours') ? $errors->first('hours') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('start_date')) ? 'has-error' : '' }}">
                {{ Form::text('input_start_date', $contract->start_date, array('class' => 'form-control datetime-input-crm', 'placeholder' => 'Start Date (0000-00-00 00:00:00)')) }}
                {{ Form::hidden('start_date') }}
                {{ ($errors->has('start_date') ? $errors->first('start_date') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('end_date')) ? 'has-error' : '' }}">
                {{ Form::text('input_end_date', $contract->end_date, array('class' => 'form-control datetime-input-crm', 'placeholder' => 'End Date (0000-00-00 00:00:00)')) }}
                {{ Form::hidden('end_date') }}
                {{ ($errors->has('end_date') ? $errors->first('end_date') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('domain')) ? 'has-error' : '' }}">
                {{ Form::text('domain', $contract->domain, array('class' => 'form-control', 'placeholder' => 'Domain')) }}
                {{ ($errors->has('domain') ? $errors->first('domain') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('platform')) ? 'has-error' : '' }}">
                {{ Form::textarea('platform', $contract->platform, array('class' => 'form-control', 'placeholder' => 'Platform')) }}
                {{ ($errors->has('platform') ? $errors->first('platform') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('designer_id')) ? 'has-error' : '' }}">
                {{ Form::label('designer_id', 'Designer: ') }}
                {{ Form::select('designer_id', $designers, $contract->designer_id) }}
            </div>

            <div class="form-group {{ ($errors->has('developer_id')) ? 'has-error' : '' }}">
                {{ Form::label('developer_id', 'Developer: ') }}
                {{ Form::select('developer_id', $developers, $contract->developer_id) }}
            </div>

            {{ Form::submit('Update Contract', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}
    </div>
</div>


@stop