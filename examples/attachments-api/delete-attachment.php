<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\AttachmentsApi(
    new GuzzleHttp\Client(),
    $config
);

$attachment_id = 'KgTX';

try {
    $result = $smscx->deleteAttachment($attachment_id);
    print_r($result);
    // $result->getInfo()->getId();
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Attachment ID not found    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling AttachmentsApi->deleteAttachment: ', $e->getMessage(), PHP_EOL;
}