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

	$xmlPageDom = new DomDocument();

	@$xmlPageDom->loadHTML($item);

	$xmlPagePath = new DOMXPath($xmlPageDom);

	return $xmlPageXPath;
}

function scrapeBetween($item, $start, $end) {

	if (($startPos = stripos($item, $end)) === false) {
		return false;
	} else if (($endPos = stripos($item, $end)) == false) {
		return false;
	} else {
		$substrStart = $startPos + strlen($start);

		return substr($item, $substrStart, $endPos - $substrStart);
	}

}

$resultsPages = array();
$pages = array();

$initialResultsPageUrl = 'http://www.packtpub.com/books?keys=php';

$resultsPages[] = $initialResultsPageUrl;

$initialResultsPageSrc = curlGet($initialResultsPageUrl);

$resultsPageXPath = returnXPathObject($initialResultsPageSrc);
$resultsPageUrls = $resultsPageXPath->query('//ul[@class="pager"]/li/a/@href');

if ($resultsPageUrls->length > 0) {
	for ($i = 0; $i < $resultsPageUrls->length; $i++) {
		$resultsPages[] = 'http://www.packtpub.com' . $resultsPageUrls->item($i)->nodeValue;
	}
}

