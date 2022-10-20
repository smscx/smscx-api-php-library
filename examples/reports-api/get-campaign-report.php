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

$campaign_id = '4baf0298-0c21-4df1-a60a-6e3476e95e0b'; // string | Identifier of a sent campaign
$short_response = false; // bool | If set to true, it will return the full `info` object and an empty `data` object
$limit = 100; // int | A limit on the number of objects to be returned
$next = 'NTM2NTA'; // string | The next token used to retrieve additional data
$previous = 'NTQxNTA'; // string | The previous token used to retrieve additional data

try {
    $result = $smscx->getCampaignReport($campaign_id, $short_response, $limit, $next, $previous);
    print_r($result);
    // $result->getInfo()->getCampaignId();
    // $result->getInfo()->getCampaignName();
    // $result->getInfo()->getTotalPhoneNumbers();
    // $result->getInfo()->getTotalCost();
    // $result->getInfo()->getTotalParts();
    // $result->getInfo()->getChannel();
    foreach ( $result->getData() as $k => $v ) {
        // $v->getMsgId();
        // $v->getStatus();
        // $v->getStatusCode();
        // $v->getErrorCode();
        // $v->getInQuietHours();
        // $v->getCreatedAt();
        // $v->getUpdatedAt();
        // $v->getScheduledAt();
        // $v->getCost();
        // $v->getTo();
        // $v->getCountryIso();
        // $v->getFrom();
        // $v->getSource();
        // $v->getChannel();
        // $v->getText();
        // $v->getTextAnalysis();
    }
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Campaign ID not found    
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling ReportsApi->getCampaignReport: ', $e->getMessage(), PHP_EOL;
}