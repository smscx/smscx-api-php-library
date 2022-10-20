<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\ViberApi(
    new GuzzleHttp\Client(),
    $config
);

// Identifier of a scheduled Viber message
$msg_id = '3328fe13-2b99-4282-b62e-d891f5e452a8';

try {
    $result = $smscx->deleteScheduledViberMessage($msg_id);
    print_r($result);
    // $result->getInfo()->getMsgId();
    // $result->getInfo()->getParts();
    // $result->getInfo()->getCreditReturned();
    // $result->getInfo()->getChannel();
} catch (Smscx\Client\Exception\ChannelNotActiveException $e) {
    //Code for Channel not active
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Message ID not found    
} catch (Smscx\Client\Exception\AccessDeniedException $e) {
    //Cannot delete a message that was already sent
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling ViberApi->deleteScheduledViberMessage: ', $e->getMessage(), PHP_EOL;
}