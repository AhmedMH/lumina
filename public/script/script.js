/*This has the script for the main page*/

/*Initialize WOW animations*/
  new WOW().init();

/*Detect the time if day returns 1 , if night returns 0*/
function dayorNight (sunrise,sunset)
{
	/*Day time*/
	if((Date.now()/1000<sunset && Date.now()/1000>sunrise))
		return 1;
	else
		return 0;
}

/*Decide Day or Night Theme*/
function applyTheme()
{
	/*Day Theme*/
	if(dayorNight==1)
		$("#theme").attr("href","/css/bootstrap-day.min.css"); 
	/*Night Theme*/
	else
		$("#theme").attr("href","/css/bootstrap-night.min.css"); 
}

/*Calculate the weather condition Symbol position*/
function applyPosition()
{
	if(dayorNight==1)
	{
		/*Detect sun position at day time using sunrise ans sunset times*/
		var position= (Date.now()/1000-sunrise) / (sunset-sunrise)*180+180;
	}
	else
	{
		/*At night as its hard to detect moon position based on sunrise and sunset times*/
		var position= 270;
	}

	/*Adjust symbol position*/
	$("#symbol").css('transform' , 'rotate('+position+'deg) translate(12em) rotate(-'+position+'deg)');
}



/*Get weather conditions*/
function getWeather()
{
	/*This ajax requests the weather API */
	$.ajax
		({
		    type:'get',
		    url:"weather",
		    async:true,
		    success:function(weather)
		    {
		    	var weather= $.parseJSON(weather);
		    	$("#dayornight").html((dayorNight==1)?'Day':'Night');
		    	$("#condition").html(weather.weather[0].description);
		    	$("#temp").html(weather.main.temp+' °C');
		    	$("#symbol img").attr('src' , 'http://openweathermap.org/img/w/'+weather.weather[0].icon+'.png').fadeIn(500);
		    	$("#symbol img").on('load',function(){
		    		$(this).addClass('bounceIn');
		    	});
		    	
		    	/*Add animation*/
		    	$("#dayornight,#condition,#temp").addClass('bounceInLeft');

		    	applyTheme(weather.sys.sunrise,weather.sys.sunset);
		    	applyPosition(weather.sys.sunrise,weather.sys.sunset);

		    },
		    error:function()
		    {
		       	alert('error fetching data');

		    }
		});

}

/*get country's photo*/
function getPhoto()
{
	/*This ajax gets the Country's photo */
	$.ajax
		({
		    type:'get',
		    url:"country",
		    onloading:$("#feedback").slideDown(1000),
		    async:true,
		    success:function(country)
		    {
		    	var country=$.parseJSON(country);
		    	$("#countryname").html(country.name);
		    	$("#countryphoto").css('background', 'url('+country.photourl+')');

		    	/*Add animation*/
		    	$("#countryname").addClass('bounceInRight');
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
}


/*This function is to execute once first*/
function setIntervalAndExecute(func, t) {
    func();
    return(setInterval(func, t));
}

/*main ready function*/
$(document).ready(function () {

	/*Update weather conditions and symbol position in real time without page refresh updates every 1 min*/
	setIntervalAndExecute(getWeather, 60000);

	getPhoto();





		
	});