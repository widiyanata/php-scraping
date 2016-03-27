<?php

function curlGet ($url) {
	$ch = curl_init(); // initiation curl session

	# Setting cURL options
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch, CURLOPT_URL, $url);

	$results = curl_exec($ch); // executing cURL session

	curl_close($ch);

	return $results;

}

$packtPage = curlGet('http://www.lazada.co.id/perangkat-permainan-pc/');

echo $packtPage;
