<?php

# Function for making GET request using cURL
function curlGet($url) {
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
	curl_setopt($ch, CURLOPT_URL, $url);

	$results = curl_exec($ch);
}

function returnXPathObject($item) {

}
