# Smscx\Client\Api\NumbersApi


| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getBulkLookupStatus()**](NumbersApi.md#getBulkLookupStatus) | **GET** /numbers/lookup/lookupBulkId/{lookupBulkId} | Get Bulk Lookup result |
| [**getSingleLookupStatus()**](NumbersApi.md#getSingleLookupStatus) | **GET** /numbers/lookup/lookupId/{lookupId} | Get Single Lookup result |
| [**lookupNumber()**](NumbersApi.md#lookupNumber) 💰 | **GET** /numbers/lookup/{phoneNumber} | Lookup number |
| [**lookupNumbers()**](NumbersApi.md#lookupNumbers) 💰 | **POST** /numbers/lookup | Lookup numbers in bulk |
| [**validateNumber()**](NumbersApi.md#validateNumber) | **GET** /numbers/validate/{phoneNumber} | Validate number |
| [**validateNumbers()**](NumbersApi.md#validateNumbers) | **POST** /numbers/validate | Validate numbers in bulk |
| [**getAvailableNumbers()**](NumbersApi.md#getAvailableNumbers) | **GET** /numbers/rent/available/{countryIso} | Get available numbers for rent |
| [**rentNumber()**](NumbersApi.md#rentNumber) 💰 | **POST** /numbers/rent | Rent phone number |
| [**cancelRent()**](NumbersApi.md#cancelRent) | **DELETE** /numbers/rent/{rentId} | Cancel rent for phone number |
| [**renewRent()**](NumbersApi.md#renewRent) 💰 | **PATCH** /numbers/rent/{rentId} | Renew rent for phone number |
| [**getRentStatus()**](NumbersApi.md#getRentStatus) | **GET** /numbers/rent/{rentId} | Get status of rent |
| [**getRentedNumbers()**](NumbersApi.md#getRentedNumbers) | **GET** /numbers/rent | Get list of your rented numbers |
| [**getInboundSms()**](NumbersApi.md#getInboundSms) | **GET** /numbers/rent/{rentId}/inbound | Get inbound SMS from rented number |

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
    'allowInvalid' => true,
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
getAvailableNumbers($country_iso): \Smscx\Client\Model\RentNumbersResponse
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
$country_iso = FR; // string

try {
    $result = $smscx->getAvailableNumbers($country_iso);
    print_r($result);
    foreach ($result->getData() as $k => $v) {
        // $v->getNumberId();
        // $v->getPhoneNumber();
        // $v->getCountryIso();
        // $v->getNetworkOperator();
        // $v->getSms();
        // $v->getVoice();
        // $v->getMinRent();
        // $v->getMaxRent();
        // $v->getSetupCost();
        // $v->getRentalCost();
        // $v->getInboundSmsCost();
    }
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
|  400 | 1225  |  invalid_param  |  Parameter `autorenew` must be of type boolean |  
|  400 | 1226  |  invalid_param  |  The parameter `callbackUrl` is not a valid url |  
|  400 | 1229  |  invalid_param  |  Rent period is not between min and max period allowed for this number |  
|  400 | 1113  |  insufficient_credit  |  Insufficient credit |  
|  403 | 1231  |  access_denied  |  Cannot rent this phone number (already rented by someone else) |
|  404 | 1230  |  not_found  |  Number ID not found or number is not available for rent anymore |

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

];

try {
    $result = $smscx->rentNumber($rent_number_request);
    print_r($result);
    // $result->getInfo()->getRentId();
    // $result->getInfo()->getRentCost();
    // $result->getInfo()->getSetupCost();
    // $result->getInfo()->getRentPeriod();
    // $result->getInfo()->getRentStart();
    // $result->getInfo()->getRentEnd();
    // $result->getInfo()->getPhoneNumber();
    // $result->getInfo()->getCountryIso();
    // $result->getInfo()->getNetworkOperator();
    // $result->getInfo()->getAutoRenew();
    // $result->getInfo()->getSms();
    // $result->getInfo()->getVoice();
    // $result->getInfo()->getMinRent();
    // $result->getInfo()->getMaxRent();
    // $result->getInfo()->getRentalCost();
    // $result->getInfo()->getInboundSmsCost();
    // $result->getInfo()->getCallbackUrl();
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Number ID not found   
} catch (Smscx\Client\Exception\AccessDeniedException $e) {
    //Number was already rented by someone else
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
|  400 | 1221  |  invalid_param  |  Invalid parameter `rentId` |  
|  403 | 1227  |  access_denied  |  Cannot cancel this rent. More than 30 minutes passed from start of renting period |  
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
    // $result->getInfo()->getPhoneNumber();
    // $result->getInfo()->getCountryIso();
    // $result->getInfo()->getCreditReturned();
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
|  400 | 1221  |  invalid_param  |  Invalid parameter `rentId` |  
|  400 | 1224  |  invalid_param  |  Rent period is invalid (1, 7 or 30 days) |  
|  400 | 1225  |  invalid_param  |  Parameter `autorenew` must be of type boolean |  
|  400 | 1226  |  invalid_param  |  The parameter `callbackUrl` is not a valid url |  
|  400 | 1229  |  invalid_param  |  Rent period is not between min and max period allowed for this number |  
|  403 | 1228  |  access_denied  |  The rent cannot be renewed (rent already expired or phone number will not be available in the future) |  
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
    // $result->getInfo()->getRentCost();
    // $result->getInfo()->getSetupCost();
    // $result->getInfo()->getRentPeriod();
    // $result->getInfo()->getRentStart();
    // $result->getInfo()->getRentEnd();
    // $result->getInfo()->getPhoneNumber();
    // $result->getInfo()->getCountryIso();
    // $result->getInfo()->getNetworkOperator();
    // $result->getInfo()->getAutoRenew();
    // $result->getInfo()->getSms();
    // $result->getInfo()->getVoice();
    // $result->getInfo()->getMinRent();
    // $result->getInfo()->getMaxRent();
    // $result->getInfo()->getRentalCost();
    // $result->getInfo()->getInboundSmsCost();
    // $result->getInfo()->getCallbackUrl();
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Rent ID not found   
} catch (Smscx\Client\Exception\AccessDeniedException $e) {
    //Number rent cannot be renewed (it won't be available for rent in the future)
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

[**\Smscx\Client\Model\RentNumberResponse**](../Model/RentNumberResponse.md)

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
|  400 | 1221  |  invalid_param  |  Invalid parameter `rentId` |  
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
    // $result->getInfo()->getRentCost();
    // $result->getInfo()->getSetupCost();
    // $result->getInfo()->getRentPeriod();
    // $result->getInfo()->getRentStart();
    // $result->getInfo()->getRentEnd();
    // $result->getInfo()->getPhoneNumber();
    // $result->getInfo()->getCountryIso();
    // $result->getInfo()->getNetworkOperator();
    // $result->getInfo()->getAutoRenew();
    // $result->getInfo()->getSms();
    // $result->getInfo()->getVoice();
    // $result->getInfo()->getMinRent();
    // $result->getInfo()->getMaxRent();
    // $result->getInfo()->getRentalCost();
    // $result->getInfo()->getInboundSmsCost();
    // $result->getInfo()->getCallbackUrl();    
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
getRentedNumbers(): \Smscx\Client\Model\RentedNumbersResponse
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

try {
    $result = $smscx->getRentedNumbers();
    print_r($result);
    foreach ($result->getData() as $k => $v) {
        // $v->getRentId();
        // $v->getRentCost();
        // $v->getSetupCost();
        // $v->getRentPeriod();
        // $v->getRentStart();
        // $v->getRentEnd();
        // $v->getPhoneNumber();
        // $v->getCountryIso();
        // $v->getNetworkOperator();
        // $v->getAutoRenew();
        // $v->getSms();
        // $v->getVoice();
        // $v->getMinRent();
        // $v->getMaxRent();
        // $v->getRentalCost();
        // $v->getInboundSmsCost();
        // $v->getCallbackUrl();  
    }
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling NumbersApi->getRentedNumbers: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

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
getInboundSms($rent_id): \Smscx\Client\Model\GetInboundSMSResponse
```

**Get inbound SMS from rented number**

Get a list of SMS received on the rented phone number.      

### Errors for GET `/numbers/rent/{rentId}/inbound`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
|  400 | 1221  |  invalid_param  |  Invalid parameter `rentId` | 
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
    $result = $smscx->getInboundSms($rent_id);
    print_r($result);
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


