<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\OptoutsApi(
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $smscx->exportOptoutsToXLSX();
    print_r($result);
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling OptoutsApi->exportOptoutsToXLSX: ', $e->getMessage(), PHP_EOL;
}