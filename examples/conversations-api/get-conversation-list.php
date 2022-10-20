<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\ConversationsApi(
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $smscx->getConverstionsList();
    print_r($result);
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling ConversationsApi->getConverstionsList: ', $e->getMessage(), PHP_EOL;
}