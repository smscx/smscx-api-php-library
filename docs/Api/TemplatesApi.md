# Smscx\Client\Api\TemplatesApi


| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createTemplate()**](TemplatesApi.md#createTemplate) | **POST** /templates | Create template |
| [**deleteTemplate()**](TemplatesApi.md#deleteTemplate) | **DELETE** /templates/{templateId} | Delete template |
| [**getTemplate()**](TemplatesApi.md#getTemplate) | **GET** /templates/{templateId} | Get template |
| [**getTemplatesList()**](TemplatesApi.md#getTemplatesList) | **GET** /templates | Get templates list |
| [**updateTemplate()**](TemplatesApi.md#updateTemplate) | **PATCH** /templates/{templateId} | Update template |


## `createTemplate()`

```php
createTemplate($templates_new_request): \Smscx\Client\Model\TemplatesNewResponse
```

**Create template**

Creates a new template.    

### Errors for POST `/templates`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 400 |  1801  |  invalid_param  |  The text message is empty or parameter `text` not set |  
| 400 |  1802  |  invalid_param  |  The parameter `text` is invalid |  
| 400 | 1803  |  invalid_param  |  The name provided is invalid (min 3, max 100 characters) |  
| 400 | 1806  |  invalid_param  |  The parameter `channel` is not valid. Allowed values: |  
| 400 | 1805  |  duplicate_value  |  You already have a template with this name  |    
| 400 | 1811  |  invalid_param  |  Text message too long (max 1000 characters)  |    
| 400 | 1808  |  invalid_param  |  Button caption is too long (min 1, max. 30 characters)  |    
| 400 | 1809  |  invalid_param  |  Invalid target URL |  
| 400 | 1810  |  invalid_param  |  Invalid image URL  |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\TemplatesApi(
    new GuzzleHttp\Client(),
    $config
);

$templates_new_request = [
    'name' => 'Summer Sale 2022',
    'text' => 'Redeem this voucher in the next 30 days to get a 30% discount off all Summer Fashion {{shortlink:xSgW}}',
];

try {
    $result = $smscx->createTemplate($templates_new_request);
    print_r($result);
    // $result->getInfo()->getId();
} catch (Smscx\Client\Exception\DuplicateValueException $e) {
    //Code for duplicate value    
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling TemplatesApi->createTemplate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **templates_new_request** | [**\Smscx\Client\Model\TemplatesNewRequest**](../Model/TemplatesNewRequest.md)|  | required |

### Return type

[**\Smscx\Client\Model\TemplatesNewResponse**](../Model/TemplatesNewResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteTemplate()`

```php
deleteTemplate($template_id): \Smscx\Client\Model\TemplatesDeleteResponse
```

**Delete template**

Deletes a template if a valid identifier was provided.    

### Errors for DELETE `/templates/{templateId}`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 404 | 1800  |  not_found  |  Template ID not found |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\TemplatesApi(
    new GuzzleHttp\Client(),
    $config
);

$template_id = 39774;

try {
    $result = $smscx->deleteTemplate($template_id);
    print_r($result);
    // $result->getInfo()->getId();
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Template ID not found    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling TemplatesApi->deleteTemplate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **template_id** | **int**| Identifier of the template | required |

### Return type

[**\Smscx\Client\Model\TemplatesDeleteResponse**](../Model/TemplatesDeleteResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getTemplate()`

```php
getTemplate($template_id): \Smscx\Client\Model\TemplateDetailsResponse
```

**Get template**

Retrieves the details of a template if a valid identifier was provided.    

### Errors for GET `/templates/{templateId}`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 404 | 1800  |  not_found  |  Template ID not found |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\TemplatesApi(
    new GuzzleHttp\Client(),
    $config
);

$template_id = 39774;

try {
    $result = $smscx->getTemplate($template_id);
    print_r($result);
    foreach ($result->getData() as $k => $v) {
        // $v->getId();
        // $v->getName();
        // $v->getText();
        // $v->getChannel();
        // $v->getType();
        // $v->getRichMedia();
        // $v->getCreatedAt();
        // $v->getApproved();
        // $v->getLocked();
    }    
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Template ID not found    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling TemplatesApi->getTemplate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **template_id** | **int**| Identifier of the template | required |

### Return type

[**\Smscx\Client\Model\TemplateDetailsResponse**](../Model/TemplateDetailsResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getTemplatesList()`

```php
getTemplatesList(): \Smscx\Client\Model\TemplatesListResponse
```

**Get templates list**

Retrieves the list of existing templates. The templates are returned sorted by creation date, with the most recent templates appearing first.

If no templates are available, an empty data object is returned.

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\TemplatesApi(
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $smscx->getTemplatesList();
    print_r($result);
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling TemplatesApi->getTemplatesList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\Smscx\Client\Model\TemplatesListResponse**](../Model/TemplatesListResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateTemplate()`

```php
updateTemplate($template_id, $templates_update_request): \Smscx\Client\Model\TemplatesUpdateResponse
```

**Update template**

Updates the specified template by setting the values of the parameters passed. Parameters not provided in the request will be left unchanged.    Returns HTTP `204 No content` if the parameters provided did not update the template because the data was already the same.    

### Errors for PATCH `/templates/{templateId}`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 404 | 1800  |  not_found  |  Template ID not found |  
| 400 | 1802  |  invalid_param  |  The parameter `text` is invalid |  
| 400 | 1803  |  invalid_param  |  The name provided is invalid (min 3, max 100 characters) |  
| 400 | 1804  |  invalid_param  |  At least one parameter required (name, text) |  
| 400 | 1811  |  invalid_param  |  Text message too long (max 1000 characters) |  
| 403 | 1812  |  access_denied  |  Template is locked for editing |  
| 400 | 1810  |  invalid_param  |  Invalid image URL |  
| 400 | 1808  |  invalid_param  |  Button caption is too long (min 1, max. 30 characters) |  
| 400 | 1809  |  invalid_param  |  Invalid target URL |  
| 400 | 1805  |  duplicate_value  |  You already have a template with this name |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\TemplatesApi(
    new GuzzleHttp\Client(),
    $config
);

$template_id = 39774;
$templates_update_request = [
    'name' => 'My new template name',
    'text' => 'My new template text.',
];

try {
    $result = $smscx->updateTemplate($template_id, $templates_update_request);
    print_r($result);
    // $result->getInfo()->getId();
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Template ID not found    
} catch (Smscx\Client\Exception\AccessDeniedException $e) {
    //Code for access denied - template is locked for editing    
} catch (Smscx\Client\Exception\DuplicateValueException $e) {
    //Code for duplicate value    
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling TemplatesApi->updateTemplate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **template_id** | **int**| Identifier of the template | required |
| **templates_update_request** | [**\Smscx\Client\Model\TemplatesUpdateRequest**](../Model/TemplatesUpdateRequest.md)|  | required |

### Return type

[**\Smscx\Client\Model\TemplatesUpdateResponse**](../Model/TemplatesUpdateResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
