<?php

/*
  | NINJAVAN API
  | Request new Token using NinjaVanAccessTokenRequest.php included
  | This file make request to /2.0/track endpoint 
  | and return the status for the tracking id either it is pending or in transit or completed delivered
  | accept parameter in array of tracking ids
  | ==========================================================================================
  | Reference link    : https://confluence.ninjavan.co/pages/viewpage.action?pageId=819251
  | ==========================================================================================
*/


$bearerToken = "";
$requestError = "";

include "NinjaVanAccessTokenRequest.php"; // to make sure token is always refreshed on each request

/*
	| use endpoint_url_sandbox if you use your sandbox client_id and client_secret
	| and endpoint_url if you use production client_id and client_secret
*/

$endpoint_url_production = "https://api.ninjavan.co/".$country_code."/2.0/track";
$endpoint_url_sandbox = "https://api-sandbox.ninjavan.co/".$country_code."/2.0/track";

$array_data = $_GET['tracking_id']; // via HTTP GET request

// sample_array_format = array('TR2645MY','TR7683NY','TR9862EY')

//-------------------------------------------------------------------------------------------------------------

$data['trackingIds'] = $array_data;

$fields = json_encode($data);

if($requestError != ""){

	echo "Error in request : ".$requestError;

}else{

	$curl = curl_init();

	curl_setopt_array($curl, array(
	    CURLOPT_URL => $endpoint_url_production,
	    CURLOPT_RETURNTRANSFER => true,
	    CURLOPT_ENCODING => "",
	    CURLOPT_MAXREDIRS => 10,
	    CURLOPT_TIMEOUT => 30,
	    CURLOPT_CUSTOMREQUEST => "POST",
	    CURLOPT_POSTFIELDS => $fields,
	    CURLOPT_SSL_VERIFYPEER => 0,
	    CURLOPT_HTTPHEADER => array(
	      "Authorization: Bearer ".$bearerToken,
	      "Content-Type: application/json"
	    )
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	echo $response;

}

?>