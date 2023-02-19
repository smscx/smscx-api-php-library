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

$phone_number = '+33612246450';

try {
    $result = $smscx->lookupNumber($phone_number);
    print_r($result);
    // $result->getData()->getPhoneNumber();
    // $result->getData()->getLookupId();
    // $result->getData()->getCost();
    // $result->getData()->getMcc();
    // $result->getData()->getMccMnc();
    // $result->getData()->getCountryIso();
    // $result->getData()->getCountryName();
    // $result->getData()->getCountryNameLocale();
    // $result->getData()->getStatus();
    // $result->getData()->getStatusDescription();
    // $result->getData()->getStatus();
    // $result->getData()->getPorted();
    // $result->getData()->getRoaming();
    // $result->getData()->getOriginalNetwork();
    // $result->getData()->getPortedNetwork();
    // $result->getData()->getRoamingNetwork();
    // $result->getData()->getDatetime();
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\InvalidPhoneNumberException $e) {
    //Code for Invalid phone number
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request
} catch (Smscx\Client\Exception\NoCoverageException $e) {
    //Code for No coverage
} catch (Smscx\Client\Exception\InsufficientBalanceException $e) {
    //Code for Insufficient balance
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling NumbersApi->lookupNumber: ', $e->getMessage(), PHP_EOL;
}