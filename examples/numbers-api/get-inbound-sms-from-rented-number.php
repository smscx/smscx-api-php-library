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

$rent_id = '471ddea7-930c-49e8-8e99-2683834dd92e';

try {
    $result = $smscx->getInboundSms($rent_id);
    print_r($result);
    // $result->getInfo()->getPhoneNumber();
    // $result->getInfo()->getCountryIso();
    foreach ($result->getData() as $k => $v) {
        // $v->getMsgId();
        // $v->getFrom();
        // $v->getCountryIso();
        // $v->getTo();
        // $v->getText();
        // $v->getCost();
        // $v->getReceivedAt();
    }
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Rent ID not found   
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling NumbersApi->getInboundSms: ', $e->getMessage(), PHP_EOL;
}