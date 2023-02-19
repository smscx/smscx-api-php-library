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
$group_id = 2245;
$short_response = false; // If set to true, it will return the full `info` object and an empty `data` object
$limit = 100;
$next = null;
$previous = null; 

try {
    $result = $smscx->getGroupDetails($group_id, $short_response, $limit, $next, $previous);
    print_r($result);
    // $result->getInfo()->getId();
    // $result->getInfo()->getName();
    // $result->getInfo()->getTotalPhoneNumbers();
    // $result->getInfo()->getTotalCost();
    // $result->getInfo()->getTotalOptouts();
    // $result->getInfo()->getCreatedAt();
    foreach ( $result->getData() as $k => $v ) {
        // $v->getId();
        // $v->getPhoneNumber();
        // $v->getCountryIso();
        // $v->getFirstName();
        // $v->getLastName();
        // $v->getEmail();
        // $v->getField1();
        // $v->getField2();
        // $v->getField3();
        // $v->getField4();
        // $v->getField5();
        // $v->getGroupId();
        // $v->getOptout(); # true or false
        // $v->getCustomFields();
        // $v->getDateAdded();
    }
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Group ID not found    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling GroupsApi->getGroupDetails: ', $e->getMessage(), PHP_EOL;
}