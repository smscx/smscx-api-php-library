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

try {
    $result = $smscx->getAccountBalance();
    print_r($result);
    //$result->getBalance();
    //$result->getCurrency();
    //$result->getBilling();
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling AccountApi->getAccountBalance: ', $e->getMessage(), PHP_EOL;
}