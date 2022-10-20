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

$application_id = '7873310555ea4ee972518ae9559f276707c77fab';

try {
    $result = $smscx->getApplicationSettings($application_id);
    print_r($result);
    // $result->getName();
    // $result->getScopes();
    // $result->getTokenExpiration();
    // $result->getSettings();
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Application ID not found
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling ApplicationsApi->getApplicationSettings: ', $e->getMessage(), PHP_EOL;
}