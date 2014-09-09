@extends(Config::get('Sentinel::config.layout'))

{{-- Web site Title --}}
@section('title')
@parent
Edit Retainer
@stop

{{-- Content --}}
@section('content')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        {{ Form::model('Retainer', array('method' => 'put', 'route' => array('retainers.update', $retainer->id))) }}
            <h2>Edit Retainer</h2>

            <div class="form_group">
                * denotes required fields.
            </div>

            <div class="form-group {{ ($errors->has('title')) ? 'has-error' : '' }}">
                {{ Form::text('title', $retainer->title, array('class' => 'form-control', 'placeholder' => 'Title *')) }}
                {{ ($errors->has('title') ? $errors->first('title') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('hours')) ? 'has-error' : '' }}">
                {{ Form::text('hours', $retainer->hours, array('class' => 'form-control', 'placeholder' => 'Hours')) }}
                {{ ($errors->has('hours') ? $errors->first('hours') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('domain')) ? 'has-error' : '' }}">
                {{ Form::text('domain', $retainer->domain, array('class' => 'form-control', 'placeholder' => 'Domain')) }}
                {{ ($errors->has('domain') ? $errors->first('domain') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('comments')) ? 'has-error' : '' }}">
                {{ Form::textarea('comments', $retainer->comments, array('class' => 'form-control', 'placeholder' => 'Comments')) }}
                {{ ($errors->has('comments') ? $errors->first('comments') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('strategiest_id')) ? 'has-error' : '' }}">
                {{ Form::label('strategiest_id', 'Marketing Strategiest: ') }}
                {{ Form::select('strategiest_id', $marketers, $retainer->strategiest_id) }}
            </div>

            <div class="form-group {{ ($errors->has('account_manager_id')) ? 'has-error' : '' }}">
                {{ Form::label('account_manager_id', 'Account Manager: ') }}
                {{ Form::select('account_manager_id', $accountManagers, $retainer->account_manager_id) }}
            </div>

            {{ Form::submit('Update Retainer', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}
    </div>
</div>


@stop