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

try {
    $result = $smscx->getRentedNumbers();
    print_r($result);
    foreach ($result->getData() as $k => $v) {
        // $v->getRentId();
        // $v->getRentCost();
        // $v->getSetupCost();
        // $v->getRentPeriod();
        // $v->getRentStart();
        // $v->getRentEnd();
        // $v->getPhoneNumber();
        // $v->getCountryIso();
        // $v->getNetworkOperator();
        // $v->getAutoRenew();
        // $v->getSms();
        // $v->getVoice();
        // $v->getMinRent();
        // $v->getMaxRent();
        // $v->getRentalCost();
        // $v->getInboundSmsCost();
        // $v->getCallbackUrl();  
    }
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling NumbersApi->getRentedNumbers: ', $e->getMessage(), PHP_EOL;
}