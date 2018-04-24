<?php

/*
  | NINJAVAN API
  | Please run NinjaVanOrderTracking.php instead of this file
  | ===========================================================================================================
  | Each Access Token lifetime is 5 minutes
  | Store it in persistent storage (database) or cache and also store the expiration timestamp.
  | 5 minutes before the token expires, 
  | or if the API request to Ninja Van API is responded with a HTTP 401 error, generate a new OAuth access token.
*/

//---------------------------------------------------------------------

/*
  | Login To https://www.ninjavan.co 
  | and go to Ninja Van API to get your CLIENT ID and CLIENT SECRET
*/

$client_id = "YOUR_CLIENT_ID";
$client_secret = "YOUR_CLIENT_SECRET";

$token_url = "https://api.ninjavan.co/my/2.0/oauth/access_token";

//---------------------------------------------------------------------

$data = array("client_id" => $client_id, "client_secret" => $client_secret, "grant_type" => "client_credentials");

$data_string = json_encode($data); 

$curl = curl_init($token_url);

curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_CAINFO, dirname(__FILE__)."/cacert.pem");

$response = curl_exec($curl);
$error = curl_error($curl);

curl_close($curl);

if($error){

  $requestError = $error;
  echo "Curl Error Occured:". $error;

}else{

  $response = json_decode($response);
  $bearerToken = $response->access_token;

}

?>