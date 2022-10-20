<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\SmsApi(
    new GuzzleHttp\Client(),
    $config
);

$send_sms_campaign_request = [
    'groups' => [17, 44],
    'from' => 'InfoText',
    'text' => 'Hi {{firstName}} {{lastName}}. Check out the brochure {{attachment:RytK}} Unsubscribe here: {{optoutLink}}',
    'transliteration' => [
        'alphabet' => 'NON_GSM',
        'removeEmojis' => true,
    ],
];

try {
    $result = $smscx->sendSmsCampaign($send_sms_campaign_request);
    print_r($result);
    // $result->getInfo()->getCampaignId();
    // $result->getInfo()->getTotalPhoneNumbers();
    // $result->getInfo()->getTotalValid();
    // $result->getInfo()->getTotalInvalid();
    // $result->getInfo()->getTotalCost();
    // $result->getInfo()->getTotalParts();
    // $result->getInfo()->getDuplicatesRemoved();
    // $result->getInfo()->getDlrCallbackUrl();
    // $result->getInfo()->getPhoneNumbersByCountry();
    // $result->getInfo()->getGroups();
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
} catch (Smscx\Client\Exception\NoCoverageException $e) {
    //Code for No coverage
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\InsufficientBalanceException $e) {
    //Code for Insufficient balance
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling SmsApi->sendSmsCampaign: ', $e->getMessage(), PHP_EOL;
}