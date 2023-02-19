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
$phone_number_id = '68aa4d9f-ee25-4a32-95d0-7272efe3b238';

try {
    $result = $smscx->deleteContactFromGroup($group_id, $phone_number_id);
    print_r($result);
    // $result->getInfo()->getId();
    // $result->getInfo()->getPhoneNumber();
    // $result->getInfo()->getCountryIso();
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Group ID or PhoneNumber ID not found    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling GroupsApi->deleteContactFromGroup: ', $e->getMessage(), PHP_EOL;
}