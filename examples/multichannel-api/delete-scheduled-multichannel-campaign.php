<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\MultichannelApi(
    new GuzzleHttp\Client(),
    $config
);

$campaign_id = '9f90f919-9b19-43db-921f-c8e05ae7054c';

try {
    $result = $smscx->deleteScheduledMultichannelCampaign($campaign_id);
    print_r($result);
    // $result->getInfo()->getCampaignId();
    // $result->getInfo()->getTotalPhoneNumbers();
    // $result->getInfo()->getTotalParts();
    // $result->getInfo()->getPhoneNumbersDeleted();
    // $result->getInfo()->getPartsDeleted();
    // $result->getInfo()->getCreditReturned();
    // $result->getInfo()->getChannel();
} catch (Smscx\Client\Exception\ChannelNotActiveException $e) {
    //Code for Channel not active
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Campaign ID not found    
} catch (Smscx\Client\Exception\AccessDeniedException $e) {
    //Cannot delete a campaign that has all the messages sent
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling MultichannelApi->deleteScheduledMultichannelCampaign: ', $e->getMessage(), PHP_EOL;
}