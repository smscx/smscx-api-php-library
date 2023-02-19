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
$renew_rent_request = [
    'rentPeriod' => 30,
    'autoRenew' => false,
    'callbackUrl' => 'https://webhook-url/receive-inbound-sms',
];

try {
    $result = $smscx->renewRent($rent_id, $renew_rent_request);
    print_r($result);
    // $result->getInfo()->getRentId();
    // $result->getInfo()->getNumberId();
    // $result->getInfo()->getPhoneNumber();
    // $result->getInfo()->getCountryIso();
    // $result->getInfo()->getRentStart();
    // $result->getInfo()->getRentEnd();  
    // $result->getInfo()->getRentCost();
    // $result->getInfo()->getAutoRenew();
    // $result->getInfo()->getCallbackUrl();
    // $result->getInfo()->getDatetime();
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Rent ID not found   
} catch (Smscx\Client\Exception\AccessDeniedException $e) {
    //Number rent cannot be renewed (it won't be available for rent in the future)
} catch (Smscx\Client\Exception\InsufficientBalanceException $e) {
    //Code for Insufficient balance	
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling NumbersApi->renewRent: ', $e->getMessage(), PHP_EOL;
}