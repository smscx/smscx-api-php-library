# Smscx\Client\Api\MultichannelApi


| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**deleteScheduledMultichannelCampaign()**](MultichannelApi.md#deleteScheduledMultichannelCampaign) | **DELETE** /multichannel/scheduled/campaign/{campaignId} | Delete scheduled Multichannel campaign |
| [**deleteScheduledMultichannelMessage()**](MultichannelApi.md#deleteScheduledMultichannelMessage) | **DELETE** /multichannel/scheduled/{msgId} | Delete scheduled Multichannel message |
| [**estimateMultichannelCampaign()**](MultichannelApi.md#estimateMultichannelCampaign) | **POST** /multichannel/campaign/estimate | Estimate Multichannel campaign |
| [**estimateMultichannelMessage()**](MultichannelApi.md#estimateMultichannelMessage) | **POST** /multichannel/estimate | Estimate Multichannel message |
| [**sendMultichannelCampaign()**](MultichannelApi.md#sendMultichannelCampaign) 💰 | **POST** /multichannel/campaign | Send Multichannel campaign |
| [**sendMultichannelMessage()**](MultichannelApi.md#sendMultichannelMessage) 💰 | **POST** /multichannel | Send Multichannel message |


## `deleteScheduledMultichannelCampaign()`

```php
deleteScheduledMultichannelCampaign($campaign_id): \Smscx\Client\Model\DeleteScheduledCampaign
```

**Delete scheduled Multichannel campaign**

Delete a scheduled Multichannel campaign by providing a valid identifier (`campaignId`).    

The cost of the deleted scheduled Multichannel campaign will be returned to the balance of the account.    

If part of the Multichannel campaign has already started, only scheduled messages will be deleted. Messages already sent cannot be deleted.    

### Errors for DELETE `/multichannel/scheduled/campaign/{campaignId}`  
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
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **campaign_id** | **string**| Identifier of a scheduled Multichannel campaign | required |

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

## `deleteScheduledMultichannelMessage()`

```php
deleteScheduledMultichannelMessage($msg_id): \Smscx\Client\Model\DeleteScheduledMsg
```

**Delete scheduled Multichannel message**

Delete a scheduled Multichannel message by providing a valid identifier (`msgId`).    

The cost of the deleted scheduled Multichannel message will be returned to the balance of the account.    

### Errors for DELETE `/multichannel/scheduled/{msgId}`  
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

$smscx = new Smscx\Client\Api\MultichannelApi(
    new GuzzleHttp\Client(),
    $config
);

$msg_id = '396d2afa-1440-4f36-a365-b99a5ceaea23';

try {
    $result = $smscx->deleteScheduledMultichannelMessage($msg_id);
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
    echo 'Exception when calling MultichannelApi->deleteScheduledMultichannelMessage: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **msg_id** | **string**| Identifier of a scheduled Multichannel message | required |

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

## `estimateMultichannelCampaign()`

```php
estimateMultichannelCampaign($send_multichannel_campaign_request_estimate): \Smscx\Client\Model\SendMultichannelCampaignResponse
```

**Estimate Multichannel campaign**

Estimate the cost of sending a Multichannel message to groups of phone numbers.    

### Errors for POST `/multichannel/campaigns/estimate`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 400 | 1101  |  invalid_param  |  The parameter `groups` is empty or not set |  
| 400 | 1140  |  invalid_param  |  Group ID is not a valid group |  
| 400 | 1102  |  invalid_param  |  Group is empty |  
| 400 | 1103  |  invalid_param  |  The phone numbers array is too big (max. allowed: 25000 numbers) |  
| 400 | 1105  |  invalid_param  |  The parameter `from` is empty or not set |  
| 400 | 1106  |  invalid_param  |  The parameter `from` is not valid (min 3, max 11 characters) |  
| 400 | 1107  |  invalid_param  |  The parameter `text` is empty or not set |  
| 400 | 1108  |  invalid_param  |  The parameter `scheduledDate` is not a valid date |  
| 400 | 1109  |  invalid_param  |  The parameter `dlrCallbackUrl` is not a valid URL |  
| 400 | 1112  |  invalid_param  |  The shortlink/attachment ID provided for tracking is invalid or not found |  
| 400 | 1116  |  invalid_param  |  The scheduled date is in the past |  
| 400 | 1103  |  invalid_param  |  The phone numbers array is too big (max. allowed: 25000 numbers) |  
| 403 | 1119  |  no_coverage  |  No coverage or restricted destination |  
| 400 | 1113  |  insufficient_credit  |  Insufficient credit |  
| 400 | 1114  |  insufficient_credit  |  Credit limit reached. To increase the credit limit, please contact your account manager |  
| 400 | 1124  |  invalid_param  |  The parameter `ttl` is not a number |  
| 400 | 1125  |  invalid_param  |  Min value for `ttl` is 300 seconds |  
| 400 | 1134  |  invalid_param  |  Max value for `ttl` is 1209600 seconds (14 days) |  
| 400 | 1120  |  invalid_param  |  The parameter `strategy` is empty or not set |  
| 400 | 1121  |  invalid_param  |  The parameter `strategy` must have at least two channels |  
| 400 | 1122  |  invalid_param  |  The parameter `strategy` must have channel `sms` as last element |  
| 400 | 1129  |  invalid_param  |  The parameter `strategy` contains duplicate channels |  
| 400 | 1123  |  invalid_param  |  The parameter `channel` is not valid. Allowed values: |  
| 403 | 1131  |  access_denied  |  The strategy contains channels that are not active: |  
| 400 | 1126  |  invalid_param  |  The parameter `templateId` is not set |  
| 400 | 1127  |  invalid_param  |  The parameter `templateId` is not valid |  
| 400 | 1128  |  invalid_param  |  The template ID provided is not a valid template |  
| 403 | 1132  |  access_denied  |  The template ID provided is not approved |  
| 403 | 1133  |  access_denied  |  The template ID provided is not locked |  
| 400 | 1130  |  insufficient_credit  |  Insufficient credit for failover sending |

### Example

```php
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

$send_multichannel_campaign_request_estimate = [
    'groups' => [16, 18],
    'from' => 'InfoText',
    "strategy" => [
        [
            'channel' => 'viber',
            'templateId' => 15,
        ],
        [
            'channel' => 'whatsapp',
            'templateId' => 19,
        ],
        [
            'channel' => 'sms',
            'text' => 'This is the last failover text message',
        ],
    ],
    'ttl' => 300,
];

try {
    $result = $smscx->estimateMultichannelCampaign($send_multichannel_campaign_request_estimate);
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
    echo 'Exception when calling MultichannelApi->estimateMultichannelCampaign: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **send_multichannel_campaign_request_estimate** | [**\Smscx\Client\Model\SendMultichannelCampaignRequestEstimate**](../Model/SendMultichannelCampaignRequestEstimate.md)|  | required |

### Return type

[**\Smscx\Client\Model\SendMultichannelCampaignResponse**](../Model/SendMultichannelCampaignResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `estimateMultichannelMessage()`

```php
estimateMultichannelMessage($send_multichannel_message_request_estimate): \Smscx\Client\Model\SendMultichannelMessageResponse
```

**Estimate Multichannel message**

Estimate the cost of sending a Multichannel message.

### Errors for POST `/multichannel/estimate`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 400 | 1104  |  invalid_param  | The parameter `to` is empty or not set |  
| 400 | 1105  |  invalid_param  |  The parameter `from` is empty or not set |  
| 400 | 1106  |  invalid_param  |  The parameter `from` is not valid (min 3, max 11 characters) |  
| 400 | 1107  |  invalid_param  |  The parameter `text` is empty or not set |  
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
| 400 | 1130  |  insufficient_credit  |  Insufficient credit for failover sending |  
| 400 | 1124  |  invalid_param  |  The parameter `ttl` is not a number |  
| 400 | 1125  |  invalid_param  |  Min value for `ttl` is 300 seconds |  
| 400 | 1134  |  invalid_param  |  Max value for `ttl` is 1209600 seconds (14 days) |  
| 400 | 1120  |  invalid_param  |  The parameter `strategy` is empty or not set |  
| 400 | 1121  |  invalid_param  |  The parameter `strategy` must have at least two channels |  
| 400 | 1122  |  invalid_param  |  The parameter `strategy` must have channel `sms` as last element |  
| 400 | 1129  |  invalid_param  |  The parameter `strategy` contains duplicate channels |  
| 400 | 1123  |  invalid_param  |  The parameter `channel` is not valid. Allowed values: |  
| 403 | 1131  |  access_denied  |  The strategy contains channels that are not active: |  
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

$smscx = new Smscx\Client\Api\MultichannelApi(
    new GuzzleHttp\Client(),
    $config
);

$send_multichannel_message_request_estimate = [
    'to' => ['+316124693xx','+34612934161','+3361611862','+34612934161','+447400790504','+4915123438636','+3361611862'],
    'from' => 'InfoText',
    "strategy" => [
        [
            'channel' => 'viber',
            'templateId' => 15,
        ],
        [
            'channel' => 'whatsapp',
            'templateId' => 19,
        ],
        [
            'channel' => 'sms',
            'text' => 'This is the last failover text message',
        ],
    ],
    'ttl' => 300,
    'allowInvalid' => true,
];

try {
    $result = $smscx->estimateMultichannelMessage($send_multichannel_message_request_estimate);
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
    echo 'Exception when calling MultichannelApi->estimateMultichannelMessage: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **send_multichannel_message_request_estimate** | [**\Smscx\Client\Model\SendMultichannelMessageRequestEstimate**](../Model/SendMultichannelMessageRequestEstimate.md)|  | required |

### Return type

[**\Smscx\Client\Model\SendMultichannelMessageResponse**](../Model/SendMultichannelMessageResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `sendMultichannelCampaign()`<span>💰</span>

```php
sendMultichannelCampaign($send_multichannel_campaign_request): \Smscx\Client\Model\SendMultichannelCampaignResponse
```

**Send Multichannel campaign**

*Note: This method incurs costs*

Sends Multichannel message to existing group(s) of contacts.    

> Note: This endpoint accepts idempotent requests by providing an additional `idempotencyId` parameter in body with a unique value generated by the client of type UUID v1-v5. To confirm that the server understood the request, the response will contain the header `X-Idempotency-Id` with your unique value.  By using idempotency you can retry requests in case of network error or server not responding in time, without accidentally performing the same operation twice and have a guarantee of not being billed twice.     > We recommend to always use Idempotency ID when sending Multichannel campaigns    

### Errors for POST `/multichannel/campaigns`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 400 | 1101  |  invalid_param  |  The parameter `groups` is empty or not set |  
| 400 | 1140  |  invalid_param  |  Group ID is not a valid group |  
| 400 | 1102  |  invalid_param  |  Group is empty |  
| 400 | 1103  |  invalid_param  |  The phone numbers array is too big (max. allowed: 25000 numbers) |  
| 400 | 1105  |  invalid_param  |  The parameter `from` is empty or not set |  
| 400 | 1106  |  invalid_param  |  The parameter `from` is not valid (min 3, max 11 characters) |  
| 400 | 1107  |  invalid_param  |  The parameter `text` is empty or not set |  
| 400 | 1108  |  invalid_param  |  The parameter `scheduledDate` is not a valid date |  
| 400 | 1109  |  invalid_param  |  The parameter `dlrCallbackUrl` is not a valid URL |  
| 400 | 1111  |  invalid_param  |  Idempotency Id provided is not a valid UUID (v1-v5) |  
| 400 | 1112  |  invalid_param  |  The shortlink/attachment ID provided for tracking is invalid or not found |  
| 400 | 1116  |  invalid_param  |  The scheduled date is in the past |  
| 400 | 1103  |  invalid_param  |  The phone numbers array is too big (max. allowed: 25000 numbers) |  
| 403 | 1119  |  no_coverage  |  No coverage or restricted destination |  
| 400 | 1113  |  insufficient_credit  |  Insufficient credit |  
| 400 | 1114  |  insufficient_credit  |  Credit limit reached. To increase the credit limit, please contact your account manager |  
| 400 | 1124  |  invalid_param  |  The parameter `ttl` is not a number |  
| 400 | 1125  |  invalid_param  |  Min value for `ttl` is 300 seconds |  
| 400 | 1134  |  invalid_param  |  Max value for `ttl` is 1209600 seconds (14 days) |  
| 400 | 1120  |  invalid_param  |  The parameter `strategy` is empty or not set |  
| 400 | 1121  |  invalid_param  |  The parameter `strategy` must have at least two channels |  
| 400 | 1122  |  invalid_param  |  The parameter `strategy` must have channel `sms` as last element |  
| 400 | 1129  |  invalid_param  |  The parameter `strategy` contains duplicate channels |  
| 400 | 1123  |  invalid_param  |  The parameter `channel` is not valid. Allowed values: |  
| 403 | 1131  |  access_denied  |  The strategy contains channels that are not active: |  
| 400 | 1126  |  invalid_param  |  The parameter `templateId` is not set |  
| 400 | 1127  |  invalid_param  |  The parameter `templateId` is not valid |  
| 400 | 1128  |  invalid_param  |  The template ID provided is not a valid template |  
| 403 | 1132  |  access_denied  |  The template ID provided is not approved |  
| 403 | 1133  |  access_denied  |  The template ID provided is not locked |  
| 400 | 1130  |  insufficient_credit  |  Insufficient credit for failover sending |

### Example

```php
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

$send_multichannel_campaign_request = [
    'groups' => [16, 18],
    'from' => 'InfoText',
    "strategy" => [
        [
            'channel' => 'viber',
            'templateId' => 15,
        ],
        [
            'channel' => 'whatsapp',
            'templateId' => 19,
        ],
        [
            'channel' => 'sms',
            'text' => 'This is the last failover text message',
        ],
    ],
    'ttl' => 300,
];

try {
    $result = $smscx->sendMultichannelCampaign($send_multichannel_campaign_request);
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
    echo 'Exception when calling MultichannelApi->sendMultichannelCampaign: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **send_multichannel_campaign_request** | [**\Smscx\Client\Model\SendMultichannelCampaignRequest**](../Model/SendMultichannelCampaignRequest.md)|  | required |

### Return type

[**\Smscx\Client\Model\SendMultichannelCampaignResponse**](../Model/SendMultichannelCampaignResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `sendMultichannelMessage()`<span>💰</span>

```php
sendMultichannelMessage($send_multichannel_message_request): \Smscx\Client\Model\SendMultichannelMessageResponse
```

**Send Multichannel message**

*Note: This method incurs costs*

Sends Multichannel message to a single phone number or to a list of phone numbers.    This endpoint was designed to handle big data objects (up to 25.000 Multichannel messages in one request).    

> Note: This endpoint accepts idempotent requests by providing an additional `idempotencyId` parameter in body with a unique value generated by the client of type UUID v1-v5. To confirm that the server understood the request, the response will contain the header `X-Idempotency-Id` with your unique value.  By using idempotency you can retry requests in case of network error or server not responding in time, without accidentally performing the same operation twice and have a guarantee of not being billed twice.       

### Errors for POST `/multichannel`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 400 | 1104  |  invalid_param  | The parameter `to` is empty or not set |  
| 400 | 1105  |  invalid_param  |  The parameter `from` is empty or not set |  
| 400 | 1106  |  invalid_param  |  The parameter `from` is not valid (min 3, max 11 characters) |  
| 400 | 1107  |  invalid_param  |  The parameter `text` is empty or not set |  
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
| 400 | 1130  |  insufficient_credit  |  Insufficient credit for failover sending |  
| 400 | 1124  |  invalid_param  |  The parameter `ttl` is not a number |  
| 400 | 1125  |  invalid_param  |  Min value for `ttl` is 300 seconds |  
| 400 | 1134  |  invalid_param  |  Max value for `ttl` is 1209600 seconds (14 days) |  
| 400 | 1120  |  invalid_param  |  The parameter `strategy` is empty or not set |  
| 400 | 1121  |  invalid_param  |  The parameter `strategy` must have at least two channels |  
| 400 | 1122  |  invalid_param  |  The parameter `strategy` must have channel `sms` as last element |  
| 400 | 1129  |  invalid_param  |  The parameter `strategy` contains duplicate channels |  
| 400 | 1123  |  invalid_param  |  The parameter `channel` is not valid. Allowed values: |  
| 403 | 1131  |  access_denied  |  The strategy contains channels that are not active: |  
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

$smscx = new Smscx\Client\Api\MultichannelApi(
    new GuzzleHttp\Client(),
    $config
);

$send_multichannel_message_request = [
    'to' => ['+316124693xx','+34612934161','+3361611862','+34612934161','+447400790504','+4915123438636','+3361611862'],
    'from' => 'InfoText',
    "strategy" => [
        [
            'channel' => 'viber',
            'templateId' => 15,
        ],
        [
            'channel' => 'whatsapp',
            'templateId' => 19,
        ],
        [
            'channel' => 'sms',
            'text' => 'This is the last failover text message',
        ],
    ],
    'ttl' => 300,
    'allowInvalid' => true,
];

try {
    $result = $smscx->sendMultichannelMessage($send_multichannel_message_request);
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
    echo 'Exception when calling MultichannelApi->sendMultichannelMessage: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **send_multichannel_message_request** | [**\Smscx\Client\Model\SendMultichannelMessageRequest**](../Model/SendMultichannelMessageRequest.md)|  | required |

### Return type

[**\Smscx\Client\Model\SendMultichannelMessageResponse**](../Model/SendMultichannelMessageResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
