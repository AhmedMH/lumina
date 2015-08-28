<?php

$location = json_decode(file_get_contents('http://freegeoip.net/json'));
 print_r(file_get_contents('http://api.openweathermap.org/data/2.5/weather?lat='.$location->latitude.'&lon='.$location->longitude));

 ?>