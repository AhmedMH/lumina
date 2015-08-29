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
				<div class='circle-container wow bounceInUp'>
					<strong id="dayornight" class='wow'></strong>
					<p id="condition" class='wow'></p>
					<p id="temp" class='wow'></p>
					<a href='#' id="symbol" class='wow' ><img class="wow"></a>
				</div>
				</div>
				<div class='col-md-6'>
				<h4 id="countryname" class="wow"></h4>
				<div id="countryphoto"></div>
				</div>
				</div>

				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	

</script>
@endsection
