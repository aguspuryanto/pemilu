<?php

function endpointUrl(){
	return 'http://103.82.240.253/disurvey_multi/';
}

function endpointImage(){
	return endpointUrl() . '/image/';
}

function getCurl($data, $end='login_user.php'){
	$url = endpointUrl() . $end;
	// echo $url . "<br>";

	/* Set JSON data to POST */
	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($curl);
	curl_close($curl);
	
	$json = json_decode($result, true);
	return $json;
}
