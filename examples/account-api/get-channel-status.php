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
    $result = $smscx->getChannelsStatus();
    print_r($result);
    // $result->getSms();
    // $result->getViber();
    // $result->getWhatsapp();
    // $result->getMultichannel();
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling AccountApi->getChannelsStatus: ', $e->getMessage(), PHP_EOL;
}