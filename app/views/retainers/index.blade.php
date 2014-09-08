@extends(Config::get('Sentinel::config.layout'))

{{-- Web site Title --}}
@section('title')
@parent
Retainers
@stop

{{-- Content --}}
@section('content')
<h4>Retainers Home</h4>
<div class="row">
  <div class="col-md-10 col-md-offset-1">
    <button class="btn btn-primary" onClick="location.href='{{ URL::action('RetainersController@create') }}'">New Retainer</button>
	<div class="table-responsive">
		<table class="table table-striped table-hover">
			<thead>
				<th>Title</th>
				<th>Domain</th>
				<th></th>
			</thead>
			<tbody>
                @foreach ($retainers as $retainer)
                    <tr>
                        <td>
                            <a href="{{ action('RetainersController@show', array($retainer->id)) }}">{{ $retainer->title }}</a>
                        </td>
                        <td>
                            {{ $retainer->domain }}
                        </td>
                        <td>

                        </td>
                    </tr>
                @endforeach
			</tbody>
		</table>
	</div>
  </div>
</div>
@stop
