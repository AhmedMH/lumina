<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lumina Forecast</title>

	<link id="theme" href="/css/bootstrap-day.min.css" rel="stylesheet">
	<link href="/css/style.css" rel="stylesheet">
	<link href="/css/animate.css" rel="stylesheet">
	
</head>
<body>
<nav class="navbar navbar-default" style="border-radius:0px;">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{ url('/') }}">Lumina Forecast</a>
			</div>
		</div>
	</nav>
	<div class="container">	
	@yield('content')
	</div>


	 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="script/jquery-1.11.3.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="script/bootstrap.min.js"></script>
    <script src="script/wow.min.js"></script>
    <script src="script/script.js"></script>

</body>
</html>
