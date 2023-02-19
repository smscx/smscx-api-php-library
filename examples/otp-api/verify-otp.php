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
// Identifier of the OTP request
$otp_id = 'a17fb13d-f4ac-4d93-9439-ef41ab8de390'; 
$pin = '2691';

try {
    $result = $smscx->verifyOtp($otp_id, $pin);
    print_r($result);
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\InvalidPinException $e) {
    // Code for Invalid PIN
} catch (Smscx\Client\Exception\OtpAlreadyVerifiedException $e) {
    // Code for OTP already verified
} catch (Smscx\Client\Exception\OtpCancelledException $e) {
    // Code for OTP cancelled
} catch (Smscx\Client\Exception\OtpExpiredException $e) {
    // Code for OTP expired
} catch (Smscx\Client\Exception\OtpFailedException $e) {
    // Code for OTP failed
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling OtpApi->verifyOtp: ', $e->getMessage(), PHP_EOL;
}