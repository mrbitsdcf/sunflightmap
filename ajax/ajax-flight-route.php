<?php

include("../lib/config.php");
include "../lib/global.php");

// Ajax Flight Route
// Parameters: Carrier Code, Service Number, Request Date

// steps:
// references: http://ondemandtestharness.oag.com/CBWSTestHarnessPublic/#flightLookupRequest

// Step 1
// fetch XML results via OAG test harness which gives us a REST 
// url: http://ondemandtestharness.oag.com/CBWSTestHarnessPublic//FlightLookupRequestAction.do?
// post vars: 
// actionForm:FlightLookupRequestForm
// inputPrefix:f_
// f_username:THACK
// f_password:THACK
// f_carrierCode:JQ
// f_serviceNumber:7
// f_requestDate:2011-10-16
// f_requestTime:12:00:00

// Step 2
// pull out the fromairpot, toairport, flight depart time, elapsed time, 

// this should return a jsonp object with flight route info from OAG..

// Get callback url
// also do this for carrier code, service number, request date



// Get URL parameters
//////////////////////
$callback='flightmap';
if (array_key_exists("callback", $_GET)) {
	$callback=$_GET['callback'];
}

$carrier_code='JQ';
if (array_key_exists("carrier_code", $_GET)) {
	$carrier_code=$_GET['callback'];
}

$service_number='7';
if (array_key_exists("service_number", $_GET)) {
	$service_number=$_GET['callback'];
}

$request_date='2011-10-16';
if (array_key_exists("request_date", $_GET)) {
	$request_date=$_GET['callback'];
}


// Do OAG Lookup
////////////////







// data for callback
$from_airport = "MEL";
$from_city = "Melbourne";
$from_lat = -37.673333;
$from_lon = 144.843333;
$to_airport = "SIN";
$to_city = "Singapore";
$to_lat = 1.350189;
$to_lon = 103.994433;
$depart_time = "2011-10-16T12:00:00";
$elapsed_time = 470;

// make jsonp
$jsonp = $callback . "({";
$jsonp .= '"from_airport": "' . $from_airport . '",';
$jsonp .= '"from_city": "' . $from_city . '",';
$jsonp .= '"from_lat": ' . $from_lat . ',';
$jsonp .= '"from_lon": ' . $from_lon . ',';
$jsonp .= '"to_airport": "' . $to_airport . '",';
$jsonp .= '"to_city": "' . $to_city . '",';
$jsonp .= '"to_lat": ' . $to_lat . ',';
$jsonp .= '"to_lon": ' . $to_lon . ',';
$jsonp .= '"depart_time": "' . $depart_time . '",';
$jsonp .= '"elapsed_time": ' . $elapsed_time . '';
$jsonp .= "});";

// example:
//flightmap({"from_airport": "MEL","from_city": "Melbourne","from_lat": -37.673333,"from_lon": 144.843333,"to_airport": "SIN","to_city": "Singapore","to_lat": 1.350189,"to_lon": 103.994433,"depart_time": "2011-10-16T12:00:00","elapsed_time": 470});
print($jsonp);

?>