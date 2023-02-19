<?php

require_once(__DIR__ . '/vendor/autoload.php');


// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$smscx = new Smscx\Client\Api\NumbersApi(
    new GuzzleHttp\Client(),
    $config
);

//$limit = 100; // int | A limit on the number of objects to be returned
//$next = 'NTM2NTA'; // string | The next token used to retrieve additional data
//$previous = 'NTQxNTA'; // string | The previous token used to retrieve additional data

try {
    $result = $smscx->getBulkLookupCampaigns();
    print_r($result);
    foreach ( $result->getData() as $k => $v ) {
        // $v->getId();
        // $v->getTotalPhoneNumbers();
        // $v->getTotalValid();
        // $v->getTotalCost();
        // $v->getDatetimeAdded();
    }
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling NumbersApi->getBulkLookupCampaigns: ', $e->getMessage(), PHP_EOL;
}