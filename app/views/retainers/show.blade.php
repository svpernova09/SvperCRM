@extends(Config::get('Sentinel::config.layout'))

{{-- Web site Title --}}
@section('title')
@parent
View Retainer
@stop

{{-- Content --}}
@section('content')
	<h4>{{ $retainer->title }}</h4>
	
  	<div class="well clearfix">
	    <div class="col-md-8">
			@if ($retainer->hours)
		    	<p><strong>Hours:</strong>  {{ $retainer->hours }}</p>
			@endif
            @if ($retainer->domain)
                <p><strong>Domain:</strong>  {{ $retainer->domain }}</p>
            @endif

            @if ($retainer->strategiest)
                <p><strong>Marketing Strategiest:</strong></p>
                <p>{{ $retainer->strategiest->name }}</p>
            @endif
            @if ($retainer->accountManager)
                <p><strong>Account Manager:</strong></p>
                <p>{{ $retainer->accountManager->name }}</p>
            @endif
            @if ($retainer->comments)
                <p><strong>Comments:</strong></p>
                <p>{{ $retainer->comments }}</p>
            @endif
		</div>
		<div class="col-md-4">
			<p><em>Created: {{ $retainer->created_at }}</em></p>
			<p><em>Last Updated: {{ $retainer->updated_at }}</em></p>
			<button class="btn btn-primary" onClick="location.href='{{ action('RetainersController@edit', array($retainer->id)) }}'">Edit Retainer</button>

            <div class="btn-group">
            {{ Form::open(array('route' => array('retainers.destroy', $retainer->id), 'method' => 'delete')) }}
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

	{{--<h4>Retainer Object</h4>--}}
	{{--<div>--}}
		{{--<p>{{ var_dump($retainer) }}</p>--}}
	{{--</div>--}}

@stop
