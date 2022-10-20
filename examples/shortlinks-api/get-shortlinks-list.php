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

try {
    $result = $smscx->getShortlinksList();
    print_r($result);
    foreach ( $result->getData() as $k => $v ) {
        // $v->getId();
        // $v->getName();
        // $v->getShortUrl();
        // $v->getOriginalUrl();
        // $v->getHits();
        // $v->getDateCreated();
    }
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling ShortlinksApi->getShortlinksList: ', $e->getMessage(), PHP_EOL;
}