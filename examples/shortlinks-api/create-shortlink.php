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

$shortlink_new_request = [
    'name' => 'My Shortlink',
    'url' => 'https://my-long-url.com/this-is-the-page.html',
];

try {
    $result = $smscx->createShortlink($shortlink_new_request);
    print_r($result);
    // $result->getInfo()->getId();
    // $result->getInfo()->getName();
    // $result->getInfo()->getOriginalUrl();
    // $result->getInfo()->getShortUrl();
 catch (Smscx\Client\Exception\DuplicateIdException $e) {
    //Code for duplicate id    
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling ShortlinksApi->createShortlink: ', $e->getMessage(), PHP_EOL;
}