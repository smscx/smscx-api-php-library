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

$group_name = 'My new group';

try {
    $result = $smscx->createGroup($group_name);
    print_r($result);
    // $result->getInfo()->getId();
    // $result->getInfo()->getName();
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\DuplicateValueException $e) {
    //Code for duplicate value    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling GroupsApi->createGroup: ', $e->getMessage(), PHP_EOL;
}