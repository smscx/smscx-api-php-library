# Smscx\Client\Api\WhatsappApi


| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**deleteScheduledWhatsappMessage()**](WhatsappApi.md#deleteScheduledWhatsappMessage) | **DELETE** /whatsapp/scheduled/{msgId} | Delete scheduled Whatsapp message |
| [**estimateWhatsappMessage()**](WhatsappApi.md#estimateWhatsappMessage) | **POST** /whatsapp/estimate | Estimate Whatsapp message |
| [**sendWhatsappMessage()**](WhatsappApi.md#sendWhatsappMessage) 💰 | **POST** /whatsapp | Send Whatsapp message |


## `deleteScheduledWhatsappMessage()`

```php
deleteScheduledWhatsappMessage($msg_id): \Smscx\Client\Model\DeleteScheduledMsg
```

**Delete scheduled Whatsapp message**

Delete a scheduled Whatsapp message by providing a valid identifier (`msgId`).    

The cost of the deleted scheduled Whatsapp message will be returned to the balance of the account.    

### Errors for DELETE `/whatsapp/scheduled/{msgId}`  
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

$smscx = new Smscx\Client\Api\WhatsappApi(
    new GuzzleHttp\Client(),
    $config
);

// Identifier of a scheduled Whatsapp message
$msg_id = '3328fe13-2b99-4282-b62e-d891f5e452a8';

try {
    $result = $smscx->deleteScheduledWhatsappMessage($msg_id);
    print_r($result);
    // $result->getInfo()->getMsgId();
    // $result->getInfo()->getParts();
    // $result->getInfo()->getCreditReturned();
    // $result->getInfo()->getChannel();
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\ChannelNotActiveException $e) {
    //Code for Channel not active
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Message ID not found    
} catch (Smscx\Client\Exception\AccessDeniedException $e) {
    //Cannot delete a message that was already sent
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling WhatsappApi->deleteScheduledWhatsappMessage: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **msg_id** | **string**| Identifier of a scheduled Whatsapp message | required |

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

## `estimateWhatsappMessage()`

```php
estimateWhatsappMessage($send_whatsapp_message_request_estimate): \Smscx\Client\Model\SendWhatsappMessageResponse
```

**Estimate Whatsapp message**

Estimate the cost of sending a Whatsapp message. 

### Errors for POST `/whatsapp/estimate`  
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

$smscx = new Smscx\Client\Api\WhatsappApi(
    new GuzzleHttp\Client(),
    $config
);

$send_whatsapp_message_request_estimate = [
    'to' => ['+316124698xx', '+316124693xx'],
    'from' => 'InfoText',
    'templateId' => 19,
    'allowInvalid' => true,
];

try {
    $result = $smscx->estimateWhatsappMessage($send_whatsapp_message_request_estimate);
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
    echo 'Exception when calling WhatsappApi->estimateWhatsappMessage: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **send_whatsapp_message_request_estimate** | [**\Smscx\Client\Model\SendWhatsappMessageRequestEstimate**](../Model/SendWhatsappMessageRequestEstimate.md)|  | required |

### Return type

[**\Smscx\Client\Model\SendWhatsappMessageResponse**](../Model/SendWhatsappMessageResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `sendWhatsappMessage()`<span>💰</span>

```php
sendWhatsappMessage($send_whatsapp_message_request): \Smscx\Client\Model\SendWhatsappMessageResponse
```

**Send Whatsapp message**

*Note: This method incurs costs*

Sends Whatsapp message to a single phone number.    

> Note: This endpoint accepts idempotent requests by providing an additional `idempotencyId` parameter in body with a unique value generated by the client of type UUID v1-v5. To confirm that the server understood the request, the response will contain the header `X-Idempotency-Id` with your unique value.  By using idempotency you can retry requests in case of network error or server not responding in time, without accidentally performing the same operation twice and have a guarantee of not being billed twice.     

### Errors for POST `/whatsapp`  
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

$smscx = new Smscx\Client\Api\WhatsappApi(
    new GuzzleHttp\Client(),
    $config
);

$send_whatsapp_message_request = [
    'to' => '+316124698xx',
    'from' => 'InfoText',
    'templateId' => 19,
];

try {
    $result = $smscx->sendWhatsappMessage($send_whatsapp_message_request);
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
    echo 'Exception when calling WhatsappApi->sendWhatsappMessage: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **send_whatsapp_message_request** | [**\Smscx\Client\Model\SendWhatsappMessageRequest**](../Model/SendWhatsappMessageRequest.md)|  | required |

### Return type

[**\Smscx\Client\Model\SendWhatsappMessageResponse**](../Model/SendWhatsappMessageResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
