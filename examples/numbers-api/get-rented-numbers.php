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

# Optional filters
//$features = 3; // int | Filter by number features (1 - receive SMS, 2 - send SMS, 1 + 2 = 3 - send and receive SMS)
//$country_iso = 'fr'; // string | Filter by country iso. Two-letter country code defined in ISO-3166 alpha 2 standard (case insensitive)
//$number_type = 'mobile'; // string | Filter by type of phone number
//$active_rent = true; // bool | Filter by active rent
//$inbound_sms_sender = true; // bool | Filter numbers that support inbound SMS from alphanumeric sender ID
//$include = '4559'; // string | Filter phone numbers that include the following digits
//$exclude = '1554'; // string | Filter phone numbers that exclude the following digits

try {
    $result = $smscx->getRentedNumbers();
    print_r($result);
    foreach ($result->getData() as $k => $v) {

        // $v->getRentId();
        // $v->getNumberId();
        // $v->getPhoneNumber();
        // $v->getCountryIso();
        // $v->getNetworkOperator();
        // $v->getFeatures();
        // $v->getNumberType();
        // $v->getRentCost();
        // $v->getSetupCost();
        // $v->getRentPeriod();
        // $v->getRentStart();
        // $v->getRentEnd();
        // $v->getInboundSmsCost();
        // $v->getOutboundSmsCost();
        //foreach ($v->getRenewCost() as $key => $value) {
            //$value->getDays();
            //$value->getCost();
        //}
        // $v->getInboundSms()->getTotal();
        // $v->getInboundSms()->getCost();
        // $v->getOutboundSms()->getTotal();
        // $v->getOutboundSms()->getCost();
        // $v->getMinRent();
        // $v->getCallbackUrl();    
        // $v->getAutoRenew();
        // $v->getInboundSmsSender();
        // $v->getActiveRent();
        // $v->getApproved();
        // $v->getDatetime();
    }
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling NumbersApi->getRentedNumbers: ', $e->getMessage(), PHP_EOL;
}