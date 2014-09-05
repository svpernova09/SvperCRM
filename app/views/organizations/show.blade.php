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
		    	    {{ $org->address }} <br />
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
            @if ($org->is_agency)
                <p><strong>This is an agency.</strong></p>
            @endif
			@if ($org->phone)
		    	<p><strong>Phone:</strong>  {{ $org->phone }}</p>
			@endif

		    
		</div>
		<div class="col-md-4">
			<p><em>Created: {{ $org->created_at }}</em></p>
			<p><em>Last Updated: {{ $org->updated_at }}</em></p>
			<button class="btn btn-primary" onClick="location.href='{{ action('OrganizationsController@edit', array($org->id)) }}'">Edit Organization</button>
		</div>
	</div>


	
	<hr />

	<h4>Ogranization Object</h4>
	<div>
		<p>{{ var_dump($org) }}</p>
	</div>

@stop
