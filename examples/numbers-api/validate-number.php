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

$phone_number = '+33612246426';

try {
    $result = $smscx->validateNumber($phone_number);
    print_r($result);
    // $result->getData()->getPhoneNumber();
    // $result->getData()->getCountryIso();
    // $result->getData()->getNetworkOperator();
    // $result->getData()->getTimezone();
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\InvalidPhoneNumberException $e) {
    //Code for Invalid phone number
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling NumbersApi->validateNumber: ', $e->getMessage(), PHP_EOL;
}