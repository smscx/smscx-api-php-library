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

try {
    $result = $smscx->exportCampaignReportToXLSX($campaign_id);
    print_r($result);
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Campaign ID not found    
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling ReportsApi->exportCampaignReportToXLSX: ', $e->getMessage(), PHP_EOL;
}