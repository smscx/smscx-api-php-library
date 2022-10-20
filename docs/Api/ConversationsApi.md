# Smscx\Client\Api\ConversationsApi


| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getConversation()**](ConversationsApi.md#getConversation) | **GET** /conversations/{conversationId} | Get conversation |
| [**getConverstionsList()**](ConversationsApi.md#getConverstionsList) | **GET** /conversations | Get conversations list |
| [**markConversationAsRead()**](ConversationsApi.md#markConversationAsRead) | **GET** /conversations/{conversationId}/read | Mark conversation as read |
| [**sendConversationReplySms()**](ConversationsApi.md#sendConversationReplySms) 💰 | **POST** /conversations/{conversationId}/sms | Send conversation reply via SMS |
| [**sendConversationReplyViber()**](ConversationsApi.md#sendConversationReplyViber) 💰 | **POST** /conversations/{conversationId}/viber | Send conversation reply via Viber |
| [**sendConversationReplyWhatsapp()**](ConversationsApi.md#sendConversationReplyWhatsapp) 💰 | **POST** /conversations/{conversationId}/whatsapp | Send conversation reply via Whatsapp |


## `getConversation()`

```php
getConversation($conversation_id): \Smscx\Client\Model\ConversationDetailsResponse
```

**Get conversation**

Retrieves the details of a conversation if a valid identifier was provided.    

### Errors for GET `/conversations/{conversationId}`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 404 | 1180  |  not_found  | Conversation ID not found |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\ConversationsApi(
    new GuzzleHttp\Client(),
    $config
);

$conversation_id = 'c38fa60d-ce8f-4918-8b9d-d991bc44cb73';

try {
    $result = $smscx->getConversation($conversation_id);
    print_r($result);
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Conversation ID not found    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling ConversationsApi->getConversation: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **conversation_id** | **string**| Identifier of the conversation | required |

### Return type

[**\Smscx\Client\Model\ConversationDetailsResponse**](../Model/ConversationDetailsResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getConverstionsList()`

```php
getConverstionsList(): \Smscx\Client\Model\ConversationsListResponse
```

**Get conversations list**

Retrieves the list of existing conversations. The list is sorted by last reply date, with the most recent reply appearing first. If no conversations are available, an empty data object is returned.

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\ConversationsApi(
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $smscx->getConverstionsList();
    print_r($result);
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling ConversationsApi->getConverstionsList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\Smscx\Client\Model\ConversationsListResponse**](../Model/ConversationsListResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `markConversationAsRead()`

```php
markConversationAsRead($conversation_id): \Smscx\Client\Model\ConversationReadResponse
```

**Mark conversation as read**

Marks a conversation as read    

### Errors for GET `/conversations/{conversationId}/read`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 404 | 1180  |  not_found  | Conversation ID not found |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\ConversationsApi(
    new GuzzleHttp\Client(),
    $config
);

$conversation_id = 'c38fa60d-ce8f-4918-8b9d-d991bc44cb73';

try {
    $result = $smscx->markConversationAsRead($conversation_id);
    print_r($result);
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Conversation ID not found    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling ConversationsApi->markConversationAsRead: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **conversation_id** | **string**| Identifier of the conversation | required |

### Return type

[**\Smscx\Client\Model\ConversationReadResponse**](../Model/ConversationReadResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `sendConversationReplySms()`<span>💰</span>

```php
sendConversationReplySms($conversation_id, $conversation_reply_sms_request): \Smscx\Client\Model\ConversationReplySmsResponse
```

**Send conversation reply via SMS**

*Note: This method incurs costs*

Sends a reply to a conversation using sms channel.    

### Errors for POST `/conversations/{conversationId}/sms`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 404 | 1180  |  not_found  | Conversation ID not found |  
| 400 | 1801  |  invalid_param  | The text message is empty or parameter `text` not set |  
| 400 | 1802  |  invalid_param  | The parameter `text` is invalid |  
| 400 | 1111  |  invalid_param  |  Idempotency Id provided is not a valid UUID (v1-v5) |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\ConversationsApi(
    new GuzzleHttp\Client(),
    $config
);

$conversation_id = 'c38fa60d-ce8f-4918-8b9d-d991bc44cb73';
$conversation_reply_sms_request = [
    'text' => 'Text message with reply',
];

try {
    $result = $smscx->sendConversationReplySms($conversation_id, $conversation_reply_sms_request);
    print_r($result);
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Conversation ID not found    
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling ConversationsApi->sendConversationReplySms: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **conversation_id** | **string**| Identifier of the conversation | required |
| **conversation_reply_sms_request** | [**\Smscx\Client\Model\ConversationReplySmsRequest**](../Model/ConversationReplySmsRequest.md)|  | required |

### Return type

[**\Smscx\Client\Model\ConversationReplySmsResponse**](../Model/ConversationReplySmsResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `sendConversationReplyViber()`<span>💰</span>

```php
sendConversationReplyViber($conversation_id, $conversation_reply_viber_request): \Smscx\Client\Model\ConversationReplyViberRespone
```

**Send conversation reply via Viber**

*Note: This method incurs costs*

Sends a reply to a conversation using viber channel.    

### Errors for POST `/conversations/{conversationId}/viber`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 404 | 1180  |  not_found  | Conversation ID not found |  
| 403 | 1181  |  access_denied  | Cannot reply with channel Viber. More than 24 hours since user reply |  
| 400 | 1801  |  invalid_param  | The text message is empty or parameter `text` not set |  
| 400 | 1802  |  invalid_param  | The parameter `text` is invalid |  
| 400 | 1811  |  invalid_param  | Text message too long (max 1000 characters) |  
| 400 | 1111  |  invalid_param  |  Idempotency Id provided is not a valid UUID (v1-v5) |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\ConversationsApi(
    new GuzzleHttp\Client(),
    $config
);

$conversation_id = 'c38fa60d-ce8f-4918-8b9d-d991bc44cb73';
$conversation_reply_viber_request = [
    'text' => 'Please give us more details',
    'richMedia' => [],
];

try {
    $result = $smscx->sendConversationReplyViber($conversation_id, $conversation_reply_viber_request);
    print_r($result);
} catch (Smscx\Client\Exception\ChannelNotActiveException $e) {
    //Code for Channel not active
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Conversation ID not found    
} catch (Smscx\Client\Exception\AccessDeniedException $e) {
    //Code for access denied: cannot reply to Viber after more than 24 hours after client reply    
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling ConversationsApi->sendConversationReplySms: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **conversation_id** | **string**| Identifier of the conversation | required |
| **conversation_reply_viber_request** | [**\Smscx\Client\Model\ConversationReplyViberRequest**](../Model/ConversationReplyViberRequest.md)|  | required |

### Return type

[**\Smscx\Client\Model\ConversationReplyViberRespone**](../Model/ConversationReplyViberRespone.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `sendConversationReplyWhatsapp()`<span>💰</span>

```php
sendConversationReplyWhatsapp($conversation_id, $conversation_reply_whatsapp_request): \Smscx\Client\Model\ConversationReplyWhatsappResponse
```

**Send conversation reply via Whatsapp**

*Note: This method incurs costs*

Sends a reply to a conversation using whatsapp channel.    

### Errors for POST `/conversations/{conversationId}/whatsapp`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 404 | 1180  |  not_found  | Conversation ID not found |  
| 403 | 1182  |  access_denied  | Cannot reply with channel Whatsapp. More than 24 hours since user reply |  
| 400 | 1801  |  invalid_param  | The text message is empty or parameter `text` not set |  
| 400 | 1802  |  invalid_param  | The parameter `text` is invalid |  
| 400 | 1811  |  invalid_param  | Text message too long (max 1000 characters) |  
| 400 | 1111  |  invalid_param  | Idempotency Id provided is not a valid UUID (v1-v5) |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\ConversationsApi(
    new GuzzleHttp\Client(),
    $config
);

$conversation_id = 'c38fa60d-ce8f-4918-8b9d-d991bc44cb73';
$conversation_reply_whatsapp_request = [
    'text' => 'Please give us more details',
    'richMedia' => [],
];

try {
    $result = $smscx->sendConversationReplyWhatsapp($conversation_id, $conversation_reply_whatsapp_request);
    print_r($result);
} catch (Smscx\Client\Exception\ChannelNotActiveException $e) {
    //Code for Channel not active
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Conversation ID not found    
} catch (Smscx\Client\Exception\AccessDeniedException $e) {
    //Code for access denied: cannot reply to Whatsapp after more than 24 hours after client reply    
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling ConversationsApi->sendConversationReplySms: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **conversation_id** | **string**| Identifier of the conversation | required |
| **conversation_reply_whatsapp_request** | [**\Smscx\Client\Model\ConversationReplyWhatsappRequest**](../Model/ConversationReplyWhatsappRequest.md)|  | required |

### Return type

[**\Smscx\Client\Model\ConversationReplyWhatsappResponse**](../Model/ConversationReplyWhatsappResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
