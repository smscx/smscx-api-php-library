# Smscx\Client\Api\GroupsApi


| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**addContactsToGroup()**](GroupsApi.md#addContactsToGroup) | **POST** /groups/{groupId} | Add contacts to group |
| [**createGroup()**](GroupsApi.md#createGroup) | **POST** /groups | Create new group |
| [**deleteContactFromGroup()**](GroupsApi.md#deleteContactFromGroup) | **DELETE** /groups/{groupId}/{phoneNumberId} | Delete contact from group |
| [**deleteGroup()**](GroupsApi.md#deleteGroup) | **DELETE** /groups/{groupId} | Delete group |
| [**emptyGroup()**](GroupsApi.md#emptyGroup) | **GET** /groups/{groupId}/empty | Empty group |
| [**exportGroupToCSV()**](GroupsApi.md#exportGroupToCSV) | **GET** /groups/{groupId}/csv | Export group to CSV |
| [**exportGroupToXLSX()**](GroupsApi.md#exportGroupToXLSX) | **GET** /groups/{groupId}/xlsx | Export group to XLSX |
| [**getGroupDetails()**](GroupsApi.md#getGroupDetails) | **GET** /groups/{groupId} | Get group details |
| [**getGroupsList()**](GroupsApi.md#getGroupsList) | **GET** /groups | Get list of groups |
| [**updateContactFromGroup()**](GroupsApi.md#updateContactFromGroup) | **PATCH** /groups/{groupId}/{phoneNumberId} | Update contact from group |


## `addContactsToGroup()`

```php
addContactsToGroup($group_id, $add_contacts_to_group_request): \Smscx\Client\Model\AddContactsToGroupResponse
```

**Add contacts to group**

Add contacts to a group if a valid identifier was provided.    

### Errors for POST `/groups/{groupId}`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 400 | 1203  |  invalid_param  | The parameter `phoneNumbers` is empty or not set |  
| 400 | 1208  |  invalid_param  |  The parameter `phoneNumbers` must be an array of phone numbers  |    
| 400 | 1207  |  invalid_param  | The phone number provided is not valid |  
| 400 | 1210  |  invalid_param  | The phone numbers provided are invalid |  
| 404 | 1200  |  not_found  | Group ID not found |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\GroupsApi(
    new GuzzleHttp\Client(),
    $config
);

$group_id = 2245;
$add_contacts_to_group_request = [
    'phoneNumbers' => ["+336129353","+33612970283","+3361211","+43664187834","+41781218472","+351912110421","+4915123473140","+4915123595","+4915123966046"],
    //'countryIso' => 'FR',
    'allowInvalid' => true,
];

try {
    $result = $smscx->addContactsToGroup($group_id, $add_contacts_to_group_request);
    print_r($result);
    // $result->getInfo()->getTotalCost();
    // $result->getInfo()->getTotalValid();
    // $result->getInfo()->getTotalInvalid();
    // $result->getInfo()->getTotalDuplicates();
    // $result->getInfo()->getPhoneNumbers();
    // $result->getInfo()->getInvalid();
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Group ID not found    
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\InvalidPhoneNumberException $e) {
    //Code for Invalid phone number    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling GroupsApi->addContactsToGroup: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **group_id** | **int**| Identifier of a group of contacts | required |
| **add_contacts_to_group_request** | [**\Smscx\Client\Model\AddContactsToGroupRequest**](../Model/AddContactsToGroupRequest.md)|  | required |

### Return type

[**\Smscx\Client\Model\AddContactsToGroupResponse**](../Model/AddContactsToGroupResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createGroup()`

```php
createGroup($new_group_request): \Smscx\Client\Model\NewGroupResponse
```

**Create new group**

Creates a new group.      

### Errors for POST `/groups`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 400 | 1204  |  invalid_param  | The name is empty or parameter `name` not set |  
| 400 | 1206  |  invalid_param  | The name provided is invalid (min 3, max 60 characters) |  
| 400 | 1211  |  duplicate_value  | You already have a group with this name |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\GroupsApi(
    new GuzzleHttp\Client(),
    $config
);

$group_name = 'My new group';

try {
    $result = $smscx->createGroup($group_name);
    print_r($result);
    // $result->getInfo()->getId();
    // $result->getInfo()->getName();
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\DuplicateValueException $e) {
    //Code for duplicate value    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling GroupsApi->createGroup: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **group_name** | string | Name of the group | required |

### Return type

[**\Smscx\Client\Model\NewGroupResponse**](../Model/NewGroupResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteContactFromGroup()`

```php
deleteContactFromGroup($group_id, $phone_number_id): \Smscx\Client\Model\DeleteContact
```

**Delete contact from group**

Deletes a contact from a group if a valid group identifier was provided.    

### Errors for DELETE `/groups/{groupId}/{phoneNumberId}`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 404 | 1200  |  not_found  | Group ID not found |  
| 404 | 1202  |  not_found  | Phone number ID not found |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\GroupsApi(
    new GuzzleHttp\Client(),
    $config
);

$group_id = 2245;
$phone_number_id = '68aa4d9f-ee25-4a32-95d0-7272efe3b238';

try {
    $result = $smscx->deleteContactFromGroup($group_id, $phone_number_id);
    print_r($result);
    // $result->getInfo()->getId();
    // $result->getInfo()->getPhoneNumber();
    // $result->getInfo()->getCountryIso();
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Group ID or PhoneNumber ID not found    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling GroupsApi->deleteContactFromGroup: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **group_id** | **int**| Identifier of a group of contacts | required |
| **phone_number_id** | **string**| Identifier of the phone number | required |

### Return type

[**\Smscx\Client\Model\DeleteContact**](../Model/DeleteContact.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteGroup()`

```php
deleteGroup($group_id): \Smscx\Client\Model\DeleteGroup
```

**Delete group**

Deletes a group and all the contacts in the group    

### Errors for DELETE `/groups/{groupId}`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 404 | 1200  |  not_found  | Group ID not found |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\GroupsApi(
    new GuzzleHttp\Client(),
    $config
);

$group_id = 2245;

try {
    $result = $smscx->deleteGroup($group_id);
    print_r($result);
    // $result->getInfo()->getId();
    // $result->getInfo()->getName();
    // $result->getInfo()->getTotalPhoneNumbers();
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Group ID not found    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling GroupsApi->deleteGroup: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **group_id** | **int**| Identifier of a group of contacts | required |

### Return type

[**\Smscx\Client\Model\DeleteGroup**](../Model/DeleteGroup.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `emptyGroup()`

```php
emptyGroup($group_id): \Smscx\Client\Model\GroupResponse
```

**Empty group**

Deletes all the contacts in a group.

### Errors for GET `/groups/{groupId}/empty`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 404 | 1200  |  not_found  | Group ID not found |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\GroupsApi(
    new GuzzleHttp\Client(),
    $config
);
$group_id = 2245;

try {
    $result = $smscx->emptyGroup($group_id);
    print_r($result);
    // $result->getInfo()->getId();
    // $result->getInfo()->getName();    
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Group ID not found    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling GroupsApi->emptyGroup: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **group_id** | **int**| Identifier of a group of contacts | required |

### Return type

[**\Smscx\Client\Model\GroupResponse**](../Model/GroupResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `exportGroupToCSV()`

```php
exportGroupToCSV($group_id): string
```

**Export group to CSV**

Exports the contacts from a group to a CSV file.    

If the group is empty, an empty CSV file is returned (with first line headers).    

### Errors for GET `/groups/{groupId}/csv`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 404 | 1200  |  not_found  | Group ID not found |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\GroupsApi(
    new GuzzleHttp\Client(),
    $config
);
$group_id = 2245;

try {
    $result = $smscx->exportGroupToCSV($group_id);
    print_r($result);
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Group ID not found    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling GroupsApi->exportGroupToCSV: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **group_id** | **int**| Identifier of a group of contacts | required |

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

## `exportGroupToXLSX()`

```php
exportGroupToXLSX($group_id): \SplFileObject
```

**Export group to XLSX**

Exports the contacts from a group to a XLSX file (Excel).    

If the group is empty, an empty XLSX file is returned (with first line headers).    

### Errors for GET `/groups/{groupId}/xlsx`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 404 | 1200  |  not_found  | Group ID not found |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\GroupsApi(
    new GuzzleHttp\Client(),
    $config
);
$group_id = 2245;

try {
    $result = $smscx->exportGroupToXLSX($group_id);
    print_r($result);
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Group ID not found    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling GroupsApi->exportGroupToXLSX: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **group_id** | **int**| Identifier of a group of contacts | required |

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

## `getGroupDetails()`

```php
getGroupDetails($group_id, $short_response, $limit, $next, $previous): \Smscx\Client\Model\GroupDetailsResponse
```

**Get group details**

Retrieves the details of a group if a valid identifier was provided.      

### Errors for GET `/groups/{groupId}`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 404 | 1200  |  not_found  | Group ID not found |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\GroupsApi(
    new GuzzleHttp\Client(),
    $config
);
$group_id = 2245;
$short_response = false; // If set to true, it will return the full `info` object and an empty `data` object
$limit = 100;
$next = null;
$previous = null; 

try {
    $result = $smscx->getGroupDetails($group_id, $short_response, $limit, $next, $previous);
    print_r($result);
    // $result->getInfo()->getId();
    // $result->getInfo()->getName();
    // $result->getInfo()->getTotalPhoneNumbers();
    // $result->getInfo()->getTotalCost();
    // $result->getInfo()->getTotalOptouts();
    // $result->getInfo()->getCreatedAt();
    foreach ( $result->getData() as $k => $v ) {
        // $v->getId();
        // $v->getPhoneNumber();
        // $v->getCountryIso();
        // $v->getFirstName();
        // $v->getLastName();
        // $v->getEmail();
        // $v->getField1();
        // $v->getField2();
        // $v->getField3();
        // $v->getField4();
        // $v->getField5();
        // $v->getGroupId();
        // $v->getOptout(); # true or false
        // $v->getCustomFields();
        // $v->getDateAdded();
    }
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Group ID not found    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling GroupsApi->getGroupDetails: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **group_id** | **int**| Identifier of a group of contacts | required |
| **short_response** | **bool**| If set to true, it will return the full &#x60;info&#x60; object and an empty &#x60;data&#x60; object | [optional] [default to false] |
| **limit** | **int**| A limit on the number of objects to be returned | [optional] [default to 500] |
| **next** | **string**| The next token used to retrieve additional data | [optional] |
| **previous** | **string**| The previous token used to retrieve additional data | [optional] |

### Return type

[**\Smscx\Client\Model\GroupDetailsResponse**](../Model/GroupDetailsResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getGroupsList()`

```php
getGroupsList(): \Smscx\Client\Model\GroupsList
```

**Get list of groups**

Retrieves the list of existing groups of contacts. The groups are returned sorted by creation date, with the most recent group appearing first. 

If no groups are available, an empty data object is returned.

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\GroupsApi(
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $smscx->getGroupsList();
    print_r($result);
    foreach ( $result->getData() as $k => $v ) {
        // $v->getId();
        // $v->getName();
        // $v->getTotalPhoneNumbers();
        // $v->getTotalCost();
        // $v->getTotalOptouts();
        // $v->getCreatedAt();
    }    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling GroupsApi->getGroupsList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\Smscx\Client\Model\GroupsList**](../Model/GroupsList.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateContactFromGroup()`

```php
updateContactFromGroup($group_id, $phone_number_id, $update_number_request): \Smscx\Client\Model\UpdateNumberResponse
```

**Update contact from group**

Updates the specified contact by setting the values of the parameters passed. Parameters not provided in the request will be left unchanged.   


### Errors for PATCH `/groups/{groupId}/{phoneNumberId}`  
| HTTP code  | Error code  | Type  | Description  |  
|:------------:|:------------:|:------------:| ------------ |  
| 404 | 1202  |  not_found  | Phone number ID not found |  
| 400 | 1213  |  invalid_param  | At least one parameter required (phoneNumber, firstName, lastName, email, field1, field2, field3, field4, field5, customFields) |  
| 400 | 1215  |  duplicate_value  | The phone number already exists |

### Example

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\GroupsApi(
    new GuzzleHttp\Client(),
    $config
);
$group_id = 2245;
$phone_number_id = '68aa4d9f-ee25-4a32-95d0-7272efe3b238'; 
$update_number_request = [
    'phoneNumber' => '+447400772233',
    //'firstName' => 'John',
    //'lastName' => 'Doe',
    //'email' => 'john@doe.com',
];

try {
    $result = $smscx->updateContactFromGroup($group_id, $phone_number_id, $update_number_request);
    print_r($result);
    // $result->getInfo()->getId();
    // $result->getInfo()->getGroupId();
} catch (InvalidArgumentException $e) {
    //Code for Invalid argument provided
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Group ID or Phone number ID not found    
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\DuplicateValueException $e) {
    //Code for duplicate value    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling GroupsApi->updateContactFromGroup: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **group_id** | **int**| Identifier of a group of contacts | required |
| **phone_number_id** | **string**| Identifier of the phone number | required |
| **update_number_request** | [**\Smscx\Client\Model\UpdateNumberRequest**](../Model/UpdateNumberRequest.md)|  | required |

### Return type

[**\Smscx\Client\Model\UpdateNumberResponse**](../Model/UpdateNumberResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth), [BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
