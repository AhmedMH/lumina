<?php
namespace App\Http\Controllers;

use App\Http\Controllers\WeatherController;

/**
 * This is the weather class
 */

class LocationController 
{


    /**
     * Get the location of the client using Google API by searching for the country name and get the first image
     */

	public function getPhoto()
	{
		$location= (new WeatherController)->getLocation();
		$jsrc = "https://ajax.googleapis.com/ajax/services/search/images?v=1.0&q=".$location->country_name;
		$json = file_get_contents($jsrc);
		$jset = json_decode($json, true);
		return $jset["responseData"]["results"][0]["url"];
	}




}