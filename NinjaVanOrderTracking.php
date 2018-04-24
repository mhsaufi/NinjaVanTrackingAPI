<?php

/*
  | NINJAVAN API
  | Request new Token using NinjaVanAccessTokenRequest.php included
  | ================================================================================
  | Reference link    : https://ninjaorderapibeta.docs.apiary.io/#reference/0//{countrycode}/3.0/orders/get?console=1
  | Reference link 2  : https://confluence.ninjavan.co/display/NV/Order+Tracking+API
  | ================================================================================
*/

$bearerToken = "";
$requestError = "";

$trackingID = $_GET['tracking_id']; // order tracking ID (via HTTP GET request)

include "NinjaVanAccessTokenRequest.php"; // to make sure token is always refreshed on each request

/*
  | use endpoint_url_sandbox if you use your sandbox client_id and client_secret
  | and endpoint_url if you use production client_id and client_secret
*/

$endpoint_url_sandbox = "https://api-sandbox.ninjavan.co/".$country_code."/3.0/orders"; 
$endpoint_url_production = "https://api.ninjavan.co/".$country_code."/3.0/orders";

//--------------------------------------------------------------------------------------------------

if($requestError != ""){

    echo "Error in request : ".$requestError;

}else{

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => $endpoint_url_production."?tracking_id=".$trackingID,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_SSL_VERIFYPEER => 0,
      CURLOPT_HTTPHEADER => array(
        "Authorization: Bearer ".$bearerToken
      )
  ));

  $response = curl_exec($curl); // result from the request
  $err = curl_error($curl);

  curl_close($curl);

  //--------------------------------------------------------------------------------------------------

  if($err){

    echo "<pre>";
    echo "CURL ERROR:" . $err;
    echo "</pre>";

  }else{

    echo "<pre>";
    echo $response;
    echo "</pre>";

  }

}

?>