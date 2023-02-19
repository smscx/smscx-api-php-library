# Smscx\Client\Api\AccountApi


| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getAccountBalance()**](AccountApi.md#getAccountBalance) | **GET** /account/balance | Get account balance |
| [**getChannelPricing()**](AccountApi.md#getChannelPricing) | **GET** /account/pricing/{channel}/{trafficType} | Get channels pricing |
| [**getChannelPricingByCountryIso()**](AccountApi.md#getChannelPricingByCountryIso) | **GET** /account/pricing/{channel}/{trafficType}/{countryIso} | Get pricing for channel by country iso |
| [**getChannelsStatus()**](AccountApi.md#getChannelsStatus) | **GET** /account/channels/status | Get status of all channels |


## `getAccountBalance()`

```php
getAccountBalance(): \Smscx\Client\Model\AccountBalance
```

**Get account balance**

Retrieves the account balance, currency (eur, usd), billing (prepaid, postpaid).

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\AccountApi(
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $smscx->getAccountBalance();
    print_r($result);
    //$result->getBalance();
    //$result->getCurrency();
    //$result->getBilling();
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling AccountApi->getAccountBalance: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\Smscx\Client\Model\AccountBalance**](../Model/AccountBalance.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getChannelPricing()`

```php
getChannelPricing($channel, $traffic_type): \Smscx\Client\Model\GetChannelPricing200Response
```

**Get channels pricing**

Retrieves the full pricing for the requested channel.    

### Errors for GET `/account/pricing/{channel}/{trafficType}`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 400 | 1521  |  invalid_param  | The channel requested is not valid |  
| 403 | 1523  |  no_coverage  | No coverage |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\AccountApi(
    new GuzzleHttp\Client(),
    $config
);

$channel = 'sms';
$traffic_type = 'promotional';

try {
    $result = $smscx->getChannelPricing($channel, $traffic_type);
    print_r($result);
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request
} catch (Smscx\Client\Exception\NoCoverageException $e) {
    //Code for No coverage
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling AccountApi->getChannelPricing: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **channel** | **string**| One of the available channels: `sms`, `viber`, `whatsapp` | required |
| **traffic_type** | **string**| Type of traffic: `transactional`, `promotional`, `2way` | required |

### Return type

[**\Smscx\Client\Model\GetChannelPricing200Response**](../Model/GetChannelPricing200Response.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getChannelPricingByCountryIso()`

```php
getChannelPricingByCountryIso($channel, $traffic_type, $country_iso): \Smscx\Client\Model\GetChannelPricing200Response
```

**Get pricing for channel by country iso**

Retrieves the pricing for the requested channel, for a specific country ISO.    

### Errors for `/account/pricing/{channel}/{trafficType}/{countryIso}`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 400 | 1521  |  invalid_param  | The channel requested is not valid |  
| 400 | 1522  |  invalid_param  | Invalid country iso |  
| 403 | 1523  |  no_coverage  | No coverage |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\AccountApi(
    new GuzzleHttp\Client(),
    $config
);

$channel = 'sms'; 
$traffic_type = 'promotional';
$country_iso = 'FR';

try {
    $result = $smscx->getChannelPricingByCountryIso($channel, $traffic_type, $country_iso);
    print_r($result);
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling AccountApi->getChannelPricingByCountryIso: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **channel** | **string**| One of the available channels: `sms`, `viber`, `whatsapp` | required |
| **traffic_type** | **string**| Type of traffic: `transactional`, `promotional`, `2way` | required |
| **country_iso** | **string**| Country ISO 3166 alpha-2. Eg. DE, FR, IT | required |

### Return type

[**\Smscx\Client\Model\GetChannelPricing200Response**](../Model/GetChannelPricing200Response.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getChannelsStatus()`

```php
getChannelsStatus(): \Smscx\Client\Model\ChannelsStatus
```

**Get status of all channels**

Retrieves the active status of all channels (true for active, false for inactive)

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\AccountApi(
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $smscx->getChannelsStatus();
    print_r($result);
    // $result->getSms();
    // $result->getViber();
    // $result->getWhatsapp();
    // $result->getMultichannel();
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling AccountApi->getChannelsStatus: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\Smscx\Client\Model\ChannelsStatus**](../Model/ChannelsStatus.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
