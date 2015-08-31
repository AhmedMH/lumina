<?php
namespace App\Http\Controllers;

/**
 * This is the Photo class
 */

class CountryController 
{

    /**
     * Get the location of the client using Google API by searching for the country name and get the first image
     */

	public function getCountryInfo()
	{
		$location= LocationController::getLocation();

		/*fetch image url from google API ... code can be found at 
		http://stackoverflow.com/a/5694812/2786529
		*/
		$jsrc = "https://ajax.googleapis.com/ajax/services/search/images?v=1.0&q=".$location->country_name."%20landmark";
		$json = file_get_contents($jsrc);
		$jset = json_decode($json, true);

		/*encode to json format*/
		$country=json_encode(['country_name'=>$location->country_name,'photourl'=>$jset["responseData"]["results"][0]["url"]]);
		
		return $country;
	}

}