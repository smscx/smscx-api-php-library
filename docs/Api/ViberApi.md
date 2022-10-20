# Smscx\Client\Api\ViberApi


| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**deleteScheduledViberCampaign()**](ViberApi.md#deleteScheduledViberCampaign) | **DELETE** /viber/scheduled/campaign/{campaignId} | Delete scheduled Viber campaign |
| [**deleteScheduledViberMessage()**](ViberApi.md#deleteScheduledViberMessage) | **DELETE** /viber/scheduled/{msgId} | Delete scheduled Viber message |
| [**estimateViberCampaign()**](ViberApi.md#estimateViberCampaign) | **POST** /viber/campaign/estimate | Estimate Viber campaign |
| [**estimateViberMessage()**](ViberApi.md#estimateViberMessage) | **POST** /viber/estimate | Estimate Viber message |
| [**sendViberCampaign()**](ViberApi.md#sendViberCampaign) 💰 | **POST** /viber/campaign | Send Viber campaign |
| [**sendViberMessage()**](ViberApi.md#sendViberMessage) 💰 | **POST** /viber | Send Viber message |


## `deleteScheduledViberCampaign()`

```php
deleteScheduledViberCampaign($campaign_id): \Smscx\Client\Model\DeleteScheduledCampaign
```

**Delete scheduled Viber campaign**

Delete a scheduled Viber campaign by providing a valid identifier (`campaignId`).    

The cost of the deleted scheduled Viber campaign will be returned to the balance of the account.    

If part of the Viber campaign has already started, only scheduled messages will be deleted. Messages already sent cannot be deleted.    

### Errors for DELETE `/viber/scheduled/campaign/{campaignId}`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 403 | 1118  |  access_denied  |  Only scheduled campaigns/messages can be deleted |  
| 404 | 1150  |  not_found  |  Campaign ID provided was not found or is not scheduled |  
| 400 | 1155  |  invalid_param  |  Campaign ID provided is not valid |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\ViberApi(
    new GuzzleHttp\Client(),
    $config
);

// Identifier of a scheduled Viber campaign
$campaign_id = 'cbb72a72-0dfa-4288-b3d0-05fab904f0b2';

try {
    $result = $smscx->deleteScheduledViberCampaign($campaign_id);
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
    echo 'Exception when calling ViberApi->deleteScheduledViberCampaign: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **campaign_id** | **string**| Identifier of a scheduled Viber campaign | required |

### Return type

[**\Smscx\Client\Model\DeleteScheduledCampaign**](../Model/DeleteScheduledCampaign.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteScheduledViberMessage()`

```php
deleteScheduledViberMessage($msg_id): \Smscx\Client\Model\DeleteScheduledMsg
```

**Delete scheduled Viber message**

Delete a scheduled Viber message by providing a valid identifier (`msgId`).    

The cost of the deleted scheduled Viber message will be returned to the balance of the account.    

### Errors for DELETE `/viber/scheduled/{msgId}`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 403 | 1118  |  access_denied  |  Only scheduled campaigns/messages can be deleted |  
| 404 | 1100  |  not_found  |  Message ID provided was not found or is not scheduled |  
| 400 | 1115  |  invalid_param  |  Message ID provided is not valid |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\ViberApi(
    new GuzzleHttp\Client(),
    $config
);

// Identifier of a scheduled Viber message
$msg_id = '3328fe13-2b99-4282-b62e-d891f5e452a8';

try {
    $result = $smscx->deleteScheduledViberMessage($msg_id);
    print_r($result);
    // $result->getInfo()->getMsgId();
    // $result->getInfo()->getParts();
    // $result->getInfo()->getCreditReturned();
    // $result->getInfo()->getChannel();
} catch (Smscx\Client\Exception\ChannelNotActiveException $e) {
    //Code for Channel not active
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Message ID not found    
} catch (Smscx\Client\Exception\AccessDeniedException $e) {
    //Cannot delete a message that was already sent
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling ViberApi->deleteScheduledViberMessage: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **msg_id** | **string**| Identifier of a scheduled Viber message | required |

### Return type

[**\Smscx\Client\Model\DeleteScheduledMsg**](../Model/DeleteScheduledMsg.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `estimateViberCampaign()`

```php
estimateViberCampaign($send_viber_campaign_request_estimate): \Smscx\Client\Model\SendViberCampaignResponse
```

**Estimate Viber campaign**

Estimate the cost of sending a Viber message to groups of phone numbers.    


### Errors for POST `/viber/campaigns/estimate`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 400 | 1101  |  invalid_param  |  The parameter `groups` is empty or not set |  
| 400 | 1140  |  invalid_param  |  Group ID is not a valid group |  
| 400 | 1102  |  invalid_param  |  Group is empty |  
| 400 | 1103  |  invalid_param  |  The phone numbers array is too big (max. allowed: 25000 numbers) |  
| 400 | 1105  |  invalid_param  |  The parameter `from` is empty or not set |  
| 400 | 1108  |  invalid_param  |  The parameter `scheduledDate` is not a valid date |  
| 400 | 1109  |  invalid_param  |  The parameter `dlrCallbackUrl` is not a valid URL |  
| 400 | 1112  |  invalid_param  |  The shortlink/attachment ID provided for tracking is invalid or not found |  
| 400 | 1116  |  invalid_param  |  The scheduled date is in the past |  
| 400 | 1207  |  invalid_param  | The phone number provided is not valid |  
| 400 | 1210  |  invalid_param  |  The phone numbers provided are invalid |  
| 403 | 1119  |  no_coverage  |  No coverage or restricted destination |  
| 400 | 1113  |  insufficient_credit  |  Insufficient credit |  
| 400 | 1114  |  insufficient_credit  |  Credit limit reached. To increase the credit limit, please contact your account manager |  
| 400 | 1126  |  invalid_param  |  The parameter `templateId` is not set |  
| 400 | 1127  |  invalid_param  |  The parameter `templateId` is not valid |  
| 400 | 1128  |  invalid_param  |  The template ID provided is not a valid template |  
| 403 | 1132  |  access_denied  |  The template ID provided is not approved |  
| 403 | 1133  |  access_denied  |  The template ID provided is not locked |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\ViberApi(
    new GuzzleHttp\Client(),
    $config
);

$send_viber_campaign_request_estimate = [
    'groups' => [16, 18],
    'from' => 'InfoText',
    'templateId' => 17,
];

try {
    $result = $smscx->estimateViberCampaign($send_viber_campaign_request_estimate);
    print_r($result);
    // $result->getInfo()->getCampaignId();
    // $result->getInfo()->getTotalPhoneNumbers();
    // $result->getInfo()->getTotalValid();
    // $result->getInfo()->getTotalInvalid();
    // $result->getInfo()->getTotalCost();
    // $result->getInfo()->getTotalParts();
    // $result->getInfo()->getDuplicatesRemoved();
    // $result->getInfo()->getDlrCallbackUrl();
    // $result->getInfo()->getPhoneNumbersByCountry();
    // $result->getInfo()->getGroups();
    // $result->getInfo()->getTransliterationAnalysis();
    // $result->getInfo()->getTotalInQuietHours();
    // $result->getInfo()->getInvalid();
    // $result->getInfo()->getScheduled();
    foreach ( $result->getData() as $k => $v ) {
        // $v->getMsgId();
        // $v->getTrackData();
        // $v->getStatus();
        // $v->getStatusCode();
        // $v->getErrorCode();
        // $v->getCreatedAt();
        // $v->getScheduledAt();
        // $v->getInQuietHours();
        // $v->getCost();
        // $v->getTo();
        // $v->getCountryIso();
        // $v->getFrom();
        // $v->getText();
        // $v->getParts();
        // $v->getTextAnalysis();
    }
} catch (Smscx\Client\Exception\ChannelNotActiveException $e) {
    //Code for Channel not active
} catch (Smscx\Client\Exception\TemplateNotApprovedException $e) {
    //Code for Template not approved
} catch (Smscx\Client\Exception\NoCoverageException $e) {
    //Code for No coverage
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\InvalidPhoneNumberException $e) {
    //Code for Invalid phone number    
} catch (Smscx\Client\Exception\InsufficientBalanceException $e) {
    //Code for Insufficient balance
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling ViberApi->estimateViberCampaign: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **send_viber_campaign_request_estimate** | [**\Smscx\Client\Model\SendViberCampaignRequestEstimate**](../Model/SendViberCampaignRequestEstimate.md)|  | required |

### Return type

[**\Smscx\Client\Model\SendViberCampaignResponse**](../Model/SendViberCampaignResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `estimateViberMessage()`

```php
estimateViberMessage($send_viber_message_request_estimate): \Smscx\Client\Model\SendViberMessageResponse
```

**Estimate Viber message**

Estimate the cost of sending a Viber message.    

### Errors for POST `/viber/estimate`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 400 | 1104  |  invalid_param  | The parameter `to` is empty or not set |  
| 400 | 1105  |  invalid_param  |  The parameter `from` is empty or not set |  
| 400 | 1108  |  invalid_param  |  The parameter `scheduledDate` is not a valid date |  
| 400 | 1109  |  invalid_param  |  The parameter `dlrCallbackUrl` is not a valid URL |  
| 400 | 1112  |  invalid_param  |  The shortlink/attachment ID provided for tracking is invalid or not found |  
| 400 | 1116  |  invalid_param  |  The scheduled date is in the past |  
| 400 | 1103  |  invalid_param  |  The phone numbers array is too big (max. allowed: 25000 numbers) |  
| 400 | 1207  |  invalid_param  | The phone number provided is not valid |  
| 400 | 1210  |  invalid_param  |  The phone numbers provided are invalid |  
| 403 | 1119  |  no_coverage  |  No coverage or restricted destination |  
| 400 | 1113  |  insufficient_credit  |  Insufficient credit |  
| 400 | 1114  |  insufficient_credit  |  Credit limit reached. To increase the credit limit, please contact your account manager |  
| 400 | 1126  |  invalid_param  |  The parameter `templateId` is not set |  
| 400 | 1127  |  invalid_param  |  The parameter `templateId` is not valid |  
| 400 | 1128  |  invalid_param  |  The template ID provided is not a valid template |  
| 403 | 1132  |  access_denied  |  The template ID provided is not approved |  
| 403 | 1133  |  access_denied  |  The template ID provided is not locked |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\ViberApi(
    new GuzzleHttp\Client(),
    $config
);

$send_viber_message_request_estimate = [
    'to' => ['+316124698xx', '+316124693xx'],
    'from' => 'InfoText',
    'templateId' => 19,
    'allowInvalid' => true,
];

try {
    $result = $smscx->estimateViberMessage($send_viber_message_request_estimate);
    print_r($result);
    // $result->getInfo()->getCampaignId();
    // $result->getInfo()->getTotalPhoneNumbers();
    // $result->getInfo()->getTotalValid();
    // $result->getInfo()->getTotalInvalid();
    // $result->getInfo()->getTotalCost();
    // $result->getInfo()->getTotalParts();
    // $result->getInfo()->getPhoneNumbersByCountry();
    // $result->getInfo()->getTransliterationAnalysis();
    // $result->getInfo()->getTotalInQuietHours();
    // $result->getInfo()->getInvalid();
    // $result->getInfo()->getScheduled();
    foreach ( $result->getData() as $k => $v ) {
        // $v->getMsgId();
        // $v->getTrackData();
        // $v->getStatus();
        // $v->getStatusCode();
        // $v->getErrorCode();
        // $v->getCreatedAt();
        // $v->getScheduledAt();
        // $v->getInQuietHours();
        // $v->getCost();
        // $v->getTo();
        // $v->getCountryIso();
        // $v->getFrom();
        // $v->getText();
        // $v->getParts();
        // $v->getTextAnalysis();
    }
} catch (Smscx\Client\Exception\ChannelNotActiveException $e) {
    //Code for Channel not active
} catch (Smscx\Client\Exception\TemplateNotApprovedException $e) {
    //Code for Template not approved
} catch (Smscx\Client\Exception\NoCoverageException $e) {
    //Code for No coverage
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\InvalidPhoneNumberException $e) {
    //Code for Invalid phone number    
} catch (Smscx\Client\Exception\InsufficientBalanceException $e) {
    //Code for Insufficient balance
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling ViberApi->estimateViberMessage: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **send_viber_message_request_estimate** | [**\Smscx\Client\Model\SendViberMessageRequestEstimate**](../Model/SendViberMessageRequestEstimate.md)|  | required |

### Return type

[**\Smscx\Client\Model\SendViberMessageResponse**](../Model/SendViberMessageResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `sendViberCampaign()`<span>💰</span>

```php
sendViberCampaign($send_viber_campaign_request): \Smscx\Client\Model\SendViberCampaignResponse
```

**Send Viber campaign**

*Note: This method incurs costs*

Sends Viber message to existing group(s) of contacts.    

> Note: This endpoint accepts idempotent requests by providing an additional `idempotencyId` parameter in body with a unique value generated by the client of type UUID v1-v5. To confirm that the server understood the request, the response will contain the header `X-Idempotency-Id` with your unique value.  By using idempotency you can retry requests in case of network error or server not responding in time, without accidentally performing the same operation twice and have a guarantee of not being billed twice.     > We recommend to always use Idempotency ID when sending Viber campaigns      

### Errors for POST `/viber/campaigns`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 400 | 1101  |  invalid_param  |  The parameter `groups` is empty or not set |  
| 400 | 1140  |  invalid_param  |  Group ID is not a valid group |  
| 400 | 1102  |  invalid_param  |  Group is empty |  
| 400 | 1103  |  invalid_param  |  The phone numbers array is too big (max. allowed: 25000 numbers) |  
| 400 | 1105  |  invalid_param  |  The parameter `from` is empty or not set |  
| 400 | 1108  |  invalid_param  |  The parameter `scheduledDate` is not a valid date |  
| 400 | 1109  |  invalid_param  |  The parameter `dlrCallbackUrl` is not a valid URL |  
| 400 | 1111  |  invalid_param  |  Idempotency Id provided is not a valid UUID (v1-v5) |  
| 400 | 1112  |  invalid_param  |  The shortlink/attachment ID provided for tracking is invalid or not found |  
| 400 | 1116  |  invalid_param  |  The scheduled date is in the past |  
| 400 | 1207  |  invalid_param  | The phone number provided is not valid |  
| 400 | 1210  |  invalid_param  |  The phone numbers provided are invalid |  
| 403 | 1119  |  no_coverage  |  No coverage or restricted destination |  
| 400 | 1113  |  insufficient_credit  |  Insufficient credit |  
| 400 | 1114  |  insufficient_credit  |  Credit limit reached. To increase the credit limit, please contact your account manager |  
| 400 | 1126  |  invalid_param  |  The parameter `templateId` is not set |  
| 400 | 1127  |  invalid_param  |  The parameter `templateId` is not valid |  
| 400 | 1128  |  invalid_param  |  The template ID provided is not a valid template |  
| 403 | 1132  |  access_denied  |  The template ID provided is not approved |  
| 403 | 1133  |  access_denied  |  The template ID provided is not locked |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\ViberApi(
    new GuzzleHttp\Client(),
    $config
);
$send_viber_campaign_request = [
    'groups' => [16, 18],
    'from' => 'InfoText',
    'templateId' => 17,
];

try {
    $result = $smscx->sendViberCampaign($send_viber_campaign_request);
    print_r($result);
    // $result->getInfo()->getCampaignId();
    // $result->getInfo()->getTotalPhoneNumbers();
    // $result->getInfo()->getTotalValid();
    // $result->getInfo()->getTotalInvalid();
    // $result->getInfo()->getTotalCost();
    // $result->getInfo()->getTotalParts();
    // $result->getInfo()->getDuplicatesRemoved();
    // $result->getInfo()->getDlrCallbackUrl();
    // $result->getInfo()->getPhoneNumbersByCountry();
    // $result->getInfo()->getGroups();
    // $result->getInfo()->getTransliterationAnalysis();
    // $result->getInfo()->getTotalInQuietHours();
    // $result->getInfo()->getInvalid();
    // $result->getInfo()->getScheduled();
    foreach ( $result->getData() as $k => $v ) {
        // $v->getMsgId();
        // $v->getTrackData();
        // $v->getStatus();
        // $v->getStatusCode();
        // $v->getErrorCode();
        // $v->getCreatedAt();
        // $v->getScheduledAt();
        // $v->getInQuietHours();
        // $v->getCost();
        // $v->getTo();
        // $v->getCountryIso();
        // $v->getFrom();
        // $v->getText();
        // $v->getParts();
        // $v->getTextAnalysis();
    }
} catch (Smscx\Client\Exception\ChannelNotActiveException $e) {
    //Code for Channel not active
} catch (Smscx\Client\Exception\TemplateNotApprovedException $e) {
    //Code for Template not approved
} catch (Smscx\Client\Exception\NoCoverageException $e) {
    //Code for No coverage
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\InvalidPhoneNumberException $e) {
    //Code for Invalid phone number    
} catch (Smscx\Client\Exception\InsufficientBalanceException $e) {
    //Code for Insufficient balance
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling ViberApi->sendViberCampaign: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **send_viber_campaign_request** | [**\Smscx\Client\Model\SendViberCampaignRequest**](../Model/SendViberCampaignRequest.md)|  | required |

### Return type

[**\Smscx\Client\Model\SendViberCampaignResponse**](../Model/SendViberCampaignResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `sendViberMessage()`<span>💰</span>

```php
sendViberMessage($send_viber_message_request): \Smscx\Client\Model\SendViberMessageResponse
```

**Send Viber message**

*Note: This method incurs costs*

Sends Viber message to a single phone number or to a list of phone numbers.    

This endpoint was designed to handle big data objects (up to 25.000 Viber messages in one request).    

> Note: This endpoint accepts idempotent requests by providing an additional `idempotencyId` parameter in body with a unique value generated by the client of type UUID v1-v5. To confirm that the server understood the request, the response will contain the header `X-Idempotency-Id` with your unique value.  By using idempotency you can retry requests in case of network error or server not responding in time, without accidentally performing the same operation twice and have a guarantee of not being billed twice.       

### Errors for POST `/viber`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 400 | 1104  |  invalid_param  | The parameter `to` is empty or not set |  
| 400 | 1105  |  invalid_param  |  The parameter `from` is empty or not set |  
| 400 | 1108  |  invalid_param  |  The parameter `scheduledDate` is not a valid date |  
| 400 | 1109  |  invalid_param  |  The parameter `dlrCallbackUrl` is not a valid URL |  
| 400 | 1111  |  invalid_param  |  Idempotency Id provided is not a valid UUID (v1-v5) |  
| 400 | 1112  |  invalid_param  |  The shortlink/attachment ID provided for tracking is invalid or not found |  
| 400 | 1116  |  invalid_param  |  The scheduled date is in the past |  
| 400 | 1103  |  invalid_param  |  The phone numbers array is too big (max. allowed: 25000 numbers) |  
| 400 | 1207  |  invalid_param  | The phone number provided is not valid |  
| 400 | 1210  |  invalid_param  |  The phone numbers provided are invalid |  
| 403 | 1119  |  no_coverage  |  No coverage or restricted destination |  
| 400 | 1113  |  insufficient_credit  |  Insufficient credit |  
| 400 | 1114  |  insufficient_credit  |  Credit limit reached. To increase the credit limit, please contact your account manager |  
| 400 | 1126  |  invalid_param  |  The parameter `templateId` is not set |  
| 400 | 1127  |  invalid_param  |  The parameter `templateId` is not valid |  
| 400 | 1128  |  invalid_param  |  The template ID provided is not a valid template |  
| 403 | 1132  |  access_denied  |  The template ID provided is not approved |  
| 403 | 1133  |  access_denied  |  The template ID provided is not locked |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\ViberApi(
    new GuzzleHttp\Client(),
    $config
);
$send_viber_message_request = [
    'to' => ['+316124693xx','+34612934161','+3361611862','+34612934161','+447400790504','+4915123438636','+3361611862'],
    'from' => 'InfoText',
    'templateId' => 25,
    'transliteration' => [
        'alphabet' => 'NON_GSM',
        'removeEmojis' => true,
    ],
    'allowInvalid' => true,
];

try {
    $result = $smscx->sendViberMessage($send_viber_message_request);
    print_r($result);
    // $result->getInfo()->getCampaignId();
    // $result->getInfo()->getTotalPhoneNumbers();
    // $result->getInfo()->getTotalValid();
    // $result->getInfo()->getTotalInvalid();
    // $result->getInfo()->getTotalCost();
    // $result->getInfo()->getTotalParts();
    // $result->getInfo()->getPhoneNumbersByCountry();
    // $result->getInfo()->getTransliterationAnalysis();
    // $result->getInfo()->getTotalInQuietHours();
    // $result->getInfo()->getInvalid();
    // $result->getInfo()->getScheduled();
    foreach ( $result->getData() as $k => $v ) {
        // $v->getMsgId();
        // $v->getTrackData();
        // $v->getStatus();
        // $v->getStatusCode();
        // $v->getErrorCode();
        // $v->getCreatedAt();
        // $v->getScheduledAt();
        // $v->getInQuietHours();
        // $v->getCost();
        // $v->getTo();
        // $v->getCountryIso();
        // $v->getFrom();
        // $v->getText();
        // $v->getParts();
        // $v->getTextAnalysis();
    }
} catch (Smscx\Client\Exception\ChannelNotActiveException $e) {
    //Code for Channel not active
} catch (Smscx\Client\Exception\TemplateNotApprovedException $e) {
    //Code for Template not approved
} catch (Smscx\Client\Exception\NoCoverageException $e) {
    //Code for No coverage
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\InvalidPhoneNumberException $e) {
    //Code for Invalid phone number    
} catch (Smscx\Client\Exception\InsufficientBalanceException $e) {
    //Code for Insufficient balance
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling ViberApi->sendViberMessage: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **send_viber_message_request** | [**\Smscx\Client\Model\SendViberMessageRequest**](../Model/SendViberMessageRequest.md)|  | required |

### Return type

[**\Smscx\Client\Model\SendViberMessageResponse**](../Model/SendViberMessageResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
