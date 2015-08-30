/*This has the script for the main page*/

/*Initialize WOW animations*/
  new WOW().init();

  /*This variable decides the time date or night is global and is used by several functions assumes day by default*/
  dayornight=1;


/*Detect the time if day returns 1 , if night returns 0*/
function dayorNight (sunrise,sunset)
{
	/*Day time*/
	if((Date.now()/1000<sunset && Date.now()/1000>sunrise))
		dayornight=1;
	/*Night time*/
	else
		dayornight=0;
}


/*Decide Day or Night Theme*/
function applyTheme()
{
	/*Day Theme*/
	if(dayornight==1)
		$("head").append('<link id="theme" href="/css/bootstrap-day.min.css" rel="stylesheet">'); 
	/*Night Theme*/
	else
		$("head").append('<link id="theme" href="/css/bootstrap-night.min.css" rel="stylesheet">'); 

	/*remove the old style sheet as the id selector will get the first occurence only*/
	$("#theme").remove();
}


/*Calculate the weather condition Symbol position*/
function applyPosition(sunrise,sunset)
{
	if(dayornight==1)
	{
		/*Detect sun position at day time using sunrise ans sunset times*/
		var position= (Date.now()/1000-sunrise) / (sunset-sunrise)*180+180;
	}
	else
	{
		/*At night ... as it's hard to detect moon position based on sunrise and sunset times*/
		var position= 270;
	}

	/*Adjust symbol position using css transform property*/
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
		    	/*Parse the json weather object*/
		    	var weather= $.parseJSON(weather);

		    	/*Check if day or night*/
		    	dayorNight(weather.sys.sunrise,weather.sys.sunset);
		    	
		    	/*Fill out HTML elements with weather results*/
		    	$("#dayornight").html((dayornight==1)?'Day':'Night');
		    	$("#condition").html(weather.weather[0].description);
		    	$("#temp").html(weather.main.temp+' °C');
		    	$("#symbol img").attr('src' , 'http://openweathermap.org/img/w/'+weather.weather[0].icon+'.png');

		    	/*Making sure that the image has been loaded*/
		    	$("#symbol img").on('load',function(){
		    		/*Add animation to weather symbol*/
		    		$(this).addClass('bounceIn');
		    	});
		    	
		    	/*Add animation*/
		    	$("#dayornight,#condition,#temp").addClass('bounceInLeft');



		    	/*Apply theme of day or night*/
		    	applyTheme();

		    	/*apply position of the sun at the day time */
		    	applyPosition(weather.sys.sunrise,weather.sys.sunset);

		    }
		});

}


/*get country's info*/
function getCountry()
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
		    	/*Parse the json country object*/
		    	var country=$.parseJSON(country);

		    	/*Fill out HTML elements with country results*/
		    	$("#countryname").html(country.country_name);
		    	$("#countryphoto").css('background', 'url('+country.photourl+')');

		    	/*Add animation*/
		    	$("#countryname").addClass('bounceInRight');
		    },
		    complete:function()
		    {
		    	$("#feedback").slideUp(1000);

		    }

		});
}


/*This function is to execute once first*/
function setIntervalAndExecute(func, t) {
    
    /*Function to be executed at the beginning*/
    func();

    /*Call the function repeatedly*/
    return(setInterval(func, t));
}


/*main ready function*/
$(document).ready(function () {

	/*Update weather conditions and symbol position in real time without page refresh updates every 1 min*/
	setIntervalAndExecute(getWeather, 60000);

	/*Get country's info*/
	getCountry();
	
});