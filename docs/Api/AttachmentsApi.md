# Smscx\Client\Api\AttachmentsApi


| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**deleteAttachment()**](AttachmentsApi.md#deleteAttachment) | **DELETE** /attachments/{attachmentId} | Delete attachment |
| [**exportAttachmentHitsToCSV()**](AttachmentsApi.md#exportAttachmentHitsToCSV) | **GET** /attachments/{attachmentId}/csv | Export attachment hits to CSV |
| [**exportAttachmentHitsToXLSX()**](AttachmentsApi.md#exportAttachmentHitsToXLSX) | **GET** /attachments/{attachmentId}/xlsx | Export attachment hits to XLSX |
| [**getAttachmentHits()**](AttachmentsApi.md#getAttachmentHits) | **GET** /attachments/{attachmentId} | Get attachment hits |
| [**getAttachmentsList()**](AttachmentsApi.md#getAttachmentsList) | **GET** /attachments | Get attachments list |


## `deleteAttachment()`

```php
deleteAttachment($attachment_id): \Smscx\Client\Model\AttachmentDeleteResponse
```

**Delete attachment**

Deletes an attachment and all the hits data associated, if a valid identifier was provided.    

### Errors for DELETE `/attachments/{attachmentId}`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 404 | 1420  |  not_found  | Attachment ID not found |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\AttachmentsApi(
    new GuzzleHttp\Client(),
    $config
);

$attachment_id = 'KgTX';

try {
    $result = $smscx->deleteAttachment($attachment_id);
    print_r($result);
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Attachment ID not found    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling AttachmentsApi->deleteAttachment: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **attachment_id** | **string**| Identifier of the attachment | required |

### Return type

[**\Smscx\Client\Model\AttachmentDeleteResponse**](../Model/AttachmentDeleteResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `exportAttachmentHitsToCSV()`

```php
exportAttachmentHitsToCSV($attachment_id): string
```

**Export attachment hits to CSV**

Exports the hits details of an attachment (phone number, device, model, operating system, browser, city, country, etc.) to a CSV file.    
If there are no hits for the attachment, an empty CSV file is returned (with first line headers).    

### Errors for GET /attachments/{attachmentId}/csv  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 404 | 1420  |  not_found  | Attachment ID not found |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\AttachmentsApi(
    new GuzzleHttp\Client(),
    $config
);

$attachment_id = 'KgTX';

try {
    $result = $smscx->exportAttachmentHitsToCSV($attachment_id);
    print_r($result);
    // $result->getInfo()->getId();
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Attachment ID not found    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling AttachmentsApi->exportAttachmentHitsToCSV: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **attachment_id** | **string**| Identifier of the attachment | required |

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

## `exportAttachmentHitsToXLSX()`

```php
exportAttachmentHitsToXLSX($attachment_id): \SplFileObject
```

**Export attachment hits to XLSX**

Exports the hits details of an attachment (phone number, device, model, operating system, browser, city, country, etc.) to a XLSX file (Excel).    
If there are no hits for the attachment, an empty XLSX file is returned (with first line headers).    

### Errors for GET /attachments/{attachmentId}/xlsx  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 404 | 1420  |  not_found  | Attachment ID not found |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\AttachmentsApi(
    new GuzzleHttp\Client(),
    $config
);

$attachment_id = 'KgTX';

try {
    $result = $smscx->exportAttachmentHitsToXLSX($attachment_id);
    print_r($result);
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Attachment ID not found    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling AttachmentsApi->exportAttachmentHitsToXLSX: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **attachment_id** | **string**| Identifier of the attachment | required |

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

## `getAttachmentHits()`

```php
getAttachmentHits($attachment_id, $short_response, $limit, $next, $previous): \Smscx\Client\Model\AttachmentDetailsResponse
```

**Get attachment hits**

Retrieves the hits details (phone number, device, model, operating system, browser, city, country, etc.) of an attachment if a valid identifier was provided.    

### Errors for GET `/attachments/{attachmentId}`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 404 | 1420  |  not_found  | Attachment ID not found |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\AttachmentsApi(
    new GuzzleHttp\Client(),
    $config
);

$attachment_id = 'KgTX';
// If set to true, it will return the full `info` object and an empty `data` object
$short_response = false; 
// A limit on the number of objects to be returned
$limit = 100;
$next = null;
$previous = null;

try {
    $result = $smscx->getAttachmentHits($attachment_id, $short_response, $limit, $next, $previous);
    print_r($result);
    // $result->getInfo()->getId();
    // $result->getInfo()->getName();
    // $result->getInfo()->getShortUrl();
    // $result->getInfo()->getFileUrl();
    // $result->getInfo()->getFileType();
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
    //Attachment ID not found     
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling AttachmentsApi->getAttachmentHits: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **attachment_id** | **string**| Identifier of the attachment | required |
| **short_response** | **bool**| If set to true, it will return the full &#x60;info&#x60; object and an empty &#x60;data&#x60; object | [optional] [default to false] |
| **limit** | **int**| A limit on the number of objects to be returned | [optional] [default to 500] |
| **next** | **string**| The next token used to retrieve additional data | [optional] |
| **previous** | **string**| The previous token used to retrieve additional data | [optional] |

### Return type

[**\Smscx\Client\Model\AttachmentDetailsResponse**](../Model/AttachmentDetailsResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAttachmentsList()`

```php
getAttachmentsList(): \Smscx\Client\Model\AttachmentListResponse
```

**Get attachments list**

Retrieves the list of existing attachments. The attachments are returned sorted by creation date, with the most recent attachment appearing first. If no attachments are available, an empty data object is returned.

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\AttachmentsApi(
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $smscx->getAttachmentsList();
    print_r($result);
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling AttachmentsApi->getAttachmentsList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\Smscx\Client\Model\AttachmentListResponse**](../Model/AttachmentListResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
