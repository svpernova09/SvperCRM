@extends(Config::get('Sentinel::config.layout'))

{{-- Web site Title --}}
@section('title')
@parent
People
@stop

{{-- Content --}}
@section('content')
<h4>People Home</h4>
<div class="row">
  <div class="col-md-10 col-md-offset-1">
	<div class="table-responsive">
        <ul>
            <li><a href="{{ URL::action('PeopleController@create') }}">Create Person</a></li>
        </ul>
		<table class="table table-striped table-hover">
			<thead>
				<th>Name</th>
				<th>City</th>
				<th>Office Phone</th>
			</thead>
			<tbody>
                @foreach ($people as $person)
                    <tr>
                        <td>
                            <a href="{{ action('PeopleController@show', array($person->id)) }}">{{ $person->name }}</a>
                        </td>
                        <td>
                            {{ $person->city }}
                        </td>
                        <td>
                            {{ $person->office_phone }}
                        </td>
                    </tr>
                @endforeach
			</tbody>
		</table>
	</div>
  </div>
</div>
@stop
