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
$dimension = 'country'; // string | Dimension for wich the summary report is requested
$period = '2021-07'; // string | Period for the requested report in format **Y-M** or **Y**
// OR
// $start_date = '2021-03-01'; // string | The start date of the report in format Y-M-D
// $end_date = '2021-04-30'; // string | The end date of the report in format Y-M-D
$limit = 100; // int | A limit on the number of objects to be returned

try {
    $result = $smscx->getSummaryReports($dimension, $period, $start_date, $end_date, $limit);
    print_r($result);
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling ReportsApi->getSummaryReports: ', $e->getMessage(), PHP_EOL;
}