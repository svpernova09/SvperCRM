@extends(Config::get('Sentinel::config.layout'))

{{-- Web site Title --}}
@section('title')
@parent
View Contract
@stop

{{-- Content --}}
@section('content')
	<h4>{{ $contract->title }}</h4>
	
  	<div class="well clearfix">
	    <div class="col-md-8">
			@if ($contract->hours)
		    	<p><strong>Hours:</strong>  {{ $contract->hours }}</p>
			@endif
            @if ($contract->domain)
                <p><strong>Domain:</strong>  {{ $contract->domain }}</p>
            @endif
            @if ($contract->start_date)
                <p><strong>Start Date:</strong></p>
                <p>{{ $contract->start_date }}</p>
            @endif
            @if ($contract->end_date)
                <p><strong>End Date:</strong></p>
                <p>{{ $contract->end_date }}</p>
            @endif
            @if ($contract->platform)
                <p><strong>Platform:</strong></p>
                <p>{{ $contract->platform }}</p>
            @endif
            @if ($contract->developer)
                <p><strong>Developer:</strong></p>
                <p>{{ $contract->developer->name }}</p>
            @endif
            @if ($contract->designer)
                <p><strong>Designer:</strong></p>
                <p>{{ $contract->designer->name }}</p>
            @endif
		</div>
		<div class="col-md-4">
			<p><em>Created: {{ $contract->created_at }}</em></p>
			<p><em>Last Updated: {{ $contract->updated_at }}</em></p>
			<button class="btn btn-primary" onClick="location.href='{{ action('ContractsController@edit', array($contract->id)) }}'">Edit Contract</button>

            <div class="btn-group">
            {{ Form::open(array('route' => array('contracts.destroy', $contract->id), 'method' => 'delete')) }}
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

	<h4>Contract Object</h4>
	<div>
		<p>{{ var_dump($contract) }}</p>
	</div>

@stop
