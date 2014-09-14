@extends(Config::get('Sentinel::config.layout'))

{{-- Web site Title --}}
@section('title')
@parent
View Organization
@stop

{{-- Content --}}
@section('content')
	<h4><a href="{{ URL::route('organizations.show', [$org->id]) }}">{{ $org->name }}</a></h4>

  	<div class="well clearfix">
	    <div class="col-md-8">
		    @if ($credential->service_name)
		    	<p><strong>Service Name:</strong> {{ $credential->service_name }}</p>
			@endif
		    @if ($credential->user_name)
		    	<p><strong>User Name:</strong> {{ $credential->user_name }}</p>
			@endif
            @if ($credential->password)
                <p><strong>Password:</strong> {{ $credential->password }}</p>
            @endif
            @if ($credential->comments)
                <p><strong>Comments:</strong> {{ $credential->comments }}</p>
            @endif
		</div>
		<div class="col-md-4">
			<p><em>Created: {{ $credential->created_at }}</em></p>
			<p><em>Last Updated: {{ $credential->updated_at }}</em></p>
			<button class="btn btn-primary" onClick="location.href='{{ action('CredentialsController@edit', [$org->id, $credential->id]) }}'">Edit Credential</button>

            <div class="btn-group">
            {{ Form::open(array('route' => array('organizations.credentials.destroy', $org->id, $credential->id), 'method' => 'delete')) }}
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

	<h4>Credential Object</h4>
	<div>
		<p>{{ var_dump($credential) }}</p>
	</div>

@stop
