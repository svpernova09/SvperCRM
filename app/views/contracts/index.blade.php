@extends(Config::get('Sentinel::config.layout'))

{{-- Web site Title --}}
@section('title')
@parent
Contracts
@stop

{{-- Content --}}
@section('content')
<h4>Contracts Home</h4>
<div class="row">
  <div class="col-md-10 col-md-offset-1">
    <button class="btn btn-primary" onClick="location.href='{{ URL::action('ContractsController@create') }}'">New Contract</button>
	<div class="table-responsive">
		<table class="table table-striped table-hover">
			<thead>
				<th>Title</th>
				<th>Domain</th>
				<th>Start Date</th>
				<th>End Date</th>
			</thead>
			<tbody>
                @foreach ($contracts as $contract)
                    <tr>
                        <td>
                            <a href="{{ action('ContractsController@show', array($contract->id)) }}">{{ $contract->title }}</a>
                        </td>
                        <td>
                            {{ $contract->domain }}
                        </td>
                        <td>
                            {{ $contract->start_date }}
                        </td>
                        <td>
                            {{ $contract->end_date }}
                        </td>
                    </tr>
                @endforeach
			</tbody>
		</table>
	</div>
  </div>
</div>
@stop
