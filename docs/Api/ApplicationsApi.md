# Smscx\Client\Api\ApplicationsApi


| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getApplicationSettings()**](ApplicationsApi.md#getApplicationSettings) | **GET** /applications/{applicationId} | Get application settings |
| [**getApplicationsList()**](ApplicationsApi.md#getApplicationsList) | **GET** /applications | Get applications list |
| [**getScopes()**](ApplicationsApi.md#getScopes) | **GET** /applications/scopes | Get scopes |


## `getApplicationSettings()`

```php
getApplicationSettings($application_id): \Smscx\Client\Model\ApplicationSettingsResponse
```

**Get application settings**

Retrieves the settings of an application if a valid identifier was provided. The method return the settings for all the scopes.

### Errors for GET `/applications/{applicationId}`    
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 404 | 1500  |  not_found  | Application ID not found |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\ApplicationsApi(
    new GuzzleHttp\Client(),
    $config
);

$application_id = '7873310555ea4ee972518ae9559f276707c77fab';

try {
    $result = $smscx->getApplicationSettings($application_id);
    print_r($result);
    // $result->getName();
    // $result->getScopes();
    // $result->getTokenExpiration();
    // $result->getSettings();
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Application ID not found
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling ApplicationsApi->getApplicationSettings: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **application_id** | **string**| Identifier of the application id | required |

### Return type

[**\Smscx\Client\Model\ApplicationSettingsResponse**](../Model/ApplicationSettingsResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getApplicationsList()`

```php
getApplicationsList(): \Smscx\Client\Model\ApplicationsListResponse
```

**Get applications list**

Retrieves the list of existing applications. The applications are returned sorted by creation date, with the most recent applications appearing first. If no applications are available, an empty data object is returned.

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\ApplicationsApi(
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $smscx->getApplicationsList();
    print_r($result);
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling ApplicationsApi->getApplicationsList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\Smscx\Client\Model\ApplicationsListResponse**](../Model/ApplicationsListResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getScopes()`

```php
getScopes(): string[]
```

**Get scopes**

Retrieves the list of available scopes for the API.

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\ApplicationsApi(
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $smscx->getScopes();
    print_r($result); // eg. ['sms', 'groups', 'templates', 'viber', 'whatsapp']
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling ApplicationsApi->getScopes: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

**string[]**

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
