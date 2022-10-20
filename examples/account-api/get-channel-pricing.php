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

try {
    $result = $smscx->getChannelPricing($channel, $traffic_type);
    print_r($result);
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request
} catch (Smscx\Client\Exception\NoCoverageException $e) {
    //Code for No coverage
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling AccountApi->getChannelPricing: ', $e->getMessage(), PHP_EOL;
}