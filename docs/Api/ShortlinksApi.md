# Smscx\Client\Api\ShortlinksApi


| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createShortlink()**](ShortlinksApi.md#createShortlink) | **POST** /shortlinks | Create shortlink |
| [**deleteShortlink()**](ShortlinksApi.md#deleteShortlink) | **DELETE** /shortlinks/{shortId} | Delete shortlink |
| [**exportShortlinkHitsToCSV()**](ShortlinksApi.md#exportShortlinkHitsToCSV) | **GET** /shortlinks/{shortId}/csv | Export shortlink hits to CSV |
| [**exportShortlinkHitsToXLSX()**](ShortlinksApi.md#exportShortlinkHitsToXLSX) | **GET** /shortlinks/{shortId}/xlsx | Export shortlink hits to XLSX |
| [**getShortlinkHits()**](ShortlinksApi.md#getShortlinkHits) | **GET** /shortlinks/{shortId} | Get shortlink hits |
| [**getShortlinksList()**](ShortlinksApi.md#getShortlinksList) | **GET** /shortlinks | Get shortlinks list |
| [**updateShortlink()**](ShortlinksApi.md#updateShortlink) | **PATCH** /shortlinks/{shortId} | Update shortlink |


## `createShortlink()`

```php
createShortlink($shortlink_new_request): \Smscx\Client\Model\ShortlinkNewResponse
```

**Create shortlink**

Creates a new shortlink.    

### Errors for POST `/shortlinks`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 400 | 1401  |  invalid_param  |  The URL is empty or parameter `url` not set |  
| 400 | 1402  |  invalid_param  |  The URL provided is invalid |  
| 400 | 1404  |  invalid_param  |  The parameter `name` is invalid (min 3, max 25 characters) |  
| 400 | 1405  |  duplicate_id  |  Short ID already exists |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\ShortlinksApi(
    new GuzzleHttp\Client(),
    $config
);

$shortlink_new_request = [
    'name' => 'My Shortlink',
    'url' => 'https://my-long-url.com/this-is-the-page.html',
];

try {
    $result = $smscx->createShortlink($shortlink_new_request);
    print_r($result);
    // $result->getInfo()->getId();
    // $result->getInfo()->getName();
    // $result->getInfo()->getOriginalUrl();
    // $result->getInfo()->getShortUrl();
 catch (Smscx\Client\Exception\DuplicateIdException $e) {
    //Code for duplicate id    
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling ShortlinksApi->createShortlink: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **shortlink_new_request** | [**\Smscx\Client\Model\ShortlinkNewRequest**](../Model/ShortlinkNewRequest.md)|  | required |

### Return type

[**\Smscx\Client\Model\ShortlinkNewResponse**](../Model/ShortlinkNewResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteShortlink()`

```php
deleteShortlink($short_id): \Smscx\Client\Model\ShortlinkDeleteResponse
```

**Delete shortlink**

Deletes a shortlink and all the hits data associated, if a valid identifier was provided.    

### Errors for DELETE `/shortlinks/{shortId}`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 404 | 1400  |  not_found  |  Shortlink ID not found |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\ShortlinksApi(
    new GuzzleHttp\Client(),
    $config
);

$short_id = 'KgTX';

try {
    $result = $smscx->deleteShortlink($short_id);
    print_r($result);
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Shortlink ID not found    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling ShortlinksApi->deleteShortlink: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **short_id** | **string**| Identifier of the shortlink | required |

### Return type

[**\Smscx\Client\Model\ShortlinkDeleteResponse**](../Model/ShortlinkDeleteResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `exportShortlinkHitsToCSV()`

```php
exportShortlinkHitsToCSV($short_id): string
```

**Export shortlink hits to CSV**

Exports the hits details of a shortlink (phone number, device, model, operating system, browser, city, country, etc.) to a CSV file.    If there are no hits for the shortlink, an empty CSV file is returned (with first line headers).    

### Errors for GET `/shortlinks/{shortId}/csv`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 404 | 1400  |  not_found  |  Shortlink ID not found |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\ShortlinksApi(
    new GuzzleHttp\Client(),
    $config
);

$short_id = 'KgTX';

try {
    $result = $smscx->exportShortlinkHitsToCSV($short_id);
    print_r($result);
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Shortlink ID not found    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling ShortlinksApi->exportShortlinkHitsToCSV: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **short_id** | **string**| Identifier of the shortlink | required |

### Return type

**string**

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/csv`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `exportShortlinkHitsToXLSX()`

```php
exportShortlinkHitsToXLSX($short_id): \SplFileObject
```

**Export shortlink hits to XLSX**

Exports the hits details of a shortlink (phone number, device, model, operating system, browser, city, country, etc.) to a XLSX file (Excel).    If there are no hits for the shortlink, an empty XLSX file is returned (with first line headers).    

### Errors for GET `/shortlinks/{shortId}/xlsx`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 404 | 1400  |  not_found  |  Shortlink ID not found |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\ShortlinksApi(
    new GuzzleHttp\Client(),
    $config
);
$short_id = 'KgTX';

try {
    $result = $smscx->exportShortlinkHitsToXLSX($short_id);
    print_r($result);
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Shortlink ID not found    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling ShortlinksApi->exportShortlinkHitsToXLSX: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **short_id** | **string**| Identifier of the shortlink | required |

### Return type

**\SplFileObject**

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/vnd.openxmlformats-officedocument.spreadsheetml.sheet`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getShortlinkHits()`

```php
getShortlinkHits($short_id, $short_response, $limit, $next, $previous): \Smscx\Client\Model\ShortlinkDetailsResponse
```

**Get shortlink hits**

Retrieves the hits details (phone number, device, model, operating system, browser, city, country, etc.) of a shortlink if a valid identifier was provided.    

### Errors for GET `/shortlinks/{shortId}`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 404 | 1400  |  not_found  |  Shortlink ID not found |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\ShortlinksApi(
    new GuzzleHttp\Client(),
    $config
);

$short_id = 'KgTX';
$short_response = false; // If set to true, it will return the full `info` object and an empty `data` object
$limit = '100';
$next = null;
$previous = null;

try {
    $result = $smscx->getShortlinkHits($short_id, $short_response, $limit, $next, $previous);
    print_r($result);
    // $result->getInfo()->getId();
    // $result->getInfo()->getName();
    // $result->getInfo()->getShortUrl();
    // $result->getInfo()->getOriginalUrl();
    // $result->getInfo()->getDateCreated();
    // $result->getInfo()->getHits();
    foreach ( $result->getData() as $k => $v ) {
        // $v->getHitId();
        // $v->getPhoneNumber();
        // $v->getPhoneNumberCountryIso();
        // $v->getCampaignId();
        // $v->getGroupId();
        // $v->getDevice();
        // $v->getBrowser();
        // $v->getBrowserVersion();
        // $v->getOs();
        // $v->getOsVersion();
        // $v->getBrand();
        // $v->getModel();
        // $v->getScreenResolution();
        // $v->getAcceptLanguage();
        // $v->getReferrer();
        // $v->getIpAddress();
        // $v->getCountryIso();
        // $v->getCity();
        // $v->getDatetime();
    }
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Shortlink ID not found    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling ShortlinksApi->getShortlinkHits: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **short_id** | **string**| Identifier of the shortlink | required |
| **short_response** | **bool**| If set to true, it will return the full &#x60;info&#x60; object and an empty &#x60;data&#x60; object | [optional] [default to false] |
| **limit** | **int**| A limit on the number of objects to be returned | [optional] [default to 500] |
| **next** | **string**| The next token used to retrieve additional data | [optional] |
| **previous** | **string**| The previous token used to retrieve additional data | [optional] |

### Return type

[**\Smscx\Client\Model\ShortlinkDetailsResponse**](../Model/ShortlinkDetailsResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getShortlinksList()`

```php
getShortlinksList(): \Smscx\Client\Model\ShortlinksListResponse
```

**Get shortlinks list**

Retrieves the list of existing shortlinks. The shortlinks are returned sorted by creation date, with the most recent shortlink appearing first.

If no shortlinks are available, an empty data object is returned.

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\ShortlinksApi(
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $smscx->getShortlinksList();
    print_r($result);
    foreach ( $result->getData() as $k => $v ) {
        // $v->getId();
        // $v->getName();
        // $v->getShortUrl();
        // $v->getOriginalUrl();
        // $v->getHits();
        // $v->getDateCreated();
    }
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling ShortlinksApi->getShortlinksList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\Smscx\Client\Model\ShortlinksListResponse**](../Model/ShortlinksListResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateShortlink()`

```php
updateShortlink($short_id, $shortlink_update_request): \Smscx\Client\Model\ShortlinkUpdateResponse
```

**Update shortlink**

Updates the specified shortlink by setting the values of the parameters passed. Parameters not provided in the request will be left unchanged.    

### Errors for PATCH `/shortlinks/{shortId} `  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 404 | 1400  |  not_found  |  Shortlink ID not found |  
| 400 | 1401  |  invalid_param  |  The URL is empty or parameter `url` not set |  
| 400 | 1402  |  invalid_param  |  The URL provided is invalid |  
| 400 | 1404  |  invalid_param  |  The parameter `name` is invalid (min 3, max 25 characters) |  
| 400 | 1406  |  invalid_param  |  At least one parameter required (name, url) |  
| 400 | 1407  |  duplicate_value  |  You already have a shortlink with this name |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\ShortlinksApi(
    new GuzzleHttp\Client(),
    $config
);
$short_id = 'KgTX';
$shortlink_update_request = [
    'name' => 'My new name',
    'url' => 'https://my-new-long-url-that-will-replace-existing-long-url/',
];

try {
    $result = $smscx->updateShortlink($short_id, $shortlink_update_request);
    print_r($result);
    // $result->getInfo()->getId();
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Shortlink ID not found    
} catch (Smscx\Client\Exception\DuplicateValueException $e) {
    //Code for duplicate value    
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling ShortlinksApi->updateShortlink: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **short_id** | **string**| Identifier of the shortlink | required |
| **shortlink_update_request** | [**\Smscx\Client\Model\ShortlinkUpdateRequest**](../Model/ShortlinkUpdateRequest.md)|  | required |

### Return type

[**\Smscx\Client\Model\ShortlinkUpdateResponse**](../Model/ShortlinkUpdateResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
