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

$otp_id = 'a17fb13d-f4ac-4d93-9439-ef41ab8de390';

try {
    $result = $smscx->cancelOtp($otp_id);
    print_r($result);
    // $result->getInfo()->getId();
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //OTP ID not found    
} catch (Smscx\Client\Exception\OtpActionNotAllowedException $e) {
    //Code for cannot cancel a non-pending OTP    
} catch (Smscx\Client\Exception\OtpCancelledException $e) {
    //Code for OTP already cancelled    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling OtpApi->cancelOtp: ', $e->getMessage(), PHP_EOL;
}