# Smscx\Client\Api\OtpApi


| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**cancelOtp()**](OtpApi.md#cancelOtp) | **DELETE** /otp/{otpId} | Cancel OTP |
| [**getOtpStatus()**](OtpApi.md#getOtpStatus) | **GET** /otp/{otpId} | Get OTP status |
| [**newOtp()**](OtpApi.md#newOtp) 💰 | **POST** /otp | New OTP |
| [**verifyOtp()**](OtpApi.md#verifyOtp) | **POST** /otp/{otpId} | Verify OTP |


## `cancelOtp()`

```php
cancelOtp($otp_id): \Smscx\Client\Model\CancelOtpResponse
```

**Cancel OTP**

Cancel OTP request if a valid identifier was provided.    

### Errors for DELETE `/otp/{otpId}`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 404 | 2021 | not_found | Otp ID not found |  
| 403 | 2030 | access_denied | Otp already cancelled |  
| 403 | 2031 | access_denied | You cannot cancel a non-pending Otp |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\OtpApi(
    new GuzzleHttp\Client(),
    $config
);

$otp_id = 'a17fb13d-f4ac-4d93-9439-ef41ab8de390';

try {
    $result = $smscx->cancelOtp($otp_id);
    print_r($result);
    // $result->getInfo()->getId();
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //OTP ID not found    
} catch (Smscx\Client\Exception\OtpActionNotAllowedException $e) {
    //Code for cannot cancel a non-pending OTP    
} catch (Smscx\Client\Exception\OtpCancelledException $e) {
    //Code for OTP already cancelled    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling OtpApi->cancelOtp: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **otp_id** | **string**| Identifier of the OTP request | required |

### Return type

[**\Smscx\Client\Model\CancelOtpResponse**](../Model/CancelOtpResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getOtpStatus()`

```php
getOtpStatus($otp_id): \Smscx\Client\Model\DataOtp
```

**Get OTP status**

Retrieves the details of OTP status if a valid identifier was provided.

### Status for OTP requests  
| Status | Description |  
|:------------:|:------------|  
| PENDING | The OTP is pending validation by user |  
| VERIFIED | The OTP was validated by user |  
| EXPIRED | The validity of OTP has expired |  
| CANCELLED | The OTP was cancelled by the user |  
| FAILED | The OTP failed because too many unsuccessful attempts |    

### Errors for GET `/otp/{otpId}`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 404 | 2021 | not_found | Otp ID not found |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\OtpApi(
    new GuzzleHttp\Client(),
    $config
);

$otp_id = 'a17fb13d-f4ac-4d93-9439-ef41ab8de390';

try {
    $result = $smscx->getOtpStatus($otp_id);
    print_r($result);
    // $result->getOtpId();
    // $result->getTrackId();
    // $result->getPhoneNumber();
    // $result->getCountryIso();
    // $result->getStatus();
    // $result->getCost();
    // $result->getParts();
    // $result->getMaxAttempts();
    // $result->getAttempts();
    // $result->getTtl();
    // $result->getOtpCallbackUrl();
    // $result->getDateCreated();
    // $result->getDateExpires();
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //OTP ID not found    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling OtpApi->getOtpStatus: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **otp_id** | **string**| Identifier of the OTP request | required |

### Return type

[**\Smscx\Client\Model\DataOtp**](../Model/DataOtp.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `newOtp()`<span>💰</span>

```php
newOtp($new_otp_request): \Smscx\Client\Model\NewOtpResponse
```

**New OTP**

*Note: This method incurs costs*

Create a OTP request to verify a phone number.    

### Status for OTP requests  
| Status | Description |  
|:------------:|:------------|  
| PENDING | The OTP is pending validation by user |  
| VERIFIED | The OTP was validated by user |  
| EXPIRED | The validity of OTP has expired |  
| CANCELLED | The OTP was cancelled by the user |  
| FAILED | The OTP failed because too many unsuccessful attempts |    

### Errors for POST `/otp`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 400 | 2001 | invalid_param | The parameter 'phoneNumber' is empty or not set |  
| 400 | 2002 | invalid_param | The parameter 'countryIso' is empty or not set |  
| 400 | 2003 | invalid_param | Country ISO provided is invalid |  
| 400 | 2004 | invalid_param | The parameter 'from' is empty or not set |  
| 400 | 2005 | invalid_param | The parameter 'from' is not valid (min 3, max 15 characters) |  
| 400 | 2006 | invalid_param | The parameter 'template' is empty or not set |  
| 400 | 2006 | invalid_param | The parameter 'template' does not contain placeholder {{pin}} |  
| 400 | 2007 | invalid_param | The parameter 'ttl' is not a number |  
| 400 | 2008 | invalid_param | Min value for 'ttl' is 60 seconds |  
| 400 | 2009 | invalid_param | Max value for 'ttl' is 1800 seconds (30 mins) |  
| 400 | 2010 | invalid_param | The parameter 'maxAttempts' is not a number |  
| 400 | 2011 | invalid_param | Min value for 'maxAttempts' is 1 |  
| 400 | 2012 | invalid_param | Max value for 'maxAttempts' is 10 |  
| 400 | 2013 | invalid_param | The parameter 'pinType' is empty or not set |  
| 400 | 2014 | invalid_param | Invalid parameter 'pinType'. Must be one of: letters, numbers, alphanumeric |  
| 400 | 2015 | invalid_param | The parameter 'pinLength' is not a number |  
| 400 | 2016 | invalid_param | Min value for 'pinLength' is 4 |  
| 400 | 2017 | invalid_param | Max value for 'pinLength' is 10 |  
| 400 | 2018 | invalid_param | Track ID provided (parameter 'trackId') is not a valid UUID (v1-v5) |  
| 400 | 2019 | invalid_param | The parameter 'otpCallbackUrl' is not a valid URL |  
| 400 | 2020 | invalid_param | The phone number provided is invalid |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\OtpApi(
    new GuzzleHttp\Client(),
    $config
);

$new_otp_request = [
    'phoneNumber' => '+336124241xx',
    //'countryIso' => 'FR',
    //'from' => '',
    //'template' => 'Verification code: {{pin}}',
    //'trackId' => '3b90b6d3-4fd6-40d8-9b2d-310cb50f201d',
    //'ttl' => '500',
    //'maxAttempts' => '5',
    //'pinType' => 'numbers',
    //'pinLength' => '5',
    //'otpCallbackUrl' => 'https://callback-url/receive-otp-status',
];

try {
    $result = $smscx->newOtp($new_otp_request);
    print_r($result);
    // $result->getOtpId();
    // $result->getTrackId();
    // $result->getPhoneNumber();
    // $result->getCountryIso();
    // $result->getStatus();
    // $result->getCost();
    // $result->getParts();
    // $result->getMaxAttempts();
    // $result->getAttempts();
    // $result->getTtl();
    // $result->getOtpCallbackUrl();
    // $result->getDateCreated();
    // $result->getDateExpires();  
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\InvalidPhoneNumberException $e) {
    //Code for Invalid phone number
} catch (Smscx\Client\Exception\InsufficientBalanceException $e) {
    //Code for Insufficient balance
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling OtpApi->newOtp: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **new_otp_request** | [**\Smscx\Client\Model\NewOtpRequest**](../Model/NewOtpRequest.md)|  | |

### Return type

[**\Smscx\Client\Model\NewOtpResponse**](../Model/NewOtpResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `verifyOtp()`

```php
verifyOtp($otp_id, $verify_pin_request): \Smscx\Client\Model\VerifyPinResponse
```

**Verify OTP**

Verify the OTP received on the phone number.    

### Errors for POST `/otp/{otpId}`  

| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 404 | 2021 | not_found | Otp ID not found |  
| 400 | 2022 | invalid_param | The parameter pin is empty or not set |  
| 400 | 2023 | otp_verified | The OTP was already verified |  
| 400 | 2024 | otp_cancelled | The OTP was canceled |  
| 400 | 2025 | otp_expired | The OTP has expired |  
| 400 | 2026 | otp_failed | The OTP has failed, maximum attempts reached |  
| 400 | 2027 | otp_failed | Max attempts reached |  
| 400 | 2028 | otp_expired | The PIN has expired |  
| 400 | 2029 | invalid_pin | The PIN provided does not verify |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');
// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\OtpApi(
    new GuzzleHttp\Client(),
    $config
);
// Identifier of the OTP request
$otp_id = 'a17fb13d-f4ac-4d93-9439-ef41ab8de390'; 
$pin = '2691';

try {
    $result = $smscx->verifyOtp($otp_id, $pin);
    print_r($result);
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\InvalidPinException $e) {
    // Code for Invalid PIN
} catch (Smscx\Client\Exception\OtpAlreadyVerifiedException $e) {
    // Code for OTP already verified
} catch (Smscx\Client\Exception\OtpCancelledException $e) {
    // Code for OTP cancelled
} catch (Smscx\Client\Exception\OtpExpiredException $e) {
    // Code for OTP expired
} catch (Smscx\Client\Exception\OtpFailedException $e) {
    // Code for OTP failed
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling OtpApi->verifyOtp: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **otp_id** | **string**| Identifier of the OTP request | required |
| **pin** | **string**|  PIN code that is verified | required |

### Return type

[**\Smscx\Client\Model\VerifyPinResponse**](../Model/VerifyPinResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
