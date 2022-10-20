<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\OptoutsApi(
    new GuzzleHttp\Client(),
    $config
);

$limit = 100;
$next = null;
$previous = null;

try {
    $result = $smscx->getOptoutsList($limit, $next, $previous);
    print_r($result);
    // $result->getInfo()->getId();
    // $result->getInfo()->getLink();
    // $result->getInfo()->getTotal();
    foreach ( $result->getData() as $k => $v ) {
        // $v->getId();
        // $v->getPhoneNumber();
        // $v->getCountryIso();
        // $v->getOptoutFrom();
        // $v->getCampaignId();
        // $v->getGroupId();
        // $v->getGroupName();
        // $v->getCampaignName();
        // $v->getDatetime();
    }    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling OptoutsApi->getOptoutsList: ', $e->getMessage(), PHP_EOL;
}