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
    $result = $smscx->getTemplate($template_id);
    print_r($result);
    foreach ($result->getData() as $k => $v) {
        // $v->getId();
        // $v->getName();
        // $v->getText();
        // $v->getChannel();
        // $v->getType();
        // $v->getRichMedia();
        // $v->getCreatedAt();
        // $v->getApproved();
        // $v->getLocked();
    }    
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Template ID not found    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling TemplatesApi->getTemplate: ', $e->getMessage(), PHP_EOL;
}