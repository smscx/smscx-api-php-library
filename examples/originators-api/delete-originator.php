<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\OriginatorsApi(
    new GuzzleHttp\Client(),
    $config
);

$originator_id = 1388;

try {
    $result = $smscx->deleteOriginator($originator_id);
    print_r($result);
    // $result->getInfo()->getId();
    // $result->getInfo()->getOriginator();    
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Originator ID not found    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling OriginatorsApi->deleteOriginator: ', $e->getMessage(), PHP_EOL;
}