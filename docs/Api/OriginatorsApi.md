# Smscx\Client\Api\OriginatorsApi


| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createOriginator()**](OriginatorsApi.md#createOriginator) | **POST** /originators | Create new originator |
| [**deleteOriginator()**](OriginatorsApi.md#deleteOriginator) | **DELETE** /originators/{originatorId} | Delete originator |
| [**getOriginatorsList()**](OriginatorsApi.md#getOriginatorsList) | **GET** /originators | Get originators list |


## `createOriginator()`

```php
createOriginator($originator): \Smscx\Client\Model\OriginatorNewResponse
```

**Create new originator**

Creates and submits an originator for approval.    

### Errors for POST `/originators`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 400 | 1301  |  invalid_param  |  The originator is empty or parameter `originator` not set |  
| 400 | 1303  |  invalid_param  |  The parameter `originator` can contain only letters and numbers |  
| 400 | 1304  |  invalid_param  |  The alphanumeric originator provided is invalid (min 3, max 11 characters) |  
| 400 | 1305  |  invalid_param  |  The numeric originator provided is invalid (min 3, max 15 characters) |  
| 400 | 1306  |  duplicate_value  |  Originator already exists |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\OriginatorsApi(
    new GuzzleHttp\Client(),
    $config
);

$originator = 'MyCompany';

try {
    $result = $smscx->createOriginator($originator);
    print_r($result);
    // $result->getInfo->getId();
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\DuplicateValueException $e) {
    //Code for duplicate value    
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling OriginatorsApi->createOriginator: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **originator** | string | The sender ID you want to create | required |

### Return type

[**\Smscx\Client\Model\OriginatorNewResponse**](../Model/OriginatorNewResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteOriginator()`

```php
deleteOriginator($originator_id): \Smscx\Client\Model\OriginatorNewResponse
```

**Delete originator**

Deletes an originator if a valid identifier was provided.    

### Errors for DELETE `/originators/{originatorId}`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 404 | 1300  |  not_found  |  Originator ID not found |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\OriginatorsApi(
    new GuzzleHttp\Client(),
    $config
);

$originator_id = 1388;

try {
    $result = $smscx->deleteOriginator($originator_id);
    print_r($result);
    // $result->getInfo()->getId();
    // $result->getInfo()->getOriginator();
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Originator ID not found    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling OriginatorsApi->deleteOriginator: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **originator_id** | **int**| Identifier of the originator | required |

### Return type

[**\Smscx\Client\Model\OriginatorNewResponse**](../Model/OriginatorNewResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getOriginatorsList()`

```php
getOriginatorsList(): \Smscx\Client\Model\OriginatorsListResponse
```

**Get originators list**

Retrieves the list of existing originators (sender ids). The originators are returned sorted by creation date, with the most recent group appearing first.    

If no originators are available, an empty data object is returned.

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\OriginatorsApi(
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $smscx->getOriginatorsList();
    print_r($result);
    foreach ($result->getData() as $k => $v) {
        // $v->getId();
        // $v->getOriginator();
        // $v->getTwoWay();
        // $v->getIsDefault();
        // $v->getApproved();
        // $v->getCreatedAd();
    }
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling OriginatorsApi->getOriginatorsList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\Smscx\Client\Model\OriginatorsListResponse**](../Model/OriginatorsListResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
