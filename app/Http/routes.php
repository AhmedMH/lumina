<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

$app->get('/', 'HomeController@index');
$app->get('weather', 'WeatherController@getWeather');
$app->get('photo', 'LocationController@getPhoto');
