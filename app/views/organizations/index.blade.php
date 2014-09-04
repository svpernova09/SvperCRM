@extends(Config::get('Sentinel::config.layout'))

{{-- Web site Title --}}
@section('title')
@parent
Organizations
@stop

{{-- Content --}}
@section('content')
<h4>Organizations Home</h4>
<div class="row">
  <div class="col-md-10 col-md-offset-1">
	<div class="table-responsive">
        <ul>
            <li><a href="{{ URL::action('OrganizationsController@create') }}">Create Organization</a></li>
        </ul>
		<table class="table table-striped table-hover">
			<thead>
				<th>Name</th>
				<th>City</th>
				<th>Phone</th>
			</thead>
			<tbody>
                @foreach ($orgs as $org)
                    <tr>
                        <td>
                            <a href="{{ action('OrganizationsController@show', array($org->id)) }}">{{ $org->name }}</a>
                        </td>
                        <td>
                            {{ $org->city }}
                        </td>
                        <td>
                            {{ $org->phone }}
                        </td>
                    </tr>
                @endforeach
			</tbody>
		</table>
	</div>
  </div>
</div>
@stop
