<?php
namespace App\Http\Controllers;


/**
 * This is the weather class
 */

class WeatherController 
{

	

	 /**
     * Get weather conditions using openweathermap API
     */

	public function getWeather()
	{		
		$location= LocationController::getLocation();

		/*Get content from openweathermap API*/
		$weather= file_get_contents('http://api.openweathermap.org/data/2.5/weather?lat='.$location->latitude.'&lon='.$location->longitude.'&units=metric');

		return $weather;
	}



}