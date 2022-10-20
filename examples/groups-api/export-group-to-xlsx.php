<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\GroupsApi(
    new GuzzleHttp\Client(),
    $config
);
$group_id = 2245;

try {
    $result = $smscx->exportGroupToXLSX($group_id);
    print_r($result);
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Group ID not found    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling GroupsApi->exportGroupToXLSX: ', $e->getMessage(), PHP_EOL;
}