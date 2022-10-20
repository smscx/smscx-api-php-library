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

$numbers_validate_request = [
    'phoneNumbers' => ["+33612424105","+33612246450","+336123","+33612956402","+33612334525","+447400650588","+4915123748358","+4915128620584","+420601848808","+420601302207","+420204532112"],
    //'countryIso' => 'FR',
];

try {
    $result = $smscx->validateNumbers($numbers_validate_request);
    print_r($result);
    // $result->getInfo()->getTotalPhoneNumbers();
    // $result->getInfo()->getTotalValid();
    // $result->getInfo()->getTotalInvalid();
    foreach ($result->getData() as $k => $v) {
        // $v->getPhoneNumber();
        // $v->getCountryIso();
        // $v->getNetworkOperator();
        // $v->getTimezone();
        // $v->getInvalid(); # true or false
    }
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling NumbersApi->validateNumbers: ', $e->getMessage(), PHP_EOL;
}