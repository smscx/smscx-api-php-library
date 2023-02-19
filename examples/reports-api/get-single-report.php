<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\ReportsApi(
    new GuzzleHttp\Client(),
    $config
);

$msg_id = '9eeed792-9c8c-463c-a8e2-43ebf4494c02'; // string | Identifier of a sent message

try {
    $result = $smscx->getSingleReport($msg_id);
    print_r($result);
    // $result->getData()->getMsgId();
    // $result->getData()->getStatus();
    // $result->getData()->getStatusCode();
    // $result->getData()->getErrorCode();
    // $result->getData()->getInQuietHours();
    // $result->getData()->getCreatedAt();
    // $result->getData()->getUpdatedAt();
    // $result->getData()->getScheduledAt();
    // $result->getData()->getCost();
    // $result->getData()->getTo();
    // $result->getData()->getCountryIso();
    // $result->getData()->getFrom();
    // $result->getData()->getSource();
    // $result->getData()->getChannel();
    // $result->getData()->getText();
    // $result->getData()->getTextAnalysis();
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Message ID not found    
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling ReportsApi->getSingleReport: ', $e->getMessage(), PHP_EOL;
}