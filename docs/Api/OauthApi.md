# Smscx\Client\Api\OauthApi


| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getAccessToken()**](OauthApi.md#getAccessToken) | **POST** /oauth/token | Get access token |


## `getAccessToken()`

```php
getAccessToken($scopes): \Smscx\Client\Model\OauthTokenResponse
```

**Get access token**

Generate an access token.    

### Errors for POST `/oauth/token`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 400 | 1600  |  invalid_request  |  The request is missing a required parameter (grant_type) |  
| 400 | 1600  |  invalid_scope  |  The requested scope is invalid, unknown, or malformed |  
| 400 | 1600  |  unsupported_grant_type  |  The grant type is not supported (only client_credentials) |
| 401 | 1600  |  invalid_client  |  Invalid client |  

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: BasicAuth
$config = Smscx\Configuration::getDefaultConfiguration()
              ->setApplicationId('YOUR_APPLICATION_ID')
              ->setApplicationSecret('YOUR_APPLICATION_SECRET');

$smscx = new Smscx\Client\Api\OauthApi(
    new GuzzleHttp\Client(),
    $config
);
// string | A list of space-delimited, case-sensitive strings. If left empty or ommited, the issued access token will be granted with all scopes (full privileges)
$scopes = 'sms groups templates numbers originators viber whatsapp otp'; 

try {
    $result = $smscx->getAccessToken($scopes);
    print_r($result);
    // $result->getAccessToken();
    // $result->getExpiresIn();
    // $result->getTokenType();
    // $result->getScope();
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request
} catch (Smscx\Client\Exception\InvalidCredentialsException $e) {
    //Code for Invalid credentials
} catch (Smscx\Client\Exception\InvalidScopeException $e) {
    //Code for Invalid scope
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling OauthApi->getAccessToken: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **scopes** | **string**| A list of space-delimited, case-sensitive strings. If left empty or ommited, the issued access token will be granted with all scopes (full privileges) | [optional] |

### Return type

[**\Smscx\Client\Model\OauthTokenResponse**](../Model/OauthTokenResponse.md)

### Authorization

[BasicAuth](../../README.md#BasicAuth)

### HTTP request headers

- **Content-Type**: `application/x-www-form-urlencoded`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
