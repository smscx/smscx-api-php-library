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

$optout_id = 458;

try {
    $result = $smscx->deleteContactFromOptoutsList($optout_id);
    print_r($result);
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Optout ID not found    
} catch (Smscx\Client\Exception\AccessDeniedException $e) {
    //Code for access denied - optout added via form    
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling OptoutsApi->deleteContactFromOptoutsList: ', $e->getMessage(), PHP_EOL;
}