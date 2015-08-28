/*This has the script for the main page*/

/*Decide Day or Night Theme*/
function applyTheme(sunrise,sunset)
{
	if( !(Date.now()/1000<sunset && Date.now()/1000>sunrise))
	$("#theme").attr("href","/css/bootstrap-night.min.css"); 
}

/*Calculate the weather condition Symbol position*/
function applyPosition(sunrise,sunset)
{
	if( Date.now()/1000<sunset && Date.now()/1000>sunrise)
	{
		/*Detect sun position at day time using sunrise ans sunset times*/
		var position= (Date.now()/1000-sunset) / (sunset-sunrise)*180+180;
	}
	else
	{
		/*At night as its hard to detect moon position based on sunrise and sunset times*/
		var position= 270;
	}
	$("#symbol").css('transform' , 'rotate('+position+'deg) translate(12em) rotate(-'+position+'deg)');
}

$(document).ready(function () {

	console.log(Date.now());
/*This ajax requests the weather API */
	$.ajax
		({
		    type:'get',
		    url:"weather",
		    onloading:$("#feedback").slideDown(1000),
		    async:true,
		    success:function(weather)
		    {
		    	var weather= $.parseJSON(weather);
		    	$("#condition").html(weather.weather[0].main);
		    	$("#temp").html(weather.main.temp);
		    	$("#symbol img").attr('src' , 'http://openweathermap.org/img/w/'+weather.weather[0].icon+'.png').fadeIn(500);
		    	applyTheme(weather.sys.sunrise,weather.sys.sunset);
		    	applyPosition(weather.sys.sunrise,weather.sys.sunset);

		    },
		    error:function()
		    {
		       	alert('error fetching data');

		    },
		    complete:function()
		    {
		    	$("#feedback").slideUp(1000);

		    }

		});
	});