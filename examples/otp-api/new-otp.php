<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\OtpApi(
    new GuzzleHttp\Client(),
    $config
);

$new_otp_request = [
    'phoneNumber' => '+336124241xx',
    //'countryIso' => 'FR',
    //'from' => '',
    //'template' => 'Verification code: {{pin}}',
    //'trackId' => '3b90b6d3-4fd6-40d8-9b2d-310cb50f201d',
    //'ttl' => '500',
    //'maxAttempts' => '5',
    //'pinType' => 'numbers',
    //'pinLength' => '5',
    //'otpCallbackUrl' => 'https://callback-url/receive-otp-status',
];

try {
    $result = $smscx->newOtp($new_otp_request);
    print_r($result);
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling OtpApi->newOtp: ', $e->getMessage(), PHP_EOL;
}