<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\ShortlinksApi(
    new GuzzleHttp\Client(),
    $config
);

$short_id = 'KgTX';
$short_response = false; // If set to true, it will return the full `info` object and an empty `data` object
$limit = '100';
$next = null;
$previous = null;

try {
    $result = $smscx->getShortlinkHits($short_id, $short_response, $limit, $next, $previous);
    print_r($result);
    // $result->getInfo()->getId();
    // $result->getInfo()->getName();
    // $result->getInfo()->getShortUrl();
    // $result->getInfo()->getOriginalUrl();
    // $result->getInfo()->getDateCreated();
    // $result->getInfo()->getHits();
    foreach ( $result->getData() as $k => $v ) {
        // $v->getHitId();
        // $v->getPhoneNumber();
        // $v->getPhoneNumberCountryIso();
        // $v->getCampaignId();
        // $v->getGroupId();
        // $v->getDevice();
        // $v->getBrowser();
        // $v->getBrowserVersion();
        // $v->getOs();
        // $v->getOsVersion();
        // $v->getBrand();
        // $v->getModel();
        // $v->getScreenResolution();
        // $v->getAcceptLanguage();
        // $v->getReferrer();
        // $v->getIpAddress();
        // $v->getCountryIso();
        // $v->getCity();
        // $v->getDatetime();
    }
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Shortlink ID not found    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling ShortlinksApi->getShortlinkHits: ', $e->getMessage(), PHP_EOL;
}