<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\NumbersApi(
    new GuzzleHttp\Client(),
    $config
);
$country_iso = FR; // string

try {
    $result = $smscx->getAvailableNumbers($country_iso);
    print_r($result);
    foreach ($result->getData() as $k => $v) {
        // $v->getNumberId();
        // $v->getPhoneNumber();
        // $v->getCountryIso();
        // $v->getNetworkOperator();
        // $v->getSms();
        // $v->getVoice();
        // $v->getMinRent();
        // $v->getMaxRent();
        // $v->getSetupCost();
        // $v->getRentalCost();
        // $v->getInboundSmsCost();
    }
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling NumbersApi->getAvailableNumbers: ', $e->getMessage(), PHP_EOL;
}