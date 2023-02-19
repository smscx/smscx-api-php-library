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
$update_number_request = [
    'phoneNumber' => '+447400772233',
    //'firstName' => 'John',
    //'lastName' => 'Doe',
    //'email' => 'john@doe.com',
];

try {
    $result = $smscx->updateContactFromGroup($group_id, $phone_number_id, $update_number_request);
    print_r($result);
    // $result->getInfo()->getId();
    // $result->getInfo()->getGroupId();
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Group ID or Phone number ID not found    
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\DuplicateValueException $e) {
    //Code for duplicate value    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling GroupsApi->updateContactFromGroup: ', $e->getMessage(), PHP_EOL;
}