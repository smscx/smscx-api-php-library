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

$originator = 'MyCompany';

try {
    $result = $smscx->createOriginator($originator);
    print_r($result);
    // $result->getInfo->getId();
} catch (Smscx\Client\Exception\DuplicateValueException $e) {
    //Code for duplicate value    
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling OriginatorsApi->createOriginator: ', $e->getMessage(), PHP_EOL;
}