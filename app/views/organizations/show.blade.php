@extends(Config::get('Sentinel::config.layout'))

{{-- Web site Title --}}
@section('title')
@parent
View Organization
@stop

{{-- Content --}}
@section('content')
	<h4>{{ $organization->name }}</h4>
	
  	<div class="well clearfix">
	    <div class="col-md-8">
		    @if ($organization->address)
		    	<p>
		    	    <strong>Address:</strong><br />
                    @if ($organization->address)
                        {{ $organization->address }} <br />
                    @endif
                    @if ($organization->address2)
                        {{ $organization->address2 }} <br />
                    @endif
                    @if ($organization->city)
                        {{ $organization->city }}
                    @endif
                    @if ($organization->state)
                        {{ $organization->state }}
                    @endif
                    @if ($organization->zip)
                        {{ $organization->zip }}
                    @endif
		    	 </p>
			@endif
			@if ($organization->phone)
		    	<p><strong>Phone:</strong>  {{ $organization->phone }}</p>
			@endif
            @if ($organization->is_agency)
                <p><strong>This is an agency.</strong></p>
            @endif
		    @if ($organization->agency)
		        <p>
                    <strong>Related Agency:</strong><br>
		            {{ $organization->agency->name }}<br>
                    @if ($organization->agency->address)
                        {{ $organization->agency->address }} <br />
                    @endif
                    @if ($organization->agency->address2)
                        {{ $organization->agency->address2 }} <br />
                    @endif
                    @if ($organization->agency->city)
                        {{ $organization->agency->city }}
                    @endif
                    @if ($organization->agency->state)
                        {{ $organization->agency->state }}
                    @endif
                    @if ($organization->agency->zip)
                        {{ $organization->agency->zip }}
                    @endif
		        </p>
		    @endif
            @if ($organization->salesPerson)
                <p><strong>Sales Person:</strong></p>
                <p>{{ $organization->salesPerson->name }}</p>
            @endif
            @if ($organization->accountManager)
                <p><strong>Account Manager:</strong></p>
                <p>{{ $organization->accountManager->name }}</p>
            @endif
            @if ($organization->comments)
                <p><strong>Comments:</strong></p>
                <p>{{ $organization->comments }}</p>
            @endif
		</div>
		<div class="col-md-4">
			<p><em>Created: {{ $organization->created_at }}</em></p>
			<p><em>Last Updated: {{ $organization->updated_at }}</em></p>
			<button class="btn btn-primary" onClick="location.href='{{ action('OrganizationsController@edit', array($organization->id)) }}'">Edit Organization</button>

            <div class="btn-group">
            {{ Form::open(array('route' => array('organizations.destroy', $organization->id), 'method' => 'delete')) }}
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

    
    <div class="well clearfix">
        <h4>Credentials</h4>
        @if (count($organization->credentials) > 0)
            <div class="col-md-8">
                @foreach ($organization->credentials as $cred)
                    <p><a href="{{ URL::route('organizations.credentials.show', [$organization->id, $cred->id]) }}">{{ $cred->service_name }}</a></p>
                @endforeach
            </div>
        @endif

        <div class="col-md-4">
            <button class="btn btn-primary" onClick="location.href='{{ action('CredentialsController@create', [$organization->id]) }}'">Create Credential</button>
        </div>
    </div>


	
	<hr />

	{{--<h4>Ogranization Object</h4>--}}
	{{--<div>--}}
		{{--<p>{{ var_dump($organization) }}</p>--}}
	{{--</div>--}}

@stop
