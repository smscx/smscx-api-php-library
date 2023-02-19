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

$lookup_id = '68aa4d9f-ee25-4a32-95d0-7272efe3b238';

try {
    $result = $smscx->getSingleLookupStatus($lookup_id);
    print_r($result);
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Lookup ID not found    
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling NumbersApi->getSingleLookupStatus: ', $e->getMessage(), PHP_EOL;
}