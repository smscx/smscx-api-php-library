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
//$limit = '100'; // int | A limit on the number of objects to be returned
//$next = null; // string | The next token used to retrieve additional data
//$previous = null; // string | The previous token used to retrieve additional data

try {
    $result = $smscx->getInboundSms($rent_id);
    print_r($result);
    // $result->getInfo()->getRentId();
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
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Rent ID not found   
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling NumbersApi->getInboundSms: ', $e->getMessage(), PHP_EOL;
}