<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\ShortlinksApi(
    new GuzzleHttp\Client(),
    $config
);

$short_id = 'KgTX';

try {
    $result = $smscx->exportShortlinkHitsToCSV($short_id);
    print_r($result);
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Shortlink ID not found    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling ShortlinksApi->exportShortlinkHitsToCSV: ', $e->getMessage(), PHP_EOL;
}