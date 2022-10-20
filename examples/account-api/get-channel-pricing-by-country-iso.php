<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\AccountApi(
    new GuzzleHttp\Client(),
    $config
);

$channel = 'sms'; 
$traffic_type = 'promotional';
$country_iso = 'FR';

try {
    $result = $smscx->getChannelPricingByCountryIso($channel, $traffic_type, $country_iso);
    print_r($result);
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling AccountApi->getChannelPricingByCountryIso: ', $e->getMessage(), PHP_EOL;
}