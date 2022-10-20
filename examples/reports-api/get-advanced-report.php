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
$period = '2021-07'; // string | Period for the requested report in format **Y-M** or **Y**
// OR
// $start_date = '2021-03-01'; // string | The start date of the report in format Y-M-D
// $end_date = '2021-04-30'; // string | The end date of the report in format Y-M-D
$channel = 'sms'; // string | Channel of the sent messages
$source = 'api'; // string | Source of the sent messages
$delivery_report = 'delivered'; // string | 
$country_iso = 'fr'; // string | Two-letter country code defined in ISO-3166 alpha 2 standard (case insensitive)
$short_response = false; // bool | If set to true, it will return the full `info` object and an empty `data` object
$limit = 100; // int | A limit on the number of objects to be returned
$next = 'NTM2NTA'; // string | The next token used to retrieve additional data
$previous = 'NTQxNTA'; // string | The previous token used to retrieve additional data

try {
    $result = $smscx->getAdvancedReport($period, $start_date, $end_date, $channel, $source, $delivery_report, $country_iso, $short_response, $limit, $next, $previous);
    print_r($result);
    // $result->getInfo()->getTotalPhoneNumbers();
    // $result->getInfo()->getTotalCost();
    // $result->getInfo()->getTotalParts();
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
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling ReportsApi->getAdvancedReport: ', $e->getMessage(), PHP_EOL;
}