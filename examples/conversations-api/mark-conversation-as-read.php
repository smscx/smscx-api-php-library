<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\ConversationsApi(
    new GuzzleHttp\Client(),
    $config
);

$conversation_id = 'c38fa60d-ce8f-4918-8b9d-d991bc44cb73';

try {
    $result = $smscx->markConversationAsRead($conversation_id);
    print_r($result);
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Conversation ID not found    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling ConversationsApi->markConversationAsRead: ', $e->getMessage(), PHP_EOL;
}