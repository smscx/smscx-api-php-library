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

$shortlink_update_request = [
    'name' => 'My new name',
    'url' => 'https://my-new-long-url-that-will-replace-existing-long-url/',
];

try {
    $result = $smscx->updateShortlink($short_id, $shortlink_update_request);
    print_r($result);
    // $result->getInfo()->getId();
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Shortlink ID not found    
} catch (Smscx\Client\Exception\DuplicateValueException $e) {
    //Code for duplicate value    
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling ShortlinksApi->updateShortlink: ', $e->getMessage(), PHP_EOL;
}