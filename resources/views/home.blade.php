<!-- Extending from app.blade.php file -->
@extends('app')

<!-- This is the content to be included in the content section in app.blade.php file -->
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Lumina Forecast</div>
				<div class="panel-body" >

					<!-- Pre-loader provides feedback to the user -->
					<div id="feedback" class="alert alert-info">Fetching Data....</div>
					<div class="row">
						<div class='col-md-6'>

							<!-- Shows the arc curve -->
							<div class='circle-container wow bounceInUp'>
								
								<!-- States Day or Night time -->
								<strong id="dayornight" class='wow'></strong>

								<!-- Shows the weather condition -->
								<p id="condition" class='wow'></p>

								<!-- Shows the temperature -->
								<p id="temp" class='wow'></p>

								<!-- Shows the weather condition symbol -->
								<a href='#' id="symbol" class='wow' ><img class="wow"></a>
							</div>
						</div>
						<div class='col-md-6'>

							<!-- States the country name -->
							<h4 id="countryname" class="wow"></h4>
							
							<!-- Shows the country photo -->
							<div id="countryphoto"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- End of content section -->
@endsection
