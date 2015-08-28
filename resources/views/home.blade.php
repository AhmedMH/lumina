@extends('app')

@section('content')


<div class="container">



	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Lumina Forecast</div>
				<div class="panel-body" >

				<div id="feedback" class="alert alert-info" style="display:none;">Fetching Data....</div>
				<div class="row">
				<div class='col-md-6'>
				<div class='circle-container col-md-6'>
					<p id="condition"></p>
					<p id="temp"></p>
					<a href='#' id="symbol" ><img  src=''></a>
				</div>
				</div>

	<div class='col-md-6'><div id="countryphoto"></div></div>
				</div>

				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	

</script>
@endsection
