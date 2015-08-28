<?php
namespace App;


/**
 * This is the weather class
 */

class Weather
{


    /**
     * Get the location of the client using freegeoip API
     */

	protected function getLocation()
	{
		/*Get content from freegeoip API*/
		$location= file_get_contents('http://freegeoip.net/json');

		/*Decode to Json Object*/
		$location= json_decode($location);

		return $location;
	}


	 /**
     * Get weather conditions using openweathermap API
     */

	public function getWeather()
	{		
		$location= $this->getLocation();

		/*Get content from openweathermap API*/
		$weather= file_get_contents('http://api.openweathermap.org/data/2.5/weather?lat='.$location->latitude.'&lon='.$location->longitude.'&units=metric');

		/*Decode to Json Object*/
		$weather= json_decode($weather);

		return $weather;
	}



}