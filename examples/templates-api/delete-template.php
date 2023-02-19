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

$template_id = 39774;

try {
    $result = $smscx->deleteTemplate($template_id);
    print_r($result);
    // $result->getInfo()->getId();
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Template ID not found    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling TemplatesApi->deleteTemplate: ', $e->getMessage(), PHP_EOL;
}