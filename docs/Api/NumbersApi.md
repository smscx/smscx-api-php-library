# Smscx\Client\Api\NumbersApi


| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getBulkLookupStatus()**](NumbersApi.md#getBulkLookupStatus) | **GET** /numbers/lookup/lookupBulkId/{lookupBulkId} | Get Bulk Lookup result |
| [**getSingleLookupStatus()**](NumbersApi.md#getSingleLookupStatus) | **GET** /numbers/lookup/lookupId/{lookupId} | Get Single Lookup result |
| [**lookupNumber()**](NumbersApi.md#lookupNumber) 💰 | **GET** /numbers/lookup/{phoneNumber} | Lookup number |
| [**lookupNumbers()**](NumbersApi.md#lookupNumbers) 💰 | **POST** /numbers/lookup | Lookup numbers in bulk |
| [**getBulkLookupCampaigns()**](NumbersApi.md#getBulkLookupCampaigns) | **GET** /numbers/lookup | Get list of bulk lookup campaigns |
| [**exportNumberLookupReportToCSV()**](NumbersApi.md#exportNumberLookupReportToCSV) | **GET** /numbers/lookup/lookupBulkId/{lookupBulkId}/csv | Export number lookup campaign to CSV |
| [**exportNumberLookupReportToXLSX()**](NumbersApi.md#exportNumberLookupReportToXLSX) | **GET** /numbers/lookup/lookupBulkId/{lookupBulkId}/xlsx | Export number lookup campaign to XLSX |
| [**validateNumber()**](NumbersApi.md#validateNumber) | **GET** /numbers/validate/{phoneNumber} | Validate number |
| [**validateNumbers()**](NumbersApi.md#validateNumbers) | **POST** /numbers/validate | Validate numbers in bulk |
| [**getAvailableNumbers()**](NumbersApi.md#getAvailableNumbers) | **GET** /numbers/rent/available/{countryIso} | Get available numbers for rent |
| [**rentNumber()**](NumbersApi.md#rentNumber) 💰 | **POST** /numbers/rent | Rent phone number |
| [**cancelRent()**](NumbersApi.md#cancelRent) | **DELETE** /numbers/rent/{rentId} | Cancel rent for phone number |
| [**renewRent()**](NumbersApi.md#renewRent) 💰 | **PATCH** /numbers/rent/{rentId} | Renew rent for phone number |
| [**getRentStatus()**](NumbersApi.md#getRentStatus) | **GET** /numbers/rent/{rentId} | Get status of rent |
| [**getRentedNumbers()**](NumbersApi.md#getRentedNumbers) | **GET** /numbers/rent | Get list of your rented numbers |
| [**getInboundSms()**](NumbersApi.md#getInboundSms) | **GET** /numbers/rent/{rentId}/inbound | Get inbound SMS from rented number |
| [**editRentSettings()**](NumbersApi.md#editRentSettings) | **PATCH** /numbers/rent/{rentId}/edit | Edit settings for active rent |

## `getBulkLookupStatus()`

```php
getBulkLookupStatus($lookup_bulk_id): \Smscx\Client\Model\NumbersBulkLookupResult
```

**Get Bulk Lookup result**

Get details of a bulk phone number lookup.        

### Errors for GET `/numbers/lookup/lookupBulkId/{lookupBulkId}`  

| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 400 | 1218 | not_found | The lookupBulkId provided is invalid |  
| 404 | 1220 | invalid_param | Lookup Bulk ID not found |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\NumbersApi(
    new GuzzleHttp\Client(),
    $config
);

$lookup_bulk_id = '68aa4d9f-ee25-4a32-95d0-7272efe3b238';

try {
    $result = $smscx->getBulkLookupStatus($lookup_bulk_id);
    print_r($result);
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Lookup Bulk ID not found    
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling NumbersApi->getBulkLookupStatus: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **lookup_bulk_id** | **string**| Identifier of the bulk number lookup campaign | required |

### Return type

[**\Smscx\Client\Model\NumbersBulkLookupResult**](../Model/NumbersBulkLookupResult.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getSingleLookupStatus()`

```php
getSingleLookupStatus($lookup_id): \Smscx\Client\Model\DataNumberLookup
```

**Get Single Lookup result**

Get details of a single number lookup.      

### Errors for GET `/numbers/lookup/lookupId/{lookupId}`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 400 | 1217 | invalid_param | The lookupId provided is invalid |  
| 404 | 1219 | not_found | Lookup  ID not found |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\NumbersApi(
    new GuzzleHttp\Client(),
    $config
);

$lookup_id = '68aa4d9f-ee25-4a32-95d0-7272efe3b238';

try {
    $result = $smscx->getSingleLookupStatus($lookup_id);
    print_r($result);
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Lookup ID not found    
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling NumbersApi->getSingleLookupStatus: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **lookup_id** | **string**| Identifier of the number lookup | required |

### Return type

[**\Smscx\Client\Model\DataNumberLookup**](../Model/DataNumberLookup.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `lookupNumber()`<span>💰</span>

```php
lookupNumber($phone_number): \Smscx\Client\Model\NumberLookupResponse
```

**Lookup number**

*Note: This method incurs costs*

Lookup a single phone number, provided in international E.164 format. Returns info about status of the number (ACTIVE, ABSENT), if the phone number is ported, roaming, original and current network operator.    

The endpoint returns error if phone number is invalid.    

### Statuses of phone number lookup  
| Status | Description |  
|:------------:|:------------|  
| ACTIVE | Phone number is reachable |  
| ABSENT | Phone number is not reachable |  
| BARRED | Phone number has a block from their operator |  
| UNKNOWN | Unknown subscriber. Phone number is not reachable |  
| FAILED | Lookup for this phone number failed |

### Errors for GET `/numbers/lookup/{phoneNumber}`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 400 | 1207 | invalid_param | The phone number is invalid |  
| 403 | 1214 | no_coverage | No coverage or restricted destination |  
| 400 | 1113 | insufficient_credit | Insufficient credit |  
| 400 | 1114 | insufficient_credit | Credit limit reached. To increase the credit limit, please contact your account manager |  
| 400 | 1212 | invalid_param | Invalid request parameters |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\NumbersApi(
    new GuzzleHttp\Client(),
    $config
);

$phone_number = '+33612246450';

try {
    $result = $smscx->lookupNumber($phone_number);
    print_r($result);
    // $result->getData()->getPhoneNumber();
    // $result->getData()->getLookupId();
    // $result->getData()->getCost();
    // $result->getData()->getMcc();
    // $result->getData()->getMccMnc();
    // $result->getData()->getCountryIso();
    // $result->getData()->getCountryName();
    // $result->getData()->getCountryNameLocale();
    // $result->getData()->getStatus();
    // $result->getData()->getStatusDescription();
    // $result->getData()->getStatus();
    // $result->getData()->getPorted();
    // $result->getData()->getRoaming();
    // $result->getData()->getOriginalNetwork();
    // $result->getData()->getPortedNetwork();
    // $result->getData()->getRoamingNetwork();
    // $result->getData()->getDatetime();
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\InvalidPhoneNumberException $e) {
    //Code for Invalid phone number
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request
} catch (Smscx\Client\Exception\NoCoverageException $e) {
    //Code for No coverage
} catch (Smscx\Client\Exception\InsufficientBalanceException $e) {
    //Code for Insufficient balance
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling NumbersApi->lookupNumber: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **phone_number** | **string**| Phone number in international E.164 format (eg. **+33612424105**). The leading plus sign of the international format can be set as is, ommited or url encoded. 

The client library will automatically format and set the plus sign.   

The following values are considered valid:   
- +33612424105 
- 33612424105 
- %2B33612424105 | required |

### Return type

[**\Smscx\Client\Model\NumberLookupResponse**](../Model/NumberLookupResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `lookupNumbers()`<span>💰</span>

```php
lookupNumbers($numbers_lookup_request): \Smscx\Client\Model\NumbersLookupResponse
```

**Lookup numbers in bulk**

*Note: This method incurs costs*

Lookup a list of phone numbers. The result of the bulk phone lookup: status of the number (ACTIVE, ABSENT), if the phone numbers are ported, roaming, original and current network operator. 

You can lookup in bulk up to **40.000 phone numbers**.

### Statuses of phone number lookup  
| Status | Description |  
|:------------:|:------------|  
| ACTIVE | Phone number is reachable |  
| ABSENT | Phone number is not reachable |  
| BARRED | Phone number has a block from their operator |  
| UNKNOWN | Unknown subscriber. Phone number is not reachable |  
| FAILED | Lookup for this phone number failed |    

### Errors for POST `/numbers/lookup`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 400 | 1203 | invalid_param | The parameter 'phoneNumbers' is empty or not set |  
| 400 | 1208 | invalid_param | The parameter 'phoneNumbers' must be an array of phone numbers |  
| 400 | 1205 | invalid_param | The phone numbers array is too big (max. allowed: 40000 numbers) |  
| 400 | 1209 | invalid_param | The parameter 'lookupCallbackUrl' is not a valid URL |  
| 403 | 1214 | no_coverage | No coverage or restricted destination |  
| 400 | 1216 | invalid_param | No valid numbers provided or no coverage |  
| 400 | 1113 | insufficient_credit | Insufficient credit |  
| 400 | 1114 | insufficient_credit | Credit limit reached. To increase the credit limit, please contact your account manager |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\NumbersApi(
    new GuzzleHttp\Client(),
    $config
);

$numbers_lookup_request = [
    'phoneNumbers' => ['+336124241xx','+336123','+336129564xx','+336124241xx','+420604558xx','+336129564xx','+336123345xx','+4474006505xx','+49151237483xx','+49151286205xx','+4206018488xx','+49151232142xx','+3934237620xx'],
    //'countryIso' => 'FR',
    'lookupCallbackUrl' => 'https://my-callback-url/receive-lookup-details',
];

try {
    $result = $smscx->lookupNumbers($numbers_lookup_request);
    print_r($result);
    // $result->getInfo()->getLookupBulkId();
    // $result->getInfo()->getTotalPhoneNumbers();
    // $result->getInfo()->getTotalValid();
    // $result->getInfo()->getTotalInvalid();
    // $result->getInfo()->getCost();
    // $result->getInfo()->getInvalid();
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\InvalidPhoneNumberException $e) {
    //Code for Invalid phone number
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request
} catch (Smscx\Client\Exception\NoCoverageException $e) {
    //Code for No coverage
} catch (Smscx\Client\Exception\InsufficientBalanceException $e) {
    //Code for Insufficient balance
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling NumbersApi->lookupNumbers: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **numbers_lookup_request** | [**\Smscx\Client\Model\NumbersLookupRequest**](../Model/NumbersLookupRequest.md)|  | required |

### Return type

[**\Smscx\Client\Model\NumbersLookupResponse**](../Model/NumbersLookupResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getBulkLookupCampaigns()`

```php
getBulkLookupCampaigns($limit, $next, $previous): \Smscx\Client\Model\BulkLookupCampaignsResponse
```

**Get list of bulk lookup campaigns**

Get list of bulk lookup campaigns

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');


// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$smscx = new Smscx\Client\Api\NumbersApi(
    new GuzzleHttp\Client(),
    $config
);
$limit = 100; // int | A limit on the number of objects to be returned
$next = null; // string | The next token used to retrieve additional data
$previous = null; // string | The previous token used to retrieve additional data

try {
    $result = $smscx->getBulkLookupCampaigns($limit, $next, $previous);
    print_r($result);
    foreach ( $result->getData() as $k => $v ) {
        // $v->getId();
        // $v->getTotalPhoneNumbers();
        // $v->getTotalValid();
        // $v->getTotalCost();
        // $v->getDatetimeAdded();
    }
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling NumbersApi->getBulkLookupCampaigns: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **limit** | **int**| A limit on the number of objects to be returned | [optional] [default to 500] |
| **next** | **string**| The next token used to retrieve additional data | [optional] |
| **previous** | **string**| The previous token used to retrieve additional data | [optional] |

### Return type

[**\Smscx\Client\Model\BulkLookupCampaignsResponse**](../Model/BulkLookupCampaignsResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `exportNumberLookupReportToCSV()`

```php
exportNumberLookupReportToCSV($lookup_bulk_id): string
```

**Export number lookup campaign to CSV**

Exports the details of a phone number lookup campaign to a CSV file.    

### Errors for GET `/numbers/lookup/lookupBulkId/{lookupBulkId}/csv`  

| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
|  400 | 1218  |  invalid_param  |  The lookupBulkId provided is invalid  |  
|  404 | 1220  |  not_found  |  Lookup Bulk ID not found  |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');


// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$smscx = new Smscx\Client\Api\NumbersApi(
    new GuzzleHttp\Client(),
    $config
);
$lookup_bulk_id = '68aa4d9f-ee25-4a32-95d0-7272efe3b238'; // string | Identifier of the bulk number lookup campaign

try {
    $result = $smscx->exportNumberLookupReportToCSV($lookup_bulk_id);
    print_r($result);
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Lookup campaign ID not found    
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling NumbersApi->exportNumberLookupReportToCSV: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **lookup_bulk_id** | **string**| Identifier of the bulk number lookup campaign | |

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

## `exportNumberLookupReportToXLSX()`

```php
exportNumberLookupReportToXLSX($lookup_bulk_id): \SplFileObject
```

**Export number lookup campaign to XLSX**

Exports the details of a phone number lookup campaign to a XLSX file.    

### Errors for GET `/numbers/lookup/lookupBulkId/{lookupBulkId}/xlsx`  

| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
|  400 | 1218  |  invalid_param  |  The lookupBulkId provided is invalid  |  
|  404 | 1220  |  not_found  |  Lookup Bulk ID not found  |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');


// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$smscx = new Smscx\Client\Api\NumbersApi(
    new GuzzleHttp\Client(),
    $config
);
$lookup_bulk_id = '68aa4d9f-ee25-4a32-95d0-7272efe3b238'; // string | Identifier of the bulk number lookup campaign

try {
    $result = $smscx->exportNumberLookupReportToXLSX($lookup_bulk_id);
    print_r($result);
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Lookup campaign ID not found    
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling NumbersApi->exportNumberLookupReportToXLSX: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **lookup_bulk_id** | **string**| Identifier of the bulk number lookup campaign | |

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

## `validateNumber()`

```php
validateNumber($phone_number): \Smscx\Client\Model\NumberValidateResponse
```

**Validate number**

Validates a single phone number, provided in international E.164 format.    

### Errors for GET `/numbers/validate/{phoneNumber}`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 400 | 1207  |  invalid_param  |  The phone number is invalid  |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\NumbersApi(
    new GuzzleHttp\Client(),
    $config
);

$phone_number = '+33612246426';

try {
    $result = $smscx->validateNumber($phone_number);
    print_r($result);
    // $result->getData()->getPhoneNumber();
    // $result->getData()->getCountryIso();
    // $result->getData()->getNetworkOperator();
    // $result->getData()->getTimezone();
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\InvalidPhoneNumberException $e) {
    //Code for Invalid phone number
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling NumbersApi->validateNumber: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **phone_number** | **string**| Phone number in international E.164 format (eg. **+33612424105**). The leading plus sign of the international format can be set as is, ommited or url encoded. 

The client library will automatically format and set the plus sign.   

The following values are considered valid:   
- +33612424105 
- 33612424105 
- %2B33612424105 | required |

### Return type

[**\Smscx\Client\Model\NumberValidateResponse**](../Model/NumberValidateResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `validateNumbers()`

```php
validateNumbers($numbers_validate_request): \Smscx\Client\Model\NumbersValidateResponse
```

**Validate numbers in bulk**

Validate a list of phone numbers. You can validate in bulk up to **40.000 phone numbers**.    

This method does not return error if phone numbers are invalid. Instead it will return all the phone numbers, **preserving the order of the list provided**. 

An invalid phone number will have the parameter `invalid` with value `true` in the response object, or `false` otherwise.      

### Errors for POST `/numbers/validate`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 400 | 1203  |  invalid_param  |  The parameter `phoneNumbers` is empty or not set |  
| 400 | 1208  |  invalid_param  |  The parameter `phoneNumbers` must be an array of phone numbers |  
| 400 | 1205 | invalid_param | The phone numbers array is too big (max. allowed: 40000 numbers) |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\NumbersApi(
    new GuzzleHttp\Client(),
    $config
);

$numbers_validate_request = [
    'phoneNumbers' => ["+33612424105","+33612246450","+336123","+33612956402","+33612334525","+447400650588","+4915123748358","+4915128620584","+420601848808","+420601302207","+420204532112"],
    //'countryIso' => 'FR',
];

try {
    $result = $smscx->validateNumbers($numbers_validate_request);
    print_r($result);
    // $result->getInfo()->getTotalPhoneNumbers();
    // $result->getInfo()->getTotalValid();
    // $result->getInfo()->getTotalInvalid();
    foreach ($result->getData() as $k => $v) {
        // $v->getPhoneNumber();
        // $v->getCountryIso();
        // $v->getNetworkOperator();
        // $v->getTimezone();
        // $v->getInvalid(); # true or false
    }
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling NumbersApi->validateNumbers: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **numbers_validate_request** | [**\Smscx\Client\Model\NumbersValidateRequest**](../Model/NumbersValidateRequest.md)|  | required |

### Return type

[**\Smscx\Client\Model\NumbersValidateResponse**](../Model/NumbersValidateResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAvailableNumbers()`

```php
getAvailableNumbers($country_iso, $features, $number_type, $setup_time, $registration, $inbound_sms_sender, $include, $exclude): \Smscx\Client\Model\RentNumbersResponse
```

**Get available numbers for rent**

Get the list of available phone numbers for rent       

### Errors for GET `/numbers/rent/available/{countryIso}`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
|  400 | 2003  |  invalid_param  |  Country ISO provided is invalid |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\NumbersApi(
    new GuzzleHttp\Client(),
    $config
);

$country_iso = 'FR'; // string

# Optional filters
//$features = 3; // int | Filter by number features (1 - receive SMS, 2 - send SMS, 1 + 2 = 3 - send and receive SMS)
//$number_type = 'mobile'; // string | Filter by type of phone number
//$setup_time = 'instant'; // string | Filter by time of setup
//$registration = true; // bool | Filter by registration
//$inbound_sms_sender = true; // bool | Filter numbers that support inbound SMS from alphanumeric sender ID
//$include = '4559'; // string | Filter phone numbers that include the following digits
//$exclude = '1554'; // string | Filter phone numbers that exclude the following digits

try {
    $result = $smscx->getAvailableNumbers($country_iso);
    print_r($result);
    foreach ($result->getData() as $k => $v) {
        // $v->getNumberId();
        // $v->getPhoneNumber();
        // $v->getCountryIso();
        // $v->getNetworkOperator();
        // $v->getFeatures();
        // $v->getNumberType();
        // $v->getInboundSmsCost();
        // $v->getOutboundSmsCost();
        // $v->getSetupCost();

        //foreach ($v->getRentCost() as $key => $value) {
            //$value->getDays();
            //$value->getCost();
        //}

        // $v->getMinRent();
        // $v->getSetupTime();
        // $v->getRegistration();
        // $v->getInboundSmsSender();
        // $v->getDatetime();
    }
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling NumbersApi->getAvailableNumbers: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **country_iso** | **string**| Two-letter country ISO  (eg. DE, FR, IT) | required |
| ------------- | ------------- | ------------- | ------------- |
| **features** | **int**| Filter by number features (1 - receive SMS, 2 - send SMS, 1 + 2 &#x3D; 3 - send and receive SMS) | [optional] |
| **number_type** | **string**| Filter by type of phone number | [optional] |
| **setup_time** | **string**| Filter by time of setup | [optional] |
| **registration** | **bool**| Filter by registration | [optional] [default to false] |
| **inbound_sms_sender** | **bool**| Filter numbers that support inbound SMS from alphanumeric sender ID | [optional] [default to false] |
| **include** | **string**| Filter phone numbers that include the following digits | [optional] |
| **exclude** | **string**| Filter phone numbers that exclude the following digits | [optional] |

### Return type

[**\Smscx\Client\Model\RentNumbersResponse**](../Model/RentNumbersResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `rentNumber()`<span>💰</span>

```php
rentNumber($rent_number_request): \Smscx\Client\Model\RentNumberResponse
```

**Rent phone number**

Rent a phone number for a period of time (1, 7 or 30 days).       

### Errors for POST `/numbers/rent`  

| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
|  400 | 1222  |  invalid_param  |  Invalid parameter `numberId` |  
|  400 | 1224  |  invalid_param  |  Rent period is invalid (1, 7 or 30 days) |  
|  400 | 1225  |  invalid_param  |  Parameter `autorenew` must be type boolean |  
|  400 | 1226  |  invalid_param  |  The parameter `callbackUrl` is not a valid url |  
|  400 | 1229  |  invalid_param  |  Rent period is lower than the minimum rent period of this number |  
|  400 | 1113  |  insufficient_credit  |  Insufficient credit |  
|  400 | 1234  |  invalid_param  |  Registration ID provided is invalid or not found |  
|  403 | 1231  |  access_denied  |  Cannot rent this phone number (already rented) |  
|  404 | 1230  |  not_found  |  Number ID not found or number is not available for rent anymore|

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\NumbersApi(
    new GuzzleHttp\Client(),
    $config
);

$rent_number_request = [
    'numberId' => '38d70eda-641c-4c1a-aae8-723ed8aef062',
    'rentPeriod' => 7,
    'autoRenew' => true,
    'callbackUrl' => 'https://webhook-url/receive-inbound-sms',
    //OPTIONAL, if numbers requires registration, the ID of the registration details
    //'registrationId' => 'f3e77046-8051-4d8c-ac79-0ef6472995e5',
];

try {
    $result = $smscx->rentNumber($rent_number_request);
    print_r($result);
    // $result->getInfo()->getRentId();
    // $result->getInfo()->getNumberId();
    // $result->getInfo()->getPhoneNumber();
    // $result->getInfo()->getCountryIso();
    // $result->getInfo()->getRentStart();
    // $result->getInfo()->getRentEnd();
    // $result->getInfo()->getRentCost();
    // $result->getInfo()->getSetupCost();
    // $result->getInfo()->getAutoRenew();
    // $result->getInfo()->getApproved();
    // $result->getInfo()->getCallbackUrl();
    // $result->getInfo()->getDatetime();
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Number ID not found   
} catch (Smscx\Client\Exception\AccessDeniedException $e) {
    //Number was already rented by someone else
} catch (Smscx\Client\Exception\InsufficientBalanceException $e) {
    //Code for Insufficient balance
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling NumbersApi->rentNumber: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **rent_number_request** | [**\Smscx\Client\Model\RentNumberRequest**](../Model/RentNumberRequest.md)|  | required |

### Return type

[**\Smscx\Client\Model\RentNumberResponse**](../Model/RentNumberResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `cancelRent()`

```php
cancelRent($rent_id): \Smscx\Client\Model\CancelRentResponse
```

**Cancel rent for phone number**

Cancel rent for a phone number. Phone numbers rentals can be canceled within the first 30 minutes of renting period. Your account will be credited for the phone number rental cost.      

### Errors for DELETE `/numbers/rent/{rentId}`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
|  400 | 1221  |  invalid_param  |  The rentId provided is invalid |  
|  403 | 1227  |  access_denied  |  Cannot cancel this rent. More than 30 minutes passed from start of renting period |  
|  403 | 1232  |  access_denied  |  Cannot cancel this rent. The number has already been used for inbound SMS |  
|  404 | 1223  |  not_found  |  Rent ID not found |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\NumbersApi(
    new GuzzleHttp\Client(),
    $config
);

$rent_id = '471ddea7-930c-49e8-8e99-2683834dd92e';

try {
    $result = $smscx->cancelRent($rent_id);
    print_r($result);
    // $result->getInfo()->getRentId();
    // $result->getInfo()->getNumberId();
    // $result->getInfo()->getPhoneNumber();
    // $result->getInfo()->getCountryIso();
    // $result->getInfo()->getCreditReturned();
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Rent ID not found   
} catch (Smscx\Client\Exception\AccessDeniedException $e) {
    //Cannot cancel this rent. More than 30 minutes passed from start of renting period
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling NumbersApi->cancelRent: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **rent_id** | **string**| Identifier of the rental operation | required |

### Return type

[**\Smscx\Client\Model\CancelRentResponse**](../Model/CancelRentResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `renewRent()`<span>💰</span>

```php
renewRent($rent_id, $renew_rent_request): \Smscx\Client\Model\RentNumberResponse
```

**Renew rent for phone number**

Renew the rental of a phone number.      

### Errors for PATCH `/numbers/rent/{rentId}`  

| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
|  400 | 1221  |  invalid_param  |  The rentId provided is invalid |
|  400 | 1224  |  invalid_param  |  Rent period is invalid (1, 7 or 30 days) |  
|  400 | 1225  |  invalid_param  |  Parameter `autorenew` must be type boolean |  
|  400 | 1226  |  invalid_param  |  The parameter `callbackUrl` is not a valid url |  
|  400 | 1229  |  invalid_param  |  Rent period is lower than the minimum rent period of this number |  
|  400 | 1113  | insufficient_credit | Insufficient credit |  
|  403 | 1228  |  access_denied  |  The rent cannot be renewed (rent already expired or phone number is not available for future rent) |  
|  404 | 1223  |  not_found  |  Rent ID not found |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\NumbersApi(
    new GuzzleHttp\Client(),
    $config
);

$rent_id = '471ddea7-930c-49e8-8e99-2683834dd92e';

$renew_rent_request = [
    'rentPeriod' => 7,
    'autoRenew' => false,
    'callbackUrl' => 'https://webhook-url/receive-inbound-sms',
];

try {
    $result = $smscx->renewRent($rent_id, $renew_rent_request);
    print_r($result);
    // $result->getInfo()->getRentId();
    // $result->getInfo()->getNumberId();
    // $result->getInfo()->getPhoneNumber();
    // $result->getInfo()->getCountryIso();
    // $result->getInfo()->getRentStart();
    // $result->getInfo()->getRentEnd();  
    // $result->getInfo()->getRentCost();
    // $result->getInfo()->getAutoRenew();
    // $result->getInfo()->getCallbackUrl();
    // $result->getInfo()->getDatetime();
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Rent ID not found   
} catch (Smscx\Client\Exception\AccessDeniedException $e) {
    //Number rent cannot be renewed (it won't be available for rent in the future)
} catch (Smscx\Client\Exception\InsufficientBalanceException $e) {
    //Code for Insufficient balance    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling NumbersApi->renewRent: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **rent_id** | **string**| Identifier of the rental operation | required |
| **renew_rent_request** | [**\Smscx\Client\Model\RenewRentRequest**](../Model/RenewRentRequest.md)|  | required |

### Return type

[**\Smscx\Client\Model\RenewNumberResponse**](../Model/RenewNumberResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)


## `getRentStatus()`

```php
getRentStatus($rent_id): \Smscx\Client\Model\GetRentStatusResponse
```

**Get status of rent**

Get details of an existing rental.      

### Errors for GET `/numbers/rent/{rentId}`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
|  400 | 1221  |  invalid_param  |  The rentId provided is invalid |  
|  404 | 1223  |  not_found  |  Rent ID not found |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\NumbersApi(
    new GuzzleHttp\Client(),
    $config
);

$rent_id = '471ddea7-930c-49e8-8e99-2683834dd92e';

try {
    $result = $smscx->getRentStatus($rent_id);
    print_r($result);
    // $result->getInfo()->getRentId();
    // $result->getInfo()->getNumberId();
    // $result->getInfo()->getPhoneNumber();
    // $result->getInfo()->getCountryIso();
    // $result->getInfo()->getNetworkOperator();
    // $result->getInfo()->getFeatures();
    // $result->getInfo()->getNumberType();
    // $result->getInfo()->getRentCost();
    // $result->getInfo()->getSetupCost();
    // $result->getInfo()->getRentPeriod();
    // $result->getInfo()->getRentStart();
    // $result->getInfo()->getRentEnd();
    // $result->getInfo()->getInboundSmsCost();
    // $result->getInfo()->getOutboundSmsCost();
    //foreach ($result->getInfo()->getRenewCost() as $key => $value) {
        //$value->getDays();
        //$value->getCost();
    //}
    // $result->getInfo()->getInboundSms()->getTotal();
    // $result->getInfo()->getInboundSms()->getCost();
    // $result->getInfo()->getOutboundSms()->getTotal();
    // $result->getInfo()->getOutboundSms()->getCost();
    // $result->getInfo()->getMinRent();
    // $result->getInfo()->getCallbackUrl();    
    // $result->getInfo()->getAutoRenew();
    // $result->getInfo()->getInboundSmsSender();
    // $result->getInfo()->getActiveRent();
    // $result->getInfo()->getApproved();
    // $result->getInfo()->getDatetime();
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Rent ID not found   
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling NumbersApi->getRentStatus: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **rent_id** | **string**| Identifier of the rental operation | required |

### Return type

[**\Smscx\Client\Model\GetRentStatusResponse**](../Model/GetRentStatusResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getRentedNumbers()`

```php
getRentedNumbers($features, $country_iso, $number_type, $active_rent, $inbound_sms_sender, $include, $exclude): \Smscx\Client\Model\RentedNumbersResponse
```

**Get list of your rented numbers**

Get the list of your rented phone numbers

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\NumbersApi(
    new GuzzleHttp\Client(),
    $config
);

# Optional filters
//$features = 3; // int | Filter by number features (1 - receive SMS, 2 - send SMS, 1 + 2 = 3 - send and receive SMS)
//$country_iso = 'fr'; // string | Filter by country iso. Two-letter country code defined in ISO-3166 alpha 2 standard (case insensitive)
//$number_type = 'mobile'; // string | Filter by type of phone number
//$active_rent = true; // bool | Filter by active rent
//$inbound_sms_sender = true; // bool | Filter numbers that support inbound SMS from alphanumeric sender ID
//$include = '4559'; // string | Filter phone numbers that include the following digits
//$exclude = '1554'; // string | Filter phone numbers that exclude the following digits

try {
    $result = $smscx->getRentedNumbers();
    print_r($result);
    foreach ($result->getData() as $k => $v) {

        // $v->getRentId();
        // $v->getNumberId();
        // $v->getPhoneNumber();
        // $v->getCountryIso();
        // $v->getNetworkOperator();
        // $v->getFeatures();
        // $v->getNumberType();
        // $v->getRentCost();
        // $v->getSetupCost();
        // $v->getRentPeriod();
        // $v->getRentStart();
        // $v->getRentEnd();
        // $v->getInboundSmsCost();
        // $v->getOutboundSmsCost();
        //foreach ($v->getRenewCost() as $key => $value) {
            //$value->getDays();
            //$value->getCost();
        //}
        // $v->getInboundSms()->getTotal();
        // $v->getInboundSms()->getCost();
        // $v->getOutboundSms()->getTotal();
        // $v->getOutboundSms()->getCost();
        // $v->getMinRent();
        // $v->getCallbackUrl();    
        // $v->getAutoRenew();
        // $v->getInboundSmsSender();
        // $v->getActiveRent();
        // $v->getApproved();
        // $v->getDatetime();
    }
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling NumbersApi->getRentedNumbers: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **features** | **int**| Filter by number features (1 - receive SMS, 2 - send SMS, 1 + 2 &#x3D; 3 - send and receive SMS) | [optional] |
| **country_iso** | **string**| Filter by country iso. Two-letter country code defined in ISO-3166 alpha 2 standard (case insensitive) | [optional] |
| **number_type** | **string**| Filter by type of phone number | [optional] |
| **active_rent** | **bool**| Filter by active rent | [optional] [default to false] |
| **inbound_sms_sender** | **bool**| Filter numbers that support inbound SMS from alphanumeric sender ID | [optional] [default to false] |
| **include** | **string**| Filter phone numbers that include the following digits | [optional] |
| **exclude** | **string**| Filter phone numbers that exclude the following digits | [optional] |

### Return type

[**\Smscx\Client\Model\RentedNumbersResponse**](../Model/RentedNumbersResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getInboundSms()`

```php
getInboundSms($rent_id, $limit, $next, $previous): \Smscx\Client\Model\GetInboundSMSResponse
```

**Get inbound SMS from rented number**

Get a list of SMS received on the rented phone number.      

### Errors for GET `/numbers/rent/{rentId}/inbound`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
|  400 | 1221  |  invalid_param  |  The rentId provided is invalid |  
|  404 | 1223  |  not_found  |  Rent ID not found |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\NumbersApi(
    new GuzzleHttp\Client(),
    $config
);

$rent_id = '471ddea7-930c-49e8-8e99-2683834dd92e';
//$limit = '100'; // int | A limit on the number of objects to be returned
//$next = 'NTM2NTA'; // string | The next token used to retrieve additional data
//$previous = 'NTQxNTA'; // string | The previous token used to retrieve additional data

try {
    $result = $smscx->getInboundSms($rent_id);
    print_r($result);
    // $result->getInfo()->getRentId();
    // $result->getInfo()->getPhoneNumber();
    // $result->getInfo()->getCountryIso();
    foreach ($result->getData() as $k => $v) {
        // $v->getMsgId();
        // $v->getFrom();
        // $v->getCountryIso();
        // $v->getTo();
        // $v->getText();
        // $v->getCost();
        // $v->getReceivedAt();
    }
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Rent ID not found   
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling NumbersApi->getInboundSms: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **rent_id** | **string**| Identifier of the rental operation | required |
| **limit** | **int**| A limit on the number of objects to be returned | [optional] [default to 500] |
| **next** | **string**| The next token used to retrieve additional data | [optional] |
| **previous** | **string**| The previous token used to retrieve additional data | [optional] |

### Return type

[**\Smscx\Client\Model\GetInboundSMSResponse**](../Model/GetInboundSMSResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)



## `editRentSettings()`

```php
editRentSettings($rent_id, $edit_rent_request): \Smscx\Client\Model\EditRentResponse
```

**Edit settings for active rent**

Edit settings of active rent    

### Errors for GET `/numbers/rent/{rentId}/edit`  

| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
|  400 | 1221  |  invalid_param  |  The rentId provided is invalid |  
|  400 | 1225  |  invalid_param  |  Parameter `autorenew` must be type boolean |  
|  400 | 1226  |  invalid_param  |  The parameter `callbackUrl` is not a valid url |  
|  400 | 1233  |  invalid_param  |  At least one parameter required (autoRenew, callbackUrl) |  
|  404 | 1223  |  not_found  |  Rent ID not found |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$smscx = new Smscx\Client\Api\NumbersApi(
    new GuzzleHttp\Client(),
    $config
);
$rent_id = '471ddea7-930c-49e8-8e99-2683834dd92e'; // string | Identifier of the rental operation
$edit_rent_request = [
    'autoRenew' => false,
    'callbackUrl' => 'https://edited-webhook-url/receive-inbound-sms',
    //If you want to remove the webhook
    //'callbackUrl' => null
];


try {
    $result = $smscx->editRentSettings($rent_id, $edit_rent_request);
    print_r($result);
    // $result->getInfo()->getRentId();
    // $result->getInfo()->getDatetime();    
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Lookup campaign ID not found    
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request        
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling NumbersApi->editRentSettings: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **rent_id** | **string**| Identifier of the rental operation | |
| **edit_rent_request** | [**\Smscx\Client\Model\EditRentRequest**](../Model/EditRentRequest.md)|  | |

### Return type

[**\Smscx\Client\Model\EditRentResponse**](../Model/EditRentResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
