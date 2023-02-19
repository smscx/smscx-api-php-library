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

try {
    $result = $smscx->getOriginatorsList();
    print_r($result);
    foreach ($result->getData() as $k => $v) {
        // $v->getId();
        // $v->getOriginator();
        // $v->getTwoWay();
        // $v->getIsDefault();
        // $v->getApproved();
        // $v->getCreatedAd();
    }
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling OriginatorsApi->getOriginatorsList: ', $e->getMessage(), PHP_EOL;
}