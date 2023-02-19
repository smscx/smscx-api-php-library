<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: BasicAuth
$config = Smscx\Configuration::getDefaultConfiguration()
              ->setApplicationId('YOUR_APPLICATION_ID')
              ->setApplicationSecret('YOUR_APPLICATION_SECRET');

$smscx = new Smscx\Client\Api\OauthApi(
    new GuzzleHttp\Client(),
    $config
);
// string | A list of space-delimited, case-sensitive strings. If left empty or ommited, the issued access token will be granted with all scopes (full privileges)
$scopes = 'sms groups templates numbers originators viber whatsapp otp'; 

try {
    $result = $smscx->getAccessToken($scopes);
    print_r($result);
    // $result->getAccessToken();
    // $result->getExpiresIn();
    // $result->getTokenType();
    // $result->getScope();
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request
} catch (Smscx\Client\Exception\InvalidCredentialsException $e) {
    //Code for Invalid credentials
} catch (Smscx\Client\Exception\InvalidScopeException $e) {
    //Code for Invalid scope
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling OauthApi->getAccessToken: ', $e->getMessage(), PHP_EOL;
}