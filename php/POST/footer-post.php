<?php

$url = 'https://api.calltrackingmetrics.com/api/v1/formreactor/FRT472ABB2C5B9B141A9EC85C3E43485B09589C3CB52576BD29';
$un = 'a79840d5e803e3d968de6d480a7e86f14feba9d';
$pw = 'b36406afae9e6c5b6f16ceb8a1e361fe6afa';

//url-ify the data for the POST
$fields = array(
	'caller_name' => urlencode($_POST['caller_name']),
	'email' => urlencode($_POST['email']),
	'phone_number' => urlencode($_POST['phone_number']),
	'custom_message' => urlencode($_POST['message'])
);

//url-ify the data for the POST
foreach($fields as $key=>$value) { 
	$fields_string .= $key.'='.$value.'&';
}
rtrim($fields_string, '&');
//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch, CURLOPT_USERPWD, $un . ":" . $pw);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)");
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, count($fields));
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);

//execute post
$result = curl_exec($ch);

//close connection
curl_close($ch);
header("location: https://www.morningsiderecovery.com/thank-you/");
?>