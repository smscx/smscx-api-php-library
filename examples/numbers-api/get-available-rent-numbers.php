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

$country_iso = 'FR'; // string

# Optional filters
//$features = 3; // int | Filter by number features (1 - receive SMS, 2 - send SMS, 1 + 2 = 3 - send and receive SMS)
//$number_type = 'mobile'; // string | Filter by type of phone number
//$setup_time = 'instant'; // string | Filter by time of setup
//$registration = true; // bool | Filter by registration
//$inbound_sms_sender = true; // bool | Filter numbers that support inbound SMS from alphanumeric sender ID
//$include = '4559'; // string | Filter phone numbers that include the following digits
//$exclude = '1554'; // string | Filter phone numbers that exclude the following digits

try {
    $result = $smscx->getAvailableNumbers($country_iso);
    print_r($result);
    foreach ($result->getData() as $k => $v) {
        // $v->getNumberId();
        // $v->getPhoneNumber();
        // $v->getCountryIso();
        // $v->getNetworkOperator();
        // $v->getFeatures();
        // $v->getNumberType();
        // $v->getInboundSmsCost();
        // $v->getOutboundSmsCost();
        // $v->getSetupCost();

        //foreach ($v->getRentCost() as $key => $value) {
            //$value->getDays();
            //$value->getCost();
        //}

        // $v->getMinRent();
        // $v->getSetupTime();
        // $v->getRegistration();
        // $v->getInboundSmsSender();
        // $v->getDatetime();
    }
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling NumbersApi->getAvailableNumbers: ', $e->getMessage(), PHP_EOL;
}