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

$rent_number_request = [
    'numberId' => '38d70eda-641c-4c1a-aae8-723ed8aef062',
    'rentPeriod' => 30,
    'autoRenew' => true,
    'callbackUrl' => 'https://webhook-url/receive-inbound-sms',
    //OPTIONAL, if numbers requires registration, the ID of the registration details
    //'registrationId' => 'f3e77046-8051-4d8c-ac79-0ef6472995e5',
];

try {
    $result = $smscx->rentNumber($rent_number_request);
    print_r($result);
    // $result->getInfo()->getRentId();
    // $result->getInfo()->getNumberId();
    // $result->getInfo()->getPhoneNumber();
    // $result->getInfo()->getCountryIso();
    // $result->getInfo()->getRentStart();
    // $result->getInfo()->getRentEnd();
    // $result->getInfo()->getRentCost();
    // $result->getInfo()->getSetupCost();
    // $result->getInfo()->getAutoRenew();
    // $result->getInfo()->getApproved();
    // $result->getInfo()->getCallbackUrl();
    // $result->getInfo()->getDatetime();
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Number ID not found   
} catch (Smscx\Client\Exception\AccessDeniedException $e) {
    //Number was already rented by someone else
} catch (Smscx\Client\Exception\InsufficientBalanceException $e) {
    //Code for Insufficient balance		
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling NumbersApi->rentNumber: ', $e->getMessage(), PHP_EOL;
}