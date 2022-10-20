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
$limit = 100; // int | A limit on the number of objects to be returned

try {
    $result = $smscx->exportAdvancedReportToXLSX($period, $start_date, $end_date, $channel, $source, $delivery_report, $country_iso, $limit);
    print_r($result);
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling ReportsApi->exportAdvancedReportToXLSX: ', $e->getMessage(), PHP_EOL;
}