<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\OptoutsApi(
    new GuzzleHttp\Client(),
    $config
);

$add_contacts_to_group_request = [
    'phoneNumbers' => ['+49151233545xx','+417816528xx','393123xx','+336122247xx','+3931235346xx'],
    //'countryIso' => 'FR',
    'allowInvalid' => true,
];

try {
    $result = $smscx->addContactToOptoutsList($add_contacts_to_group_request);
    print_r($result);
    // $result->getInfo()->getTotalValid();
    // $result->getInfo()->getTotalInvalid();
    // $result->getInfo()->getTotalDuplicates();
    // $result->getInfo()->getTotalPhoneNumbers();
    // $result->getInfo()->getPhoneNumbersByCountry();
    // $result->getInfo()->getInvalid();    
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\InvalidPhoneNumberException $e) {
    //Code for Invalid phone number    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling OptoutsApi->addContactToOptoutsList: ', $e->getMessage(), PHP_EOL;
}