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

$send_multichannel_message_request_estimate = [
    'to' => ['+316124693xx','+34612934161','+3361611862','+34612934161','+447400790504','+4915123438636','+3361611862'],
    'from' => 'InfoText',
    "strategy" => [
        [
            'channel' => 'viber',
            'templateId' => 15,
        ],
        [
            'channel' => 'whatsapp',
            'templateId' => 19,
        ],
        [
            'channel' => 'sms',
            'text' => 'This is the last failover text message',
        ],
    ],
    'ttl' => 300,
    'allowInvalid' => true,
];

try {
    $result = $smscx->estimateMultichannelMessage($send_multichannel_message_request_estimate);
    print_r($result);
    // $result->getInfo()->getCampaignId();
    // $result->getInfo()->getTotalPhoneNumbers();
    // $result->getInfo()->getTotalValid();
    // $result->getInfo()->getTotalInvalid();
    // $result->getInfo()->getTotalCost();
    // $result->getInfo()->getTotalParts();
    // $result->getInfo()->getPhoneNumbersByCountry();
    // $result->getInfo()->getTransliterationAnalysis();
    // $result->getInfo()->getTotalInQuietHours();
    // $result->getInfo()->getInvalid();
    // $result->getInfo()->getScheduled();
    foreach ( $result->getData() as $k => $v ) {
        // $v->getMsgId();
        // $v->getTrackData();
        // $v->getStatus();
        // $v->getStatusCode();
        // $v->getErrorCode();
        // $v->getCreatedAt();
        // $v->getScheduledAt();
        // $v->getInQuietHours();
        // $v->getCost();
        // $v->getTo();
        // $v->getCountryIso();
        // $v->getFrom();
        // $v->getText();
        // $v->getParts();
        // $v->getTextAnalysis();
    }
} catch (Smscx\Client\Exception\ChannelNotActiveException $e) {
    //Code for Channel not active
} catch (Smscx\Client\Exception\TemplateNotApprovedException $e) {
    //Code for Template not approved
} catch (Smscx\Client\Exception\NoCoverageException $e) {
    //Code for No coverage
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\InvalidPhoneNumberException $e) {
    //Code for Invalid phone number    
} catch (Smscx\Client\Exception\InsufficientBalanceException $e) {
    //Code for Insufficient balance
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling MultichannelApi->estimateMultichannelMessage: ', $e->getMessage(), PHP_EOL;
}