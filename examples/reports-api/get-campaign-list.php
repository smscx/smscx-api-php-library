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

$delivery_reports = true; // bool | The response will contain an object **data.status** with delivery report summary for each campaign
$source = 'api'; // string | Source of the sent messages
$limit = 100; // int | A limit on the number of objects to be returned
$next = 'NTM2NTA'; // string | The next token used to retrieve additional data
$previous = 'NTQxNTA'; // string | The previous token used to retrieve additional data

try {
    $result = $smscx->getCampaignsList($delivery_reports, $source, $limit, $next, $previous);
    print_r($result);
    // $reports->getInfo->getTotalCampaigns();
    foreach ( $result->getData() as $k => $v ) {
        // $v->getId();
        // $v->getName();
        // $v->getFrom();
        // $v->getGroups();
        // $v->getTotalPhoneNumbers();
        // $v->getParts();
        // $v->getCost();
        // $v->getText();
        // $v->getSource();
        // $v->getChannel();
        // $v->getDatetimeAdded();
        // $v->getDatetimeScheduled();
        // $v->getStatus();
    } 
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling ReportsApi->getCampaignsList: ', $e->getMessage(), PHP_EOL;
}