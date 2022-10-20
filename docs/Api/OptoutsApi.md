# Smscx\Client\Api\OptoutsApi


| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**addContactToOptoutsList()**](OptoutsApi.md#addContactToOptoutsList) | **POST** /optouts | Add contact to optouts list |
| [**deleteContactFromOptoutsList()**](OptoutsApi.md#deleteContactFromOptoutsList) | **DELETE** /optouts/{optoutId} | Delete contact from optouts list |
| [**exportOptoutsToCSV()**](OptoutsApi.md#exportOptoutsToCSV) | **GET** /optouts/csv | Export optouts to CSV |
| [**exportOptoutsToXLSX()**](OptoutsApi.md#exportOptoutsToXLSX) | **GET** /optouts/xlsx | Export optouts to XLSX |
| [**getOptoutsList()**](OptoutsApi.md#getOptoutsList) | **GET** /optouts | Get optouts list |


## `addContactToOptoutsList()`

```php
addContactToOptoutsList($add_contacts_to_group_request): \Smscx\Client\Model\OptoutsNewResponse
```

**Add contact to optouts list**

Add contacts to the optout list. Even if you mistakenly send SMS to a contact that is in the optouts list, the SMS.CX API will detect the contact and not send any messages to unsubscribed contacts. Also, you will not be billed - sending a SMS to an unsubscribed contact will be saved as 0 cost.    

### Errors for POST `/optouts`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 400 | 1203  |  invalid_param  |  The parameter `phoneNumbers` is empty or not set |  
| 400 | 1208  |  invalid_param  |  The parameter `phoneNumbers` must be an array of phone numbers  |    
| 400 | 1210  |  invalid_param  |  The phone numbers provided are invalid |  
| 400 | 1441  |  invalid_param  | No valid phone numbers were provided or already in the optout list |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\OptoutsApi(
    new GuzzleHttp\Client(),
    $config
);

$add_contacts_to_group_request = [
    'phoneNumbers' => ['+49151233545xx','+417816528xx','393123xx','+336122247xx','+3931235346xx'],
    //'countryIso' => 'FR',
    'allowInvalid' => true,
];

try {
    $result = $smscx->addContactToOptoutsList($add_contacts_to_group_request);
    print_r($result);
    // $result->getInfo()->getTotalValid();
    // $result->getInfo()->getTotalInvalid();
    // $result->getInfo()->getTotalDuplicates();
    // $result->getInfo()->getTotalPhoneNumbers();
    // $result->getInfo()->getPhoneNumbersByCountry();
    // $result->getInfo()->getInvalid();
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\InvalidPhoneNumberException $e) {
    //Code for Invalid phone number    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling OptoutsApi->addContactToOptoutsList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **add_contacts_to_group_request** | [**\Smscx\Client\Model\AddContactsToGroupRequest**](../Model/AddContactsToGroupRequest.md)|  | required |

### Return type

[**\Smscx\Client\Model\OptoutsNewResponse**](../Model/OptoutsNewResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteContactFromOptoutsList()`

```php
deleteContactFromOptoutsList($optout_id): \Smscx\Client\Model\OptoutsDeleteResponse
```

**Delete contact from optouts list**

Removes a contact from the optout list if a valid phone number identifier was provided.    

Only contacts that were added with the API can be deleted.      

Contacts that opted out via `link` cannot be deleted.    

### Errors for DELETE `/optouts/{optoutId}`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 404 | 1202  |  not_found  |  Phone number ID not found  
| 403 | 1443  |  access_denied  |  Cannot delete this phone number from the optout list because it was added via optout type `link`. Allowed optout type to delete: `admin` |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\OptoutsApi(
    new GuzzleHttp\Client(),
    $config
);

$optout_id = 458;

try {
    $result = $smscx->deleteContactFromOptoutsList($optout_id);
    print_r($result);
    // $result->getInfo()->getId();
    // $result->getInfo()->getPhoneNumber();
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Optout ID not found    
} catch (Smscx\Client\Exception\AccessDeniedException $e) {
    //Code for access denied - optout added via form    
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling OptoutsApi->deleteContactFromOptoutsList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **optout_id** | **int**| Identifier of the phone number in the optout list | required |

### Return type

[**\Smscx\Client\Model\OptoutsDeleteResponse**](../Model/OptoutsDeleteResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `exportOptoutsToCSV()`

```php
exportOptoutsToCSV(): string
```

**Export optouts to CSV**

Exports the contacts from the optout list to a CSV file.    

If the optout list is empty, an empty CSV file is returned (with first line headers).

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\OptoutsApi(
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $smscx->exportOptoutsToCSV();
    print_r($result);
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling OptoutsApi->exportOptoutsToCSV: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

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

## `exportOptoutsToXLSX()`

```php
exportOptoutsToXLSX(): \SplFileObject
```

**Export optouts to XLSX**

Exports the contacts from the optout list to a XLSX file (Excel).    

If the optout list is empty, an empty XLSX file is returned (with first line headers).

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\OptoutsApi(
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $smscx->exportOptoutsToXLSX();
    print_r($result);
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling OptoutsApi->exportOptoutsToXLSX: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

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

## `getOptoutsList()`

```php
getOptoutsList($limit, $next, $previous): \Smscx\Client\Model\OptoutsListResponse
```

**Get optouts list**

Retrieves the list of existing contacts that opted out. The optouts are returned sorted by creation date, with the most recent optout contact appearing first.

If no optouts are available, an empty data object is returned.

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\OptoutsApi(
    new GuzzleHttp\Client(),
    $config
);

$limit = 100;
$next = null;
$previous = null;

try {
    $result = $smscx->getOptoutsList($limit, $next, $previous);
    print_r($result);
    // $result->getInfo()->getId();
    // $result->getInfo()->getLink();
    // $result->getInfo()->getTotal();
    foreach ( $result->getData() as $k => $v ) {
        // $v->getId();
        // $v->getPhoneNumber();
        // $v->getCountryIso();
        // $v->getOptoutFrom();
        // $v->getCampaignId();
        // $v->getGroupId();
        // $v->getGroupName();
        // $v->getCampaignName();
        // $v->getDatetime();
    }
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling OptoutsApi->getOptoutsList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **limit** | **int**| A limit on the number of objects to be returned | [optional] [default to 500] |
| **next** | **string**| The next token used to retrieve additional data | [optional] |
| **previous** | **string**| The previous token used to retrieve additional data | [optional] |

### Return type

[**\Smscx\Client\Model\OptoutsListResponse**](../Model/OptoutsListResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
