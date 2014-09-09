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
        Please register an account and log in. <br />
        Found a bug? <a href="https://github.com/svpernova09/SvperCRM/issues" target="_blank">Create a report</a>
	</div>
  </div>
</div>
@stop
