@extends(Config::get('Sentinel::config.layout'))

{{-- Web site Title --}}
@section('title')
@parent
View Person
@stop

{{-- Content --}}
@section('content')
	<h4>{{ $person->name }} - {{ $person->organization->name }}</h4>
	
  	<div class="well clearfix">
	    <div class="col-md-8">
		    @if ($person->address)
		    	<p>
		    	    <strong>Address:</strong><br />
                    @if ($person->address)
                        {{ $person->address }} <br />
                    @endif
                    @if ($person->address2)
                        {{ $person->address2 }} <br />
                    @endif
                    @if ($person->city)
                        {{ $person->city }}
                    @endif
                    @if ($person->state)
                        {{ $person->state }}
                    @endif
                    @if ($person->zip)
                        {{ $person->zip }}
                    @endif
		    	 </p>
			@endif
            @if ($person->email)
                <p><strong>Email:</strong>  {{ $person->email }}</p>
            @endif
             @if ($person->comments)
                 Comments: {{ $person->comments }}
             @endif
			@if ($person->office_phone)
		    	<p><strong>Office Phone:</strong>  {{ $person->office_phone }}</p>
			@endif
            @if ($person->mobile_phone)
                <p><strong>Mobile Phone:</strong>  {{ $person->mobile_phone }}</p>
            @endif
            @if ($person->is_sales_person)
                <p><strong>This is a sales person.</strong></p>
            @endif
            @if ($person->is_account_manager)
                <p><strong>This is an account manager.</strong></p>
            @endif
            @if ($person->is_designer)
                <p><strong>This is a designer.</strong></p>
            @endif
            @if ($person->is_developer)
                <p><strong>This is a developer.</strong></p>
            @endif
            @if ($person->is_marketing_strategiest)
                <p><strong>This is a marketing strategiest.</strong></p>
            @endif
            @if ($person->comments)
                <p><strong>Comments:.</strong>{{ $person->comments }}</p>
            @endif
		</div>
		<div class="col-md-4">
			<p><em>Created: {{ $person->created_at }}</em></p>
			<p><em>Last Updated: {{ $person->updated_at }}</em></p>
			<button class="btn btn-primary" onClick="location.href='{{ action('PeopleController@edit', array($person->id)) }}'">Edit Person</button>
            <div class="btn-group">
            {{ Form::open(array('route' => array('people.destroy', $person->id), 'method' => 'delete')) }}
            <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                Danger <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">

                <li>
                    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                </li>
            </ul>
            {{ Form::close() }}
            </div>
		</div>
	</div>


	
	<hr />

	{{--<h4>Person Object</h4>--}}
	{{--<div>--}}
		{{--<p>{{ var_dump($person) }}</p>--}}
	{{--</div>--}}

@stop
