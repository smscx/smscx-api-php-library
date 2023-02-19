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
$add_contacts_to_group_request = [
    'phoneNumbers' => ["+336129353","+33612970283","+3361211","+43664187834","+41781218472","+351912110421","+4915123473140","+4915123595","+4915123966046"],
    //'countryIso' => 'FR',
    'allowInvalid' => true,
];

try {
    $result = $smscx->addContactsToGroup($group_id, $add_contacts_to_group_request);
    print_r($result);
    // $result->getInfo()->getTotalCost();
    // $result->getInfo()->getTotalValid();
    // $result->getInfo()->getTotalInvalid();
    // $result->getInfo()->getTotalDuplicates();
    // $result->getInfo()->getPhoneNumbers();
    // $result->getInfo()->getInvalid();
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Group ID not found    
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\InvalidPhoneNumberException $e) {
    //Code for Invalid phone number    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling GroupsApi->addContactsToGroup: ', $e->getMessage(), PHP_EOL;
}