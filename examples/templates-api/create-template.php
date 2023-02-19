<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\TemplatesApi(
    new GuzzleHttp\Client(),
    $config
);

$templates_new_request = [
    'name' => 'Summer Sale 2022',
    'text' => 'Redeem this voucher in the next 30 days to get a 30% discount off all Summer Fashion {{shortlink:xSgW}}',
];

try {
    $result = $smscx->createTemplate($templates_new_request);
    print_r($result);
    // $result->getInfo()->getId();
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\DuplicateValueException $e) {
    //Code for duplicate value    
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling TemplatesApi->createTemplate: ', $e->getMessage(), PHP_EOL;
}