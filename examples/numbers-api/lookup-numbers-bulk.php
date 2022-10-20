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

$numbers_lookup_request = [
    'phoneNumbers' => ['+336124241xx','+336123','+336129564xx','+336124241xx','+420604558xx','+336129564xx','+336123345xx','+4474006505xx','+49151237483xx','+49151286205xx','+4206018488xx','+49151232142xx','+3934237620xx'],
    //'countryIso' => 'FR',
    'allowInvalid' => true,
    'lookupCallbackUrl' => 'https://my-callback-url/receive-lookup-details',
];

try {
    $result = $smscx->lookupNumbers($numbers_lookup_request);
    print_r($result);
    // $result->getInfo()->getLookupBulkId();
    // $result->getInfo()->getTotalPhoneNumbers();
    // $result->getInfo()->getTotalValid();
    // $result->getInfo()->getTotalInvalid();
    // $result->getInfo()->getCost();
    // $result->getInfo()->getInvalid();
} catch (Smscx\Client\Exception\InvalidPhoneNumberException $e) {
    //Code for Invalid phone number
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request
} catch (Smscx\Client\Exception\NoCoverageException $e) {
    //Code for No coverage
} catch (Smscx\Client\Exception\InsufficientBalanceException $e) {
    //Code for Insufficient balance
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling NumbersApi->lookupNumbers: ', $e->getMessage(), PHP_EOL;
}