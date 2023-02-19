# Smscx\Client\Api\SmsApi


| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**deleteScheduledSms()**](SmsApi.md#deleteScheduledSms) | **DELETE** /sms/scheduled/{msgId} | Delete scheduled SMS |
| [**deleteScheduledSmsCampaign()**](SmsApi.md#deleteScheduledSmsCampaign) | **DELETE** /sms/scheduled/campaign/{campaignId} | Delete scheduled SMS campaign |
| [**estimateSms()**](SmsApi.md#estimateSms) | **POST** /sms/estimate | Estimate new SMS |
| [**estimateSmsCampaign()**](SmsApi.md#estimateSmsCampaign) | **POST** /sms/campaign/estimate | Estimate SMS campaign |
| [**sendSms()**](SmsApi.md#sendSms) 💰 | **POST** /sms | Send SMS |
| [**sendSmsCampaign()**](SmsApi.md#sendSmsCampaign) 💰 | **POST** /sms/campaign | Send SMS campaign |


## `deleteScheduledSms()`

```php
deleteScheduledSms($msg_id): \Smscx\Client\Model\DeleteScheduledMsg
```

**Delete scheduled SMS**

Delete a scheduled SMS by providing a valid identifier (`msgId`).    

The cost of the deleted scheduled SMS will be returned to the balance of the account.    

### Errors for DELETE `/sms/scheduled/{msgId}`  
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

$smscx = new Smscx\Client\Api\SmsApi(
    new GuzzleHttp\Client(),
    $config
);
$msg_id = '3328fe13-2b99-4282-b62e-d891f5e452a8';

try {
    $result = $smscx->deleteScheduledSms($msg_id);
    print_r($result);
    // $result->getInfo()->getMsgId();
    // $result->getInfo()->getParts();
    // $result->getInfo()->getCreditReturned();
    // $result->getInfo()->getChannel();
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Message ID not found    
} catch (Smscx\Client\Exception\AccessDeniedException $e) {
    //Cannot delete a message that was already sent
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling SmsApi->deleteScheduledSms: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **msg_id** | **string**| Identifier of a scheduled message | required |

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

## `deleteScheduledSmsCampaign()`

```php
deleteScheduledSmsCampaign($campaign_id): \Smscx\Client\Model\DeleteScheduledCampaign
```

**Delete scheduled SMS campaign**

Delete a scheduled SMS campaign by providing a valid identifier (`campaignId`).    

The cost of the deleted scheduled SMS campaign will be returned to the balance of the account.    

If part of the SMS campaign has already started, only scheduled messages will be deleted. Messages already sent cannot be deleted.    

### Errors for DELETE `/sms/scheduled/campaign/{campaignId}`  
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
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Campaign ID not found    
} catch (Smscx\Client\Exception\AccessDeniedException $e) {
    //Cannot delete a campaign that has all the messages sent
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling SmsApi->deleteScheduledSmsCampaign: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **campaign_id** | **string**| Identifier of a scheduled SMS campaign | required |

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

## `estimateSms()`

```php
estimateSms($send_sms_request_estimate): \Smscx\Client\Model\SendSmsMessageResponse
```

**Estimate new SMS**

Estimate the cost of sending a SMS message.    

### Errors for POST `/sms/estimate`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 400 | 1104  |  invalid_param  | The parameter `to` is empty or not set |  
| 400 | 1105  |  invalid_param  |  The parameter `from` is empty or not set |  
| 400 | 1106  |  invalid_param  |  The parameter `from` is not valid (min 3, max 15 characters) |  
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
| 400 | 1110 | invalid_param | Invalid alphabet. Must be one of: `NONE`, `NON_GSM`, `RUSSIAN_CYRILLIC`, `BULGARIAN_CYRILLIC`, `UKRAINIAN_CYRILLIC`, `MACEDONIAN_CYRILLIC`, `BELARUSIAN_CYRILLIC`, `SERBIAN_CYRILLIC`, `POLISH`, `ROMANIAN`, `TURKISH`, `GREEK` |  
| 400 | 1135 | invalid_param | The parameter `transliteration` should be an object |   
| 400 | 1503 | invalid_param | The parameter `removeEmojis` is not boolean (true or false) |  
| 400 | 1136  |  invalid_param  |  Invalid number of characters for the placeholder {{numbers}} |  
| 400 | 1136  |  invalid_param  |  Invalid number of characters for the placeholder {{letters}} |  
| 400 | 1136  |  invalid_param  |  Invalid number of characters for the placeholder {{alphanumeric}} |  
| 400 | 1137  |  invalid_param  |  Number of characters for placeholders can be between 1 and 20 |

### Example

```php
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

$send_sms_request_estimate = [
    'to' => ['+316124698xx', '+316124693xx'],
    'from' => 'InfoText',
    'text' => 'This is a text message',
    'transliteration' => [
        'alphabet' => 'NON_GSM',
        'removeEmojis' => true,
    ],
    'allowInvalid' => true,
];

try {
    $result = $smscx->estimateSms($send_sms_request_estimate);
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
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\NoCoverageException $e) {
    //Code for No coverage
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\InvalidPhoneNumberException $e) {
    //Code for Invalid phone number    
} catch (Smscx\Client\Exception\InsufficientBalanceException $e) {
    //Code for Insufficient balance
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling SmsApi->estimateSms: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **send_sms_request_estimate** | [**\Smscx\Client\Model\SendSmsRequestEstimate**](../Model/SendSmsRequestEstimate.md)|  | required |

### Return type

[**\Smscx\Client\Model\SendSmsMessageResponse**](../Model/SendSmsMessageResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `estimateSmsCampaign()`

```php
estimateSmsCampaign($send_sms_campaign_request_estimate): \Smscx\Client\Model\SendSmsCampaignResponse
```

**Estimate SMS campaign**

Estimate the cost of sending a SMS message to groups of phone numbers.

### Errors for POST `/sms/campaign/estimate`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 400 | 1101  |  invalid_param  |  The parameter `groups` is empty or not set |  
| 400 | 1140  |  invalid_param  |  Group ID is not a valid group |  
| 400 | 1102  |  invalid_param  |  Group is empty |  
| 400 | 1103  |  invalid_param  |  The phone numbers array is too big (max. allowed: 25000 numbers) |  
| 400 | 1105  |  invalid_param  |  The parameter `from` is empty or not set |  
| 400 | 1106  |  invalid_param  |  The parameter `from` is not valid (min 3, max 15 characters) |  
| 400 | 1107  |  invalid_param  |  The parameter `text` is empty or not set |  
| 400 | 1108  |  invalid_param  |  The parameter `scheduledDate` is not a valid date |  
| 400 | 1109  |  invalid_param  |  The parameter `dlrCallbackUrl` is not a valid URL |  
| 400 | 1112  |  invalid_param  |  The shortlink/attachment ID provided for tracking is invalid or not found |  
| 400 | 1116  |  invalid_param  |  The scheduled date is in the past |  
| 403 | 1119  |  no_coverage  |  No coverage or restricted destination |  
| 400 | 1113  |  insufficient_credit  |  Insufficient credit |  
| 400 | 1114  |  insufficient_credit  |  Credit limit reached. To increase the credit limit, please contact your account manager |  
| 400 | 1110 | invalid_param | Invalid alphabet. Must be one of: `NONE`, `NON_GSM`, `RUSSIAN_CYRILLIC`, `BULGARIAN_CYRILLIC`, `UKRAINIAN_CYRILLIC`, `MACEDONIAN_CYRILLIC`, `BELARUSIAN_CYRILLIC`, `SERBIAN_CYRILLIC`, `POLISH`, `ROMANIAN`, `TURKISH`, `GREEK` |  
| 400 | 1135 | invalid_param | The parameter `transliteration` should be an object |   
| 400 | 1503 | invalid_param | The parameter `removeEmojis` is not boolean (true or false) |  
| 400 | 1136  |  invalid_param  |  Invalid number of characters for the placeholder {{numbers}} |  
| 400 | 1136  |  invalid_param  |  Invalid number of characters for the placeholder {{letters}} |  
| 400 | 1136  |  invalid_param  |  Invalid number of characters for the placeholder {{alphanumeric}} |  
| 400 | 1137  |  invalid_param  |  Number of characters for placeholders can be between 1 and 20 |

### Example

```php
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

$send_sms_campaign_request_estimate = [
    'groups' => [16, 18],
    'from' => 'InfoText',
    'text' => 'Dear {{firstName}} {{lastName, this is an informational message {{optoutLink}}',
    'transliteration' => [
        'alphabet' => 'NON_GSM',
        'removeEmojis' => true,
    ],
];

try {
    $result = $smscx->estimateSmsCampaign($send_sms_campaign_request_estimate);
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
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\NoCoverageException $e) {
    //Code for No coverage
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\InvalidPhoneNumberException $e) {
    //Code for Invalid phone number    
} catch (Smscx\Client\Exception\InsufficientBalanceException $e) {
    //Code for Insufficient balance
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling SmsApi->estimateSmsCampaign: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **send_sms_campaign_request_estimate** | [**\Smscx\Client\Model\SendSmsCampaignRequestEstimate**](../Model/SendSmsCampaignRequestEstimate.md)|  | required |

### Return type

[**\Smscx\Client\Model\SendSmsCampaignResponse**](../Model/SendSmsCampaignResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `sendSms()`<span>💰</span>

```php
sendSms($send_sms_message_request): \Smscx\Client\Model\SendSmsMessageResponse
```

**Send SMS**

*Note: This method incurs costs*

Sends SMS to a single phone number or to a list of phone numbers.    

This endpoint was designed to handle big data objects (up to 25.000 SMS in one request).    

> Note: This endpoint accepts idempotent requests by providing an additional `idempotencyId` parameter in body with a unique value generated by the client of type UUID v1-v5. To confirm that the server understood the request, the response will contain the header `X-Idempotency-Id` with your unique value.  By using idempotency you can retry requests in case of network error or server not responding in time, without accidentally performing the same operation twice and have a guarantee of not being billed twice.     

### Errors for POST `/sms`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 400 | 1103  |  invalid_param  |  The phone numbers array is too big (max. allowed: 25000 numbers) |  
| 400 | 1104  |  invalid_param  | The parameter `to` is empty or not set |  
| 400 | 1105  |  invalid_param  |  The parameter `from` is empty or not set |  
| 400 | 1106  |  invalid_param  |  The parameter `from` is not valid (min 3, max 15 characters) |  
| 400 | 1107  |  invalid_param  |  The parameter `text` is empty or not set |  
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
| 400 | 1110 | invalid_param | Invalid alphabet. Must be one of: `NONE`, `NON_GSM`, `RUSSIAN_CYRILLIC`, `BULGARIAN_CYRILLIC`, `UKRAINIAN_CYRILLIC`, `MACEDONIAN_CYRILLIC`, `BELARUSIAN_CYRILLIC`, `SERBIAN_CYRILLIC`, `POLISH`, `ROMANIAN`, `TURKISH`, `GREEK` |  
| 400 | 1135 | invalid_param | The parameter `transliteration` should be an object |   
| 400 | 1503 | invalid_param | The parameter `removeEmojis` is not boolean (true or false) |  
| 400 | 1136  |  invalid_param  |  Invalid number of characters for the placeholder {{numbers}} |  
| 400 | 1136  |  invalid_param  |  Invalid number of characters for the placeholder {{letters}} |  
| 400 | 1136  |  invalid_param  |  Invalid number of characters for the placeholder {{alphanumeric}} |  
| 400 | 1137  |  invalid_param  |  Number of characters for placeholders can be between 1 and 20 |

### Example

```php
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

$send_sms_message_request = [
    'to' => ['+316124698xx', '+316124693xx'],
    'from' => 'InfoText',
    'text' => 'This is a text message',
    'transliteration' => [
        'alphabet' => 'NON_GSM',
        'removeEmojis' => true,
    ],
    'allowInvalid' => true,
];

try {
    $result = $smscx->sendSms($send_sms_message_request);
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
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\NoCoverageException $e) {
    //Code for No coverage
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\InvalidPhoneNumberException $e) {
    //Code for Invalid phone number    
} catch (Smscx\Client\Exception\InsufficientBalanceException $e) {
    //Code for Insufficient balance
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling SmsApi->sendSms: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **send_sms_message_request** | [**\Smscx\Client\Model\SendSmsMessageRequest**](../Model/SendSmsMessageRequest.md)|  | required |

### Return type

[**\Smscx\Client\Model\SendSmsMessageResponse**](../Model/SendSmsMessageResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `sendSmsCampaign()`<span>💰</span>

```php
sendSmsCampaign($send_sms_campaign_request): \Smscx\Client\Model\SendSmsCampaignResponse
```

**Send SMS campaign**

*Note: This method incurs costs*

Sends SMS to existing group(s) of contacts.    

> Note: This endpoint accepts idempotent requests by providing an additional `idempotencyId` parameter in body with a unique value generated by the client of type UUID v1-v5. To confirm that the server understood the request, the response will contain the header `X-Idempotency-Id` with your unique value.  By using idempotency you can retry requests in case of network error or server not responding in time, without accidentally performing the same operation twice and have a guarantee of not being billed twice.     > We recommend to always use Idempotency ID when sending SMS campaigns      

### Errors for POST `/sms/campaign`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 400 | 1101  |  invalid_param  |  The parameter `groups` is empty or not set |  
| 400 | 1140  |  invalid_param  |  Group ID is not a valid group |  
| 400 | 1102  |  invalid_param  |  Group is empty |  
| 400 | 1103  |  invalid_param  |  The phone numbers array is too big (max. allowed: 25000 numbers) |  
| 400 | 1105  |  invalid_param  |  The parameter `from` is empty or not set |  
| 400 | 1106  |  invalid_param  |  The parameter `from` is not valid (min 3, max 15 characters) |  
| 400 | 1107  |  invalid_param  |  The parameter `text` is empty or not set |  
| 400 | 1108  |  invalid_param  |  The parameter `scheduledDate` is not a valid date |  
| 400 | 1109  |  invalid_param  |  The parameter `dlrCallbackUrl` is not a valid URL |  
| 400 | 1111  |  invalid_param  |  Idempotency Id provided is not a valid UUID (v1-v5) |  
| 400 | 1112  |  invalid_param  |  The shortlink/attachment ID provided for tracking is invalid or not found |  
| 400 | 1116  |  invalid_param  |  The scheduled date is in the past |  
| 403 | 1119  |  no_coverage  |  No coverage or restricted destination |  
| 400 | 1113  |  insufficient_credit  |  Insufficient credit |  
| 400 | 1114  |  insufficient_credit  |  Credit limit reached. To increase the credit limit, please contact your account manager |  
| 400 | 1110 | invalid_param | Invalid alphabet. Must be one of: `NONE`, `NON_GSM`, `RUSSIAN_CYRILLIC`, `BULGARIAN_CYRILLIC`, `UKRAINIAN_CYRILLIC`, `MACEDONIAN_CYRILLIC`, `BELARUSIAN_CYRILLIC`, `SERBIAN_CYRILLIC`, `POLISH`, `ROMANIAN`, `TURKISH`, `GREEK` |  
| 400 | 1135 | invalid_param | The parameter `transliteration` should be an object |   
| 400 | 1503 | invalid_param | The parameter `removeEmojis` is not boolean (true or false) |  
| 400 | 1136  |  invalid_param  |  Invalid number of characters for the placeholder {{numbers}} |  
| 400 | 1136  |  invalid_param  |  Invalid number of characters for the placeholder {{letters}} |  
| 400 | 1136  |  invalid_param  |  Invalid number of characters for the placeholder {{alphanumeric}} |  
| 400 | 1137  |  invalid_param  |  Number of characters for placeholders can be between 1 and 20 |

### Example

```php
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

$send_sms_campaign_request = [
    'groups' => [17, 44],
    'from' => 'InfoText',
    'text' => 'Hi {{firstName}} {{lastName}}. Check out the brochure {{attachment:RytK}} Unsubscribe here: {{optoutLink}}',
    'transliteration' => [
        'alphabet' => 'NON_GSM',
        'removeEmojis' => true,
    ],
];

try {
    $result = $smscx->sendSmsCampaign($send_sms_campaign_request);
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
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\NoCoverageException $e) {
    //Code for No coverage
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\InsufficientBalanceException $e) {
    //Code for Insufficient balance
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling SmsApi->sendSmsCampaign: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **send_sms_campaign_request** | [**\Smscx\Client\Model\SendSmsCampaignRequest**](../Model/SendSmsCampaignRequest.md)|  | required |

### Return type

[**\Smscx\Client\Model\SendSmsCampaignResponse**](../Model/SendSmsCampaignResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
