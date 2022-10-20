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
$conversation_reply_whatsapp_request = [
    'text' => 'Please give us more details',
    'richMedia' => [],
];

try {
    $result = $smscx->sendConversationReplyWhatsapp($conversation_id, $conversation_reply_whatsapp_request);
    print_r($result);
} catch (Smscx\Client\Exception\ChannelNotActiveException $e) {
    //Code for Channel not active
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Conversation ID not found    
} catch (Smscx\Client\Exception\AccessDeniedException $e) {
    //Code for access denied: cannot reply to Whatsapp after more than 24 hours after client reply    
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling ConversationsApi->sendConversationReplySms: ', $e->getMessage(), PHP_EOL;
}