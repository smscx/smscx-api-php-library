<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\SmsApi(
    new GuzzleHttp\Client(),
    $config
);
$campaign_id = 'cbb72a72-0dfa-4288-b3d0-05fab904f0b2';

try {
    $result = $smscx->deleteScheduledSmsCampaign($campaign_id);
    print_r($result);
    // $result->getInfo()->getCampaignId();
    // $result->getInfo()->getTotalPhoneNumbers();
    // $result->getInfo()->getTotalParts();
    // $result->getInfo()->getPhoneNumbersDeleted();
    // $result->getInfo()->getPartsDeleted();
    // $result->getInfo()->getCreditReturned();
    // $result->getInfo()->getChannel();
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Campaign ID not found    
} catch (Smscx\Client\Exception\AccessDeniedException $e) {
    //Cannot delete a campaign that has all the messages sent
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling SmsApi->deleteScheduledSmsCampaign: ', $e->getMessage(), PHP_EOL;
}