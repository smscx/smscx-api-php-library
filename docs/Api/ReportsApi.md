# Smscx\Client\Api\ReportsApi


| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**exportAdvancedReportToCSV()**](ReportsApi.md#exportAdvancedReportToCSV) | **GET** /reports/csv | Export advanced report to CSV |
| [**exportAdvancedReportToXLSX()**](ReportsApi.md#exportAdvancedReportToXLSX) | **GET** /reports/xlsx | Export advanced report to XLSX |
| [**exportCampaignReportToCSV()**](ReportsApi.md#exportCampaignReportToCSV) | **GET** /reports/campaigns/{campaignId}/csv | Export campaign report to CSV |
| [**exportCampaignReportToXLSX()**](ReportsApi.md#exportCampaignReportToXLSX) | **GET** /reports/campaigns/{campaignId}/xlsx | Export campaign report to XLSX |
| [**getAdvancedReport()**](ReportsApi.md#getAdvancedReport) | **GET** /reports | Get advanced report |
| [**getCampaignReport()**](ReportsApi.md#getCampaignReport) | **GET** /reports/campaigns/{campaignId} | Get campaign report |
| [**getCampaignsList()**](ReportsApi.md#getCampaignsList) | **GET** /reports/campaigns | Get list of sent campaigns |
| [**getSingleReport()**](ReportsApi.md#getSingleReport) | **GET** /reports/single/{msgId} | Get report for single SMS or Viber or Whatsapp or Multichannel |
| [**getSummaryReports()**](ReportsApi.md#getSummaryReports) | **GET** /reports/summary/{dimension} | Get summary reports for a dimension |


## `exportAdvancedReportToCSV()`

```php
exportAdvancedReportToCSV($period, $start_date, $end_date, $channel, $source, $delivery_report, $country_iso, $limit): string
```

**Export advanced report to CSV**

Exports the report for for the specified filters to a CSV file.  The only required parameters are the dates filters: `period` parameter or `start_date` and `end_date`.

If no data is available for the report, an empty CSV file is returned (with first line headers).    

### Errors for GET `/reports/csv`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 400 | 1820  |  invalid_param  |  The parameter `period` is not a valid date (format Y-m or Y) |  
| 400 | 1821  |  invalid_param  |  The parameter `start_date` is not a valid date |  
| 400 | 1822  |  invalid_param  |  The parameter `end_date` is not a valid date |  
| 400 | 1823  |  invalid_param  |  The end date is before the start date |  
| 400 | 1824  |  invalid_param  |  No `period` parameter or interval (`start_date`, `end_date`) |  
| 400 | 1825  |  invalid_param  |  The parameter `source` is not valid |  
| 400 | 1826  |  invalid_param  |  The parameter `delivery_report` is not valid (delivered, failed or sent) |  
| 400 | 1827  |  invalid_param  |  The parameter `country_iso` is not for a valid country  |  
| 400 | 1828  |  invalid_param  |  The parameter `channel` is not valid (sms, viber, whatsapp, multichannel) |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\ReportsApi(
    new GuzzleHttp\Client(),
    $config
);

$period = '2021-07'; // string | Period for the requested report in format **Y-M** or **Y**
// OR
// $start_date = '2021-03-01'; // string | The start date of the report in format Y-M-D
// $end_date = '2021-04-30'; // string | The end date of the report in format Y-M-D
$channel = 'sms'; // string | Channel of the sent messages
$source = 'api'; // string | Source of the sent messages
$delivery_report = 'delivered'; // string | 
$country_iso = 'fr'; // string | Two-letter country code defined in ISO-3166 alpha 2 standard (case insensitive)
$limit = 100; // int | A limit on the number of objects to be returned

try {
    $result = $smscx->exportAdvancedReportToCSV($period, $start_date, $end_date, $channel, $source, $delivery_report, $country_iso, $limit);
    print_r($result);
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling ReportsApi->exportAdvancedReportToCSV: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **period** | **string**| Period for the requested report in format **Y-M** or **Y** | |
| **start_date** | **string**| The start date of the report in format Y-M-D | |
| **end_date** | **string**| The end date of the report in format Y-M-D | |
| **channel** | **string**| Channel of the sent messages | [optional] |
| **source** | **string**| Source of the sent messages | [optional] |
| **delivery_report** | **string**|  | [optional] |
| **country_iso** | **string**| Two-letter country code defined in ISO-3166 alpha 2 standard (case insensitive) | [optional] |
| **limit** | **int**| A limit on the number of objects to be returned | [optional] [default to 500] |

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

## `exportAdvancedReportToXLSX()`

```php
exportAdvancedReportToXLSX($period, $start_date, $end_date, $channel, $source, $delivery_report, $country_iso, $limit): \SplFileObject
```

**Export advanced report to XLSX**

Exports the report for for the specified filters to a XLSX file (Excel).  

The only required parameters are the dates filters: `period` parameter or `start_date` and `end_date`.    

If no data is available for the report, an empty XLSX file is returned (with first line headers).    

### Errors for GET `/reports/xlsx`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 400 | 1820  |  invalid_param  |  The parameter `period` is not a valid date (format Y-m or Y) |  
| 400 | 1821  |  invalid_param  |  The parameter `start_date` is not a valid date |  
| 400 | 1822  |  invalid_param  |  The parameter `end_date` is not a valid date |  
| 400 | 1823  |  invalid_param  |  The end date is before the start date |  
| 400 | 1824  |  invalid_param  |  No `period` parameter or interval (`start_date`, `end_date`) |  
| 400 | 1825  |  invalid_param  |  The parameter `source` is not valid |  
| 400 | 1826  |  invalid_param  |  The parameter `delivery_report` is not valid (delivered, failed or sent) |  
| 400 | 1827  |  invalid_param  |  The parameter `country_iso` is not for a valid country  |  
| 400 | 1828  |  invalid_param  |  The parameter `channel` is not valid (sms, viber, whatsapp, multichannel) |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\ReportsApi(
    new GuzzleHttp\Client(),
    $config
);
$period = '2021-07'; // string | Period for the requested report in format **Y-M** or **Y**
// OR
// $start_date = '2021-03-01'; // string | The start date of the report in format Y-M-D
// $end_date = '2021-04-30'; // string | The end date of the report in format Y-M-D
$channel = 'sms'; // string | Channel of the sent messages
$source = 'api'; // string | Source of the sent messages
$delivery_report = 'delivered'; // string | 
$country_iso = 'fr'; // string | Two-letter country code defined in ISO-3166 alpha 2 standard (case insensitive)
$limit = 100; // int | A limit on the number of objects to be returned

try {
    $result = $smscx->exportAdvancedReportToXLSX($period, $start_date, $end_date, $channel, $source, $delivery_report, $country_iso, $limit);
    print_r($result);
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling ReportsApi->exportAdvancedReportToXLSX: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **period** | **string**| Period for the requested report in format **Y-M** or **Y** | |
| **start_date** | **string**| The start date of the report in format Y-M-D | |
| **end_date** | **string**| The end date of the report in format Y-M-D | |
| **channel** | **string**| Channel of the sent messages | [optional] |
| **source** | **string**| Source of the sent messages | [optional] |
| **delivery_report** | **string**|  | [optional] |
| **country_iso** | **string**| Two-letter country code defined in ISO-3166 alpha 2 standard (case insensitive) | [optional] |
| **limit** | **int**| A limit on the number of objects to be returned | [optional] [default to 500] |

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

## `exportCampaignReportToCSV()`

```php
exportCampaignReportToCSV($campaign_id): string
```

**Export campaign report to CSV**

Exports the details of a sent campaign to a CSV file.    

### Errors for GET `/reports/campaigns/{campaignId}/csv`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 404 | 1160  |  not_found  |  Campaign ID or msg ID provided was not found  |    
| 400 | 1165  |  invalid_param  |  Campaign ID or msg ID provided is not valid  |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\ReportsApi(
    new GuzzleHttp\Client(),
    $config
);

$campaign_id = '4baf0298-0c21-4df1-a60a-6e3476e95e0b'; // string | Identifier of a sent campaign

try {
    $result = $smscx->exportCampaignReportToCSV($campaign_id);
    print_r($result);
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Campaign ID not found    
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling ReportsApi->exportCampaignReportToCSV: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **campaign_id** | **string**| Identifier of a sent campaign | required |

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

## `exportCampaignReportToXLSX()`

```php
exportCampaignReportToXLSX($campaign_id): \SplFileObject
```

**Export campaign report to XLSX**

Exports the details of a sent campaign to a XLSX file (Excel).    

### Errors for GET `/reports/campaigns/{campaignId}/xlsx`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 404 | 1160  |  not_found  |  Campaign ID or msg ID provided was not found  |    
| 400 | 1165  |  invalid_param  |  Campaign ID or msg ID provided is not valid  |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\ReportsApi(
    new GuzzleHttp\Client(),
    $config
);

$campaign_id = '4baf0298-0c21-4df1-a60a-6e3476e95e0b'; // string | Identifier of a sent campaign

try {
    $result = $smscx->exportCampaignReportToXLSX($campaign_id);
    print_r($result);
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Campaign ID not found    
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling ReportsApi->exportCampaignReportToXLSX: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **campaign_id** | **string**| Identifier of a sent campaign | required |

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

## `getAdvancedReport()`

```php
getAdvancedReport($period, $start_date, $end_date, $channel, $source, $delivery_report, $country_iso, $short_response, $limit, $next, $previous): \Smscx\Client\Model\ReportsAdvancedResponse
```

**Get advanced report**

Retrieves the report for the specified filters.  The only required parameters are the dates filters: `period` parameter or `start_date` and `end_date`.    

If no data is available for the report, an empty data object is returned.    

### Errors for GET `/reports`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 400 | 1820  |  invalid_param  |  The parameter `period` is not a valid date (format Y-m or Y) |  
| 400 | 1821  |  invalid_param  |  The parameter `start_date` is not a valid date |  
| 400 | 1822  |  invalid_param  |  The parameter `end_date` is not a valid date |  
| 400 | 1823  |  invalid_param  |  The end date is before the start date |  
| 400 | 1824  |  invalid_param  |  No `period` parameter or interval (`start_date`, `end_date`) |  
| 400 | 1825  |  invalid_param  |  The parameter `source` is not valid |  
| 400 | 1826  |  invalid_param  |  The parameter `delivery_report` is not valid (delivered, failed or sent) |  
| 400 | 1827  |  invalid_param  |  The parameter `country_iso` is not for a valid country  |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\ReportsApi(
    new GuzzleHttp\Client(),
    $config
);
$period = '2021-07'; // string | Period for the requested report in format **Y-M** or **Y**
// OR
// $start_date = '2021-03-01'; // string | The start date of the report in format Y-M-D
// $end_date = '2021-04-30'; // string | The end date of the report in format Y-M-D
$channel = 'sms'; // string | Channel of the sent messages
$source = 'api'; // string | Source of the sent messages
$delivery_report = 'delivered'; // string | 
$country_iso = 'fr'; // string | Two-letter country code defined in ISO-3166 alpha 2 standard (case insensitive)
$short_response = false; // bool | If set to true, it will return the full `info` object and an empty `data` object
$limit = 100; // int | A limit on the number of objects to be returned
$next = null; // string | The next token used to retrieve additional data
$previous = null; // string | The previous token used to retrieve additional data

try {
    $result = $smscx->getAdvancedReport($period, $start_date, $end_date, $channel, $source, $delivery_report, $country_iso, $short_response, $limit, $next, $previous);
    print_r($result);
    // $result->getInfo()->getTotalPhoneNumbers();
    // $result->getInfo()->getTotalCost();
    // $result->getInfo()->getTotalParts();
    foreach ( $result->getData() as $k => $v ) {
        // $v->getMsgId();
        // $v->getStatus();
        // $v->getStatusCode();
        // $v->getErrorCode();
        // $v->getInQuietHours();
        // $v->getCreatedAt();
        // $v->getUpdatedAt();
        // $v->getScheduledAt();
        // $v->getCost();
        // $v->getTo();
        // $v->getCountryIso();
        // $v->getFrom();
        // $v->getSource();
        // $v->getChannel();
        // $v->getText();
        // $v->getTextAnalysis();
    }
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling ReportsApi->getAdvancedReport: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **period** | **string**| Period for the requested report in format **Y-M** or **Y** | |
| **start_date** | **string**| The start date of the report in format Y-M-D | |
| **end_date** | **string**| The end date of the report in format Y-M-D | |
| **channel** | **string**| Channel of the sent messages | [optional] |
| **source** | **string**| Source of the sent messages | [optional] |
| **delivery_report** | **string**|  | [optional] |
| **country_iso** | **string**| Two-letter country code defined in ISO-3166 alpha 2 standard (case insensitive) | [optional] |
| **short_response** | **bool**| If set to true, it will return the full &#x60;info&#x60; object and an empty &#x60;data&#x60; object | [optional] [default to false] |
| **limit** | **int**| A limit on the number of objects to be returned | [optional] [default to 500] |
| **next** | **string**| The next token used to retrieve additional data | [optional] |
| **previous** | **string**| The previous token used to retrieve additional data | [optional] |

### Return type

[**\Smscx\Client\Model\ReportsAdvancedResponse**](../Model/ReportsAdvancedResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getCampaignReport()`

```php
getCampaignReport($campaign_id, $short_response, $limit, $next, $previous): \Smscx\Client\Model\ReportsCampaignResponse
```

**Get campaign report**

Returns the details of a sent campaign if a valid identifier was provided.    

### Errors for GET `/reports/campaigns/{campaignId}`
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 404 | 1150  |  not_found  |  Campaign ID provided was not found |  
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

$smscx = new Smscx\Client\Api\ReportsApi(
    new GuzzleHttp\Client(),
    $config
);

$campaign_id = '4baf0298-0c21-4df1-a60a-6e3476e95e0b'; // string | Identifier of a sent campaign
$short_response = false; // bool | If set to true, it will return the full `info` object and an empty `data` object
$limit = 100; // int | A limit on the number of objects to be returned
$next = null; // string | The next token used to retrieve additional data
$previous = null; // string | The previous token used to retrieve additional data

try {
    $result = $smscx->getCampaignReport($campaign_id, $short_response, $limit, $next, $previous);
    print_r($result);
    // $result->getInfo()->getCampaignId();
    // $result->getInfo()->getCampaignName();
    // $result->getInfo()->getTotalPhoneNumbers();
    // $result->getInfo()->getTotalCost();
    // $result->getInfo()->getTotalParts();
    // $result->getInfo()->getChannel();
    foreach ( $result->getData() as $k => $v ) {
        // $v->getMsgId();
        // $v->getStatus();
        // $v->getStatusCode();
        // $v->getErrorCode();
        // $v->getInQuietHours();
        // $v->getCreatedAt();
        // $v->getUpdatedAt();
        // $v->getScheduledAt();
        // $v->getCost();
        // $v->getTo();
        // $v->getCountryIso();
        // $v->getFrom();
        // $v->getSource();
        // $v->getChannel();
        // $v->getText();
        // $v->getTextAnalysis();
    }
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Campaign ID not found    
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling ReportsApi->getCampaignReport: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **campaign_id** | **string**| Identifier of a sent campaign | required |
| **short_response** | **bool**| If set to true, it will return the full &#x60;info&#x60; object and an empty &#x60;data&#x60; object | [optional] [default to false] |
| **limit** | **int**| A limit on the number of objects to be returned | [optional] [default to 500] |
| **next** | **string**| The next token used to retrieve additional data | [optional] |
| **previous** | **string**| The previous token used to retrieve additional data | [optional] |

### Return type

[**\Smscx\Client\Model\ReportsCampaignResponse**](../Model/ReportsCampaignResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getCampaignsList()`

```php
getCampaignsList($delivery_reports, $source, $limit, $next, $previous): \Smscx\Client\Model\ReportsCampaignsRespone
```

**Get list of sent campaigns**

Returns a list of sent Campaigns, with the most recent appearing first.    

If no data is available, an empty data object is returned.

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\ReportsApi(
    new GuzzleHttp\Client(),
    $config
);

$delivery_reports = true; // bool | The response will contain an object **data.status** with delivery report summary for each campaign
$source = 'api'; // string | Source of the sent messages
$limit = 100; // int | A limit on the number of objects to be returned
$next = 'NTM2NTA'; // string | The next token used to retrieve additional data
$previous = 'NTQxNTA'; // string | The previous token used to retrieve additional data

try {
    $result = $smscx->getCampaignsList($delivery_reports, $source, $limit, $next, $previous);
    print_r($result);
    // $reports->getInfo->getTotalCampaigns();
    foreach ( $result->getData() as $k => $v ) {
        // $v->getId();
        // $v->getName();
        // $v->getFrom();
        // $v->getGroups();
        // $v->getTotalPhoneNumbers();
        // $v->getParts();
        // $v->getCost();
        // $v->getText();
        // $v->getSource();
        // $v->getChannel();
        // $v->getDatetimeAdded();
        // $v->getDatetimeScheduled();
        // $v->getStatus();
    } 
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling ReportsApi->getCampaignsList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **delivery_reports** | **bool**| The response will contain an object **data.status** with delivery report summary for each campaign | [optional] [default to false] |
| **source** | **string**| Source of the sent messages | [optional] |
| **limit** | **int**| A limit on the number of objects to be returned | [optional] [default to 500] |
| **next** | **string**| The next token used to retrieve additional data | [optional] |
| **previous** | **string**| The previous token used to retrieve additional data | [optional] |

### Return type

[**\Smscx\Client\Model\ReportsCampaignsRespone**](../Model/ReportsCampaignsRespone.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getSingleReport()`

```php
getSingleReport($msg_id): \Smscx\Client\Model\ReportSingleResponse
```

**Get report for single SMS or Viber or Whatsapp or Multichannel**

Returns the details of a single message if a valid identifier was provided.    

### Errors for GET `/reports/single/{msgId} `  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 404 | 1160  |  not_found  |  Campaign ID or msg ID provided was not found  |    
| 400 | 1165  |  invalid_param  |  Campaign ID or msg ID provided is not valid  |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\ReportsApi(
    new GuzzleHttp\Client(),
    $config
);

$msg_id = '9eeed792-9c8c-463c-a8e2-43ebf4494c02'; // string | Identifier of a sent message

try {
    $result = $smscx->getSingleReport($msg_id);
    print_r($result);
    // $result->getData()->getMsgId();
    // $result->getData()->getStatus();
    // $result->getData()->getStatusCode();
    // $result->getData()->getErrorCode();
    // $result->getData()->getInQuietHours();
    // $result->getData()->getCreatedAt();
    // $result->getData()->getUpdatedAt();
    // $result->getData()->getScheduledAt();
    // $result->getData()->getCost();
    // $result->getData()->getTo();
    // $result->getData()->getCountryIso();
    // $result->getData()->getFrom();
    // $result->getData()->getSource();
    // $result->getData()->getChannel();
    // $result->getData()->getText();
    // $result->getData()->getTextAnalysis();
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Message ID not found    
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling ReportsApi->getSingleReport: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **msg_id** | **string**| Identifier of a sent message | required |

### Return type

[**\Smscx\Client\Model\ReportSingleResponse**](../Model/ReportSingleResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getSummaryReports()`

```php
getSummaryReports($dimension, $period, $start_date, $end_date, $limit): \Smscx\Client\Model\GetSummaryReports200Response
```

**Get summary reports for a dimension**

Retrieves a summary report for the specified dimensions.    

The only required parameters are the dates for the report. 

The date filters can be: with `period` parameter or with `start_date` and `end_date`   

For some dimensions (**traffic** and **delivery**) the summary report will aggregate on dates.   

If the summary report was requested with **period** parameter, the dates will be months or days.  

If it was requested with interval **start_date** - **end_date**, the dates will be the days between the interval. Eg. period=2011, the property will be all months in the year  period=2011-06, the property will be all days in month   start_date=2021-06-15, end_date=2021-06-30, the properties will be all days between the interval      

If no data is available for the summary report an empty data object is returned.      

### Errors for GET `/reports/summary/{dimension}`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 400 | 1829  |  invalid_param  |  Invalid dimension. Accepted dimensions: source, channel, country, traffic, delivery |    
| 400 | 1820  |  invalid_param  |  The parameter `period` is not a valid date (format Y-m or Y) |  
| 400 | 1821  |  invalid_param  |  The parameter `start_date` is not a valid date |  
| 400 | 1822  |  invalid_param  |  The parameter `end_date` is not a valid date |  
| 400 | 1823  |  invalid_param  |  The end date is before the start date |  
| 400 | 1824  |  invalid_param  |  No `period` parameter or interval (`start_date`, `end_date`) |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\ReportsApi(
    new GuzzleHttp\Client(),
    $config
);
$dimension = 'country'; // string | Dimension for wich the summary report is requested
$period = '2021-07'; // string | Period for the requested report in format **Y-M** or **Y**
// OR
// $start_date = '2021-03-01'; // string | The start date of the report in format Y-M-D
// $end_date = '2021-04-30'; // string | The end date of the report in format Y-M-D
$limit = 100; // int | A limit on the number of objects to be returned

try {
    $result = $smscx->getSummaryReports($dimension, $period, $start_date, $end_date, $limit);
    print_r($result);
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling ReportsApi->getSummaryReports: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **dimension** | **string**| Dimension for wich the summary report is requested | |
| **period** | **string**| Period for the requested report in format **Y-M** or **Y** | |
| **start_date** | **string**| The start date of the report in format Y-M-D | |
| **end_date** | **string**| The end date of the report in format Y-M-D | |
| **limit** | **int**| A limit on the number of objects to be returned | [optional] [default to 500] |

### Return type

[**\Smscx\Client\Model\GetSummaryReports200Response**](../Model/GetSummaryReports200Response.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
