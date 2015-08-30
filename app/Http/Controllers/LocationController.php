<?php
namespace App\Http\Controllers;

/**
 * This is the Location class
 */

class LocationController 
{

 	/**
     * Get the ip of the server
     */
	protected static function getIp()
	{
		/*Check if development under local enviroment or remote adddress*/
		$ip=($_SERVER['REMOTE_ADDR']=='127.0.0.1' || $_SERVER['REMOTE_ADDR'] == '::1')?'':$_SERVER['REMOTE_ADDR'];

		return $ip;

	}


    /**
     * Get the location of the client using freegeoip API
     */

	public static function getLocation()
	{
		

		/*Get content from freegeoip API*/
		$location= file_get_contents('https://freegeoip.net/json/'.self::getIp());

		/*Decode to Json Object*/
		$location= json_decode($location);

		return $location;
	}

}