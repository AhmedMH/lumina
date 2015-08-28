@extends('app')

@section('content')

<style type="text/css">
	/**
 * Position icons into circle (SO)
 * http://stackoverflow.com/q/12813573/1397351 
 */
.circle-container {
	position: relative;
	width: 24em;
	height: 24em;
	padding: 2.8em; /*= 2em * 1.4 (2em = half the width of an img, 1.4 = sqrt(2))*/
	border-top: dashed 1px;
	border-radius: 50%;
	margin: 1.75em auto 0;
}
.circle-container a {
	display: block;
	overflow: hidden;
	position: absolute;
	top: 50%; left: 50%;
	width: 4em; height: 4em;
	margin: -2em; 
	/* 2em = 4em/2 */ /* half the width */
}
.circle-container img { display: block; width: 100%; }
.deg0 { transform:  rotate(270deg) translate(12em) rotate(-270deg); } /* 12em = half the width of the wrapper */
/*.deg45 { transform: rotate(45deg) translate(12em) rotate(-45deg); }
.deg135 { transform: rotate(135deg) translate(12em) rotate(-135deg); }*/
.deg180 { transform: translate(-12em); }
.deg225 { transform: rotate(230deg) translate(12em) rotate(-230deg); }
.deg315 { transform: rotate(315deg) translate(12em) rotate(-315deg); }


.circle-container a:hover:before { opacity: 1; }

</style>
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

	<div class='col-md-6'>herp	</div>
				</div>

				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	

</script>
@endsection
