@extends(Config::get('Sentinel::config.layout'))

{{-- Web site Title --}}
@section('title')
@parent
Edit Person
@stop

{{-- Content --}}
@section('content')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        {{ Form::model('Person', array('method' => 'put', 'route' => array('people.update', $person->id))) }}
            <h2>Edit Person</h2>

            <div class="form_group">
                * denotes required fields.
            </div>

            <div class="form-group {{ ($errors->has('first_name')) ? 'has-error' : '' }}">
                {{ Form::text('first_name', $person->first_name, array('class' => 'form-control', 'placeholder' => 'First Name *')) }}
                {{ ($errors->has('first_name') ? $errors->first('first_name') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('last_name')) ? 'has-error' : '' }}">
                {{ Form::text('last_name', $person->last_name, array('class' => 'form-control', 'placeholder' => 'Last Name *')) }}
                {{ ($errors->has('last_name') ? $errors->first('last_name') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('address')) ? 'has-error' : '' }}">
                {{ Form::text('address', $person->address, array('class' => 'form-control', 'placeholder' => 'Address')) }}
                {{ ($errors->has('address') ? $errors->first('address') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('address2')) ? 'has-error' : '' }}">
                {{ Form::text('address2', $person->address2, array('class' => 'form-control', 'placeholder' => 'Address 2')) }}
                {{ ($errors->has('address2') ? $errors->first('address2') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('city')) ? 'has-error' : '' }}">
                {{ Form::text('city', $person->city, array('class' => 'form-control', 'placeholder' => 'City')) }}
                {{ ($errors->has('city') ? $errors->first('city') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('state')) ? 'has-error' : '' }}">
                {{ Form::text('state', $person->state, array('class' => 'form-control', 'placeholder' => 'State')) }}
                {{ ($errors->has('state') ? $errors->first('state') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('zip')) ? 'has-error' : '' }}">
                {{ Form::text('zip', $person->zip, array('class' => 'form-control', 'placeholder' => 'Post Code')) }}
                {{ ($errors->has('zip') ? $errors->first('zip') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('office_phone')) ? 'has-error' : '' }}">
                {{ Form::text('office_phone', $person->office_phone, array('class' => 'form-control', 'placeholder' => 'Office Phone')) }}
                {{ ($errors->has('office_phone') ? $errors->first('office_phone') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('mobile_phone')) ? 'has-error' : '' }}">
                {{ Form::text('mobile_phone', $person->mobile_phone, array('class' => 'form-control', 'placeholder' => 'Mobile Phone')) }}
                {{ ($errors->has('mobile_phone') ? $errors->first('mobile_phone') : '') }}
            </div>

            <div class="radio {{ ($errors->has('is_sales_person')) ? 'has-error' : '' }}">
                Is this a Salesperson?<br>
                {{ Form::radio('is_sales_person', '1', ($person->is_sales_person == '1'), array('id'=>'1', 'class'=>'radio')) }} Yes<br>
                {{ Form::radio('is_sales_person', '0', ($person->is_agency == '0'), array('id'=>'0', 'class'=>'radio')) }} No
                {{ ($errors->has('is_sales_person') ? $errors->first('is_sales_person') : '') }}
            </div>

            <div class="radio {{ ($errors->has('is_account_manager')) ? 'has-error' : '' }}">
                Is this an Account Manager?<br>
                {{ Form::radio('is_account_manager', '1', ($person->is_account_manager == '1'), array('id'=>'1', 'class'=>'radio')) }} Yes<br>
                {{ Form::radio('is_account_manager', '0', ($person->is_account_manager == '0'), array('id'=>'0', 'class'=>'radio')) }} No
                {{ ($errors->has('is_account_manager') ? $errors->first('is_account_manager') : '') }}
            </div>

            <div class="radio {{ ($errors->has('is_designer')) ? 'has-error' : '' }}">
                Is this a Designer?<br>
                {{ Form::radio('is_designer', '1', ($person->is_designer == '1'), array('id'=>'1', 'class'=>'radio')) }} Yes<br>
                {{ Form::radio('is_designer', '0', ($person->is_designer == '0'), array('id'=>'0', 'class'=>'radio')) }} No
                {{ ($errors->has('is_designer') ? $errors->first('is_designer') : '') }}
            </div>

            <div class="radio {{ ($errors->has('is_developer')) ? 'has-error' : '' }}">
                Is this a Developer?<br>
                {{ Form::radio('is_developer', '1', ($person->is_developer == '1'), array('id'=>'1', 'class'=>'radio')) }} Yes<br>
                {{ Form::radio('is_developer', '0', ($person->is_developer == '0'), array('id'=>'0', 'class'=>'radio')) }} No
                {{ ($errors->has('is_developer') ? $errors->first('is_developer') : '') }}
            </div>

            <div class="radio {{ ($errors->has('is_marketing_strategiest')) ? 'has-error' : '' }}">
                Is this a Marketing Strategist?<br>
                {{ Form::radio('is_marketing_strategiest', '1', ($person->is_marketing_strategiest == '1'), array('id'=>'1', 'class'=>'radio')) }} Yes<br>
                {{ Form::radio('is_marketing_strategiest', '0', ($person->is_marketing_strategiest == '0'), array('id'=>'0', 'class'=>'radio')) }} No
                {{ ($errors->has('is_marketing_strategiest') ? $errors->first('is_marketing_strategiest') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('organization_id')) ? 'has-error' : '' }}">
                {{ Form::label('organization_id', 'Organization: ') }}
                {{ Form::select('organization_id', $orgs, $person->organization_id) }}
            </div>

            <div class="form-group {{ ($errors->has('comments')) ? 'has-error' : '' }}">
                {{ Form::label('comments', 'Comments: ') }}
                {{ Form::textarea('comments', $person->comments, array('class' => 'form-control', 'placeholder' => 'Comments')) }}
                {{ ($errors->has('comments') ? $errors->first('comments') : '') }}
            </div>

            {{ Form::submit('Update Person', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}
    </div>
</div>


@stop