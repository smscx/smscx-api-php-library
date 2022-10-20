<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\ApplicationsApi(
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $smscx->getScopes();
    print_r($result); // eg. ['sms', 'groups', 'templates', 'viber', 'whatsapp']
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling ApplicationsApi->getScopes: ', $e->getMessage(), PHP_EOL;
}