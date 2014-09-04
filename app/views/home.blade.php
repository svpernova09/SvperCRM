@extends(Config::get('Sentinel::config.layout'))

{{-- Web site Title --}}
@section('title')
@parent
Home
@stop

{{-- Content --}}
@section('content')
<h4>Home</h4>
<div class="row">
  <div class="col-md-10 col-md-offset-1">
	<div class="table-responsive">

	</div>
  </div>
</div>
@stop
