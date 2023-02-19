<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\MultichannelApi(
    new GuzzleHttp\Client(),
    $config
);

$msg_id = '396d2afa-1440-4f36-a365-b99a5ceaea23';

try {
    $result = $smscx->deleteScheduledMultichannelMessage($msg_id);
    print_r($result);
    // $result->getInfo()->getMsgId();
    // $result->getInfo()->getParts();
    // $result->getInfo()->getCreditReturned();
    // $result->getInfo()->getChannel();
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\ChannelNotActiveException $e) {
    //Code for Channel not active
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Message ID not found    
} catch (Smscx\Client\Exception\AccessDeniedException $e) {
    //Cannot delete a message that was already sent
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling MultichannelApi->deleteScheduledMultichannelMessage: ', $e->getMessage(), PHP_EOL;
}