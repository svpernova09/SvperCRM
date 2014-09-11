@extends(Config::get('Sentinel::config.layout'))

{{-- Web site Title --}}
@section('title')
@parent
View Organization
@stop

{{-- Content --}}
@section('content')
	<h4>{{ $org->name }}</h4>
	
  	<div class="well clearfix">
	    <div class="col-md-8">
		    @if ($org->address)
		    	<p>
		    	    <strong>Address:</strong><br />
                    @if ($org->address)
                        {{ $org->address }} <br />
                    @endif
                    @if ($org->address2)
                        {{ $org->address2 }} <br />
                    @endif
                    @if ($org->city)
                        {{ $org->city }}
                    @endif
                    @if ($org->state)
                        {{ $org->state }}
                    @endif
                    @if ($org->zip)
                        {{ $org->zip }}
                    @endif
		    	 </p>
			@endif
			@if ($org->phone)
		    	<p><strong>Phone:</strong>  {{ $org->phone }}</p>
			@endif
            @if ($org->is_agency)
                <p><strong>This is an agency.</strong></p>
            @endif
		    @if ($org->agency)
		        <p>
                    <strong>Related Agency:</strong><br>
		            {{ $org->agency->name }}<br>
                    @if ($org->agency->address)
                        {{ $org->agency->address }} <br />
                    @endif
                    @if ($org->agency->address2)
                        {{ $org->agency->address2 }} <br />
                    @endif
                    @if ($org->agency->city)
                        {{ $org->agency->city }}
                    @endif
                    @if ($org->agency->state)
                        {{ $org->agency->state }}
                    @endif
                    @if ($org->agency->zip)
                        {{ $org->agency->zip }}
                    @endif
		        </p>
		    @endif
            @if ($org->salesPerson)
                <p><strong>Sales Person:</strong></p>
                <p>{{ $org->salesPerson->name }}</p>
            @endif
            @if ($org->accountManager)
                <p><strong>Account Manager:</strong></p>
                <p>{{ $org->accountManager->name }}</p>
            @endif
            @if ($org->comments)
                <p><strong>Comments:</strong></p>
                <p>{{ $org->comments }}</p>
            @endif
		</div>
		<div class="col-md-4">
			<p><em>Created: {{ $org->created_at }}</em></p>
			<p><em>Last Updated: {{ $org->updated_at }}</em></p>
			<button class="btn btn-primary" onClick="location.href='{{ action('OrganizationsController@edit', array($org->id)) }}'">Edit Organization</button>

            <div class="btn-group">
            {{ Form::open(array('route' => array('organizations.destroy', $org->id), 'method' => 'delete')) }}
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
	
    @if (count($org->credentials) > 0)
        <div class="well clearfix">
            <h4>Credentials</h4>
            <div class="col-md-12">
                @foreach ($org->credentials as $cred)
                    <p>Service Name: {{ $cred->service_name }}</p>
                @endforeach
            </div>
        </div>
    @endif

	
	<hr />

	<h4>Ogranization Object</h4>
	<div>
		<p>{{ var_dump($org) }}</p>
	</div>

@stop
