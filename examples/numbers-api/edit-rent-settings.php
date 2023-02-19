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

$rent_id = '471ddea7-930c-49e8-8e99-2683834dd92e'; // string | Identifier of the rental operation

$edit_rent_request = [
    'autoRenew' => false,
    'callbackUrl' => 'https://edited-webhook-url/receive-inbound-sms',
    //If you want to remove the webhook
    //'callbackUrl' => null
];


try {
    $result = $smscx->editRentSettings($rent_id, $edit_rent_request);
    print_r($result);
    // $result->getInfo()->getRentId();
    // $result->getInfo()->getDatetime();    
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Lookup campaign ID not found    
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request        
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling NumbersApi->editRentSettings: ', $e->getMessage(), PHP_EOL;
}