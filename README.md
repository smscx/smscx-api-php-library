# smscx-api-php-library

![SMS Connexion + PHP logo](https://sms.cx/assets/img/sms-connexion-logo-smscx-x2.png)

The SMS Connexion API PHP library provides convenient access to the SMS API of SMS.CX from applications written in the PHP language.

Using this library you can send SMS, create groups of contacts, import contacts, validate phone numbers, lookup phone numbers, generate OTP, create short links, and more.
  
For more information, please visit [https://sms.cx](https://sms.cx)

## Installation

### Requirements

PHP 7.4 and later.
Works with PHP 8.0.

### Composer

To install the library it is recommended that you use [Composer](https://getcomposer.org/):

```bash
$ composer require smscx/smscx-api-php-library
```

The above command will install the library and all required dependencies.

To use the library, use Composer's [autoload](https://getcomposer.org/doc/01-basic-usage.md#autoloading):

```php
require_once('vendor/autoload.php');
```

## Dependencies

The library require the following extensions in order to work properly:

-   [`ext-curl`](https://secure.php.net/manual/en/book.curl.php)
-   [`ext-json`](https://secure.php.net/manual/en/book.json.php)
-   [`ext-mbstring`](https://www.php.net/manual/en/book.mbstring.php)
-   [`Guzzle`](https://github.com/guzzle/guzzle) (PHP HTTP client that makes it easy to send HTTP requests )
-   [`GuzzleHttp\Psr7`](https://github.com/guzzle/psr7) (PSR-7 interface for requests, responses, and streams)

If you use Composer, these dependencies should be handled automatically. If you install manually, you'll want to make sure that these extensions are available.

## Authentication

To use the library you must authenticate. SMS.CX PHP Library supports the authentication methods supported by the SMS Connexion API:
 - [API Key](#1-api-key)
 - [Oauth2 Access Token](#2-oauth2-access-token)

### 1. API Key

To create a new API Key go to [SMS.CX Account > HTTP API > API Keys](https://account.sms.cx/) and click on **New API Key**.

![Create new API KEY from SMS.CX Dashboard](https://sms.cx/assets/img/docs/dashboard-apikeys.png) 

Copy the API Key and use it in the library.


### 2. Oauth2 Access Token

Access tokens are used by applications to make API requests.

To create a new application go to [SMS.CX Account > HTTP API > Applications](https://account.sms.cx/) and click on **New Application**.  

When you have the Application ID and Application Secret, you can use them to request an access token that you can use to make API calls.


![Create new application from SMS.CX Dashboard](https://sms.cx/assets/img/docs/dashboard-tokens.png)  

Copy the `APPLICATION_ID` and `APPLICATION_SECRET` and use them to request an access token:

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

$config = Smscx\Configuration::getDefaultConfiguration()
              ->setApplicationId('YOUR_APPLICATION_ID')
              ->setApplicationSecret('YOUR_APPLICATION_SECRET');

$smscx = new Smscx\Api\OauthApi(
    new GuzzleHttp\Client(),
    $config
);
// A list of space-delimited, case-sensitive strings. If left empty or ommited,
// the issued access token will be granted with all scopes (full privileges)
$scopes = ''; 

try {
    $result = $smscx->getAccessToken($scopes);
    $accessToken = $result->getAccessToken();
    $expiresIn = $result->getExpiresIn();
    print_r($result);
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

Access tokens provide three main security benefits over using an API Key:

- **Revocable access**. Access tokens can be revoked, removing access for only that token without having to change your API Key everywhere.
- **Limited access**. Access tokens have access scopes which allow for more granular access to API resources. For instance, you can grant access only to send SMS but not to get groups of contacts.
- **Short lifetime**. Access tokens have an expire time (1 day, 1 week) which reduces the risk of the token being compromised.


## Usage

The library needs to be configured with your account's Application ID & secret or API Key which are available in your SMS.CX Dashboard. 

The following example will send SMS to a single phone number:

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Api\SmsApi(
    new GuzzleHttp\Client(),
    $config
);

$send_sms_message_request = [
    'to' => '+31612469xxx',
    'from' => 'InfoText',
    'text' => 'Your confirmation code is 15997',
];

try {
    $result = $smscx->sendSms($send_sms_message_request);
    print_r($result);
    //$result->getInfo()->getTotalCost();
} catch (Smscx\Client\Exception\NoCoverageException $e) {
    //Code for No coverage
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\InvalidPhoneNumberException $e) {
    //Code for Invalid phone number    
} catch (Smscx\Client\Exception\InsufficientBalanceException $e) {
    //Code for Insufficient balance
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling SmsApi->sendSms: ', $e->getMessage(), PHP_EOL;
    // $http_code = $e->getCode();  # For HTTP response code: 400, 401, 403, 429, 500, etc
    // $error_type = $e->getResponseObject()->getError()->getType();  # For type of error: invalid_param, insufficient_credit, rate_limit, etc
    // $error_message = $e->getResponseObject()->getError()->getMessage();  # Short description of the error
    // $error_code = $e->getResponseObject()->getError()->getCode();  # API internal error code: 1208, 1101, 1221, etc    
}
```

### Example of bulk SMS sending (up to 25.000 destination phone numbers)

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Api\SmsApi(
    new GuzzleHttp\Client(),
    $config
);

$send_sms_message_request = [
    //Max 25.000 phone numbers
    'to' => [
        '+31612469xxx', 
        '+4474005085xx', 
        '+49151238353xx', 
        '+417811126xx', 
        '+3519123350xx', 
        '+4206016090xx',
        '+359483059xx',
        '+336127904xx',
        '+436645595xx',
        '+3519121385xx',
        '+3069125917xx',
    ],
    'from' => 'InfoText',
    'text' => 'Redeem this voucher and you will get 30% discount off all Summer Fashion {{optoutLink}}',
    'allowInvalid' => true,
    'transliteration' => [
        'alphabet' => 'NON_GSM',
        'removeEmojis' => true,
    ],
    'idempotencyId' => '854cd53f-d77d-4aa8-9bd9-fbf720f3332d',
];

try {
    $result = $smscx->sendSms($send_sms_message_request);
    print_r($result);
    //$result->getInfo()->getTotalCost();
    //$result->getInfo()->getInvalid();    
} catch (Smscx\Client\Exception\NoCoverageException $e) {
    //Code for No coverage
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\InvalidPhoneNumberException $e) {
    //Code for Invalid phone number    
} catch (Smscx\Client\Exception\InsufficientBalanceException $e) {
    //Code for Insufficient balance
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling SmsApi->sendSms: ', $e->getMessage(), PHP_EOL;
    // $http_code = $e->getCode();  # For HTTP response code: 400, 401, 403, 429, 500, etc
    // $error_type = $e->getResponseObject()->getError()->getType();  # For type of error: invalid_param, insufficient_credit, rate_limit, etc
    // $error_message = $e->getResponseObject()->getError()->getMessage();  # Short description of the error
    // $error_code = $e->getResponseObject()->getError()->getCode();  # API internal error code: 1208, 1101, 1221, etc    
}
```

## Handling errors

With this client library, you don’t need to check for non-200 HTTP responses. The library translates them as exceptions.  

In some specific rare cases you may need to analyze the [Error object](#) for `type` and `code` properties.  

To handle errors, use these two techniques:

- Catch Exceptions
- Analyze and handle the [Error object](#) provided in the response body

### 1. Catch Exceptions

The SMS.CX PHP library raises an exception for every error type. It is recommended to catch and handle exceptions.

To catch an exception, use PHP’s `try`/`catch` syntax. SMS Connexion provides many exception classes you can catch. Each one represents a different kind of error. When you catch an exception, you can use its class to choose a response.

#### General exceptions:
- `DuplicateIdException` - A resource with the same ID already exist
- `DuplicateValueException` - You are trying to create/update a resource that must be unique (eg. originators, group name, shortlinks, template name)
- `InsufficientScopeException` - Your application does not have the privilege to access a resource
- `InvalidCredentialsException` - Unable to authenticate you based on the information provided. 
- `InvalidRequestException` - The parameters provided were invalid
- `InvalidScopeException` - The scope requested does not exist
- `RateLimitExcedeedException` - You made too many API calls in short period of time.
- `ResourceNotFoundException` - The ID of the requested resource was not found (eg. group, campaign, otp, shortlink, template, etc.)
- `ApiMethodNotAllowedException` - The target resource doesn’t support this HTTP method
- `AccessDeniedException` - You don’t have permission to perform an action (eg. editing a template that was locked, replying to an Whatsapp after more than 24 hours passed from client reply, etc.)
- `ServerErrorException` - Something went wrong on SMS Connexion’s side.
- `ApiException` - Something went wrong on SMS Connexion’s side

#### Exceptions for methods that validate numbers or incur costs (to send SMS, add phone numbers to groups, validate number, etc.):
- `InsufficientBalanceException` - Your request incurs charges in excess of your existing balance. 
- `InvalidPhoneNumberException` - The phone number provided is not valid

#### Exceptions for methods that require network coverage (send SMS, Viber, Whatsapp):
- `NoCoverageException` - There is no coverage for the destination requested (these are rare)

#### Exceptions for Otp:
- `InvalidPinException` - The PIN provided does not verify with our records
- `OtpAlreadyVerifiedException` - The OTP was already verified
- `OtpCancelledException` - You cannot verify an OTP that was cancelled
- `OtpActionNotAllowedException` - You cannot cancel an OTP that has non-pending status (eg. was already verified, canceled, or expired)
- `OtpExpiredException` - You cannot verify an OTP that was expired
- `OtpFailedException` - The OTP verification has failed because the numbers of max attempts was reached

#### Exceptions for Viber/Whatsapp:
- `ChannelNotActiveException` - Channel is not active. You need to register Viber and Whatsapp by contacting us
- `TemplateNotApprovedException` - Template for sending Viber or Whatsapp is not approved

### 2. Analyze Error object

The error object ( [**\Smscx\Client\Model\Error**](docs/Model/Error.md) ), which is present in all Exceptions, store information about failures. 

If you don’t want to rely on our existing Exceptions, you might need to analyze the details of the Error object.  

You can retrieve the error object and examine it to learn more about the failure. Choose an appropriate response according on the error type. Check the examples provided to learn how to get the HTTP code and the error object.

A range of different error types are returned by the API, correlated with their HTTP codes:
- HTTP 400 Bad Request for error type `invalid_param`, `insufficient_credit`
- HTTP 401 Unauthorized for `invalid_api_key`, `invalid_client`
- HTTP 404 Not Found for `not_found`
- HTTP 429 Too Many Requests for `rate_limit`

Read the complete list of [error types and codes](https://sms.cx/sms-api-documentation/#section/Errors) from the API specification.

### Example of error handling

```php
try {
    // Method
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    // Code for this situation
} catch (Smscx\Client\Exception\RateLimitExcedeedException $e) {
    // Wait some time and retry the request
    $retryAfter = $e->getHeader('X-Rate-Limit-Reset'); //Unix timestamp eg. 1664103086
} catch (Smscx\Client\Exception\ServerErrorException $e) {
    // Code for this situation
} catch (Smscx\Client\Exception\ApiException $e) {
    // If you want to analyze the Error object
    $httpCode = $e->getCode();
    $errorType = $e->getResponseObject()->getError()->getType();
    $errorMessage = $e->getResponseObject()->getError()->getMessage();
    $errorCode = $e->getResponseObject()->getError()->getCode();
}
```

In special cases, when using methods to validate phone numbers in bulk or when adding phone numbers to an existing group, the `Error` object will contain a [**list with invalid**](docs/Model/Model400InvalidPhoneNumbers.md) phone numbers (if the parameter `allowInvalid` was not set to true or if not a single valid number was detected).

```php
$invalidPhoneNumbers = $e->getResponseObject()->getError()->getInvalid();
/*
Returns array of invalid numbers:
[
  "+336123",
  "+336123",
  "+44158994578",
  "+39677814354",
  "+336259987345",
]
*/
```

## Rate limit

To detect an API rate limit error, you can catch the Exception `RateLimitExcedeedException` or check the Error object for error type `rate_limit` or check if the HTTP code is `429`:

```php
try {
    // Method
} catch (Smscx\Client\Exception\RateLimitExcedeedException $e) {
    //Rate limited
    $retryAfter = $e->getHeader('X-Rate-Limit-Reset'); //Unix timestamp eg. 1664103086
}
```

## Documentation 
Full documentation of the API is available [here](https://sms.cx/sms-api-documentation/).  
The [docs folder](/docs) provides detailed guides for using this library (methods, models, examples).
The [examples folder](/examples) provides an example for each method.


## Available methods

Read the documentation for each method to get more examples, complete parameter list, expected responses and list of error codes.



### Class AccountApi

Method | Description
| ------------- | -------------
| [**getAccountBalance()**](docs/Api/AccountApi.md#getaccountbalance) | Get account balance
| [**getChannelPricing()**](docs/Api/AccountApi.md#getchannelpricing) | Get channels pricing
| [**getChannelPricingByCountryIso()**](docs/Api/AccountApi.md#getchannelpricingbycountryiso) | Get pricing for channel by country iso
| [**getChannelsStatus()**](docs/Api/AccountApi.md#getchannelsstatus) | Get status of all channels



### Class ApplicationsApi

Method | Description
| ------------- | -------------
| [**getApplicationSettings()**](docs/Api/ApplicationsApi.md#getapplicationsettings) | Get application settings
| [**getApplicationsList()**](docs/Api/ApplicationsApi.md#getapplicationslist) | Get applications list
| [**getScopes()**](docs/Api/ApplicationsApi.md#getscopes) | Get scopes



### Class AttachmentsApi

Method | Description
| ------------- | -------------
| [**deleteAttachment()**](docs/Api/AttachmentsApi.md#deleteattachment) | Delete attachment
| [**exportAttachmentHitsToCSV()**](docs/Api/AttachmentsApi.md#exportattachmenthitstocsv) | Export attachment hits to CSV
| [**exportAttachmentHitsToXLSX()**](docs/Api/AttachmentsApi.md#exportattachmenthitstoxlsx) | Export attachment hits to XLSX
| [**getAttachmentHits()**](docs/Api/AttachmentsApi.md#getattachmenthits) | Get attachment hits
| [**getAttachmentsList()**](docs/Api/AttachmentsApi.md#getattachmentslist) | Get attachments list



### Class ConversationsApi

Method | Description
| ------------- | -------------
| [**getConversation()**](docs/Api/ConversationsApi.md#getconversation) | Get conversation
| [**getConverstionsList()**](docs/Api/ConversationsApi.md#getconverstionslist) | Get conversations list
| [**markConversationAsRead()**](docs/Api/ConversationsApi.md#markconversationasread) | Mark conversation as read
| [**sendConversationReplySms()**](docs/Api/ConversationsApi.md#sendconversationreplysms) 💰 | Send conversation reply via SMS
| [**sendConversationReplyViber()**](docs/Api/ConversationsApi.md#sendconversationreplyviber) 💰 | Send conversation reply via Viber
| [**sendConversationReplyWhatsapp()**](docs/Api/ConversationsApi.md#sendconversationreplywhatsapp) 💰 | Send conversation reply via Whatsapp



### Class GroupsApi

Method | Description
| ------------- | -------------
| [**addContactsToGroup()**](docs/Api/GroupsApi.md#addcontactstogroup) | Add contacts to group
| [**createGroup()**](docs/Api/GroupsApi.md#creategroup) | Create new group
| [**deleteContactFromGroup()**](docs/Api/GroupsApi.md#deletecontactfromgroup) | Delete contact from group
| [**deleteGroup()**](docs/Api/GroupsApi.md#deletegroup) | Delete group
| [**emptyGroup()**](docs/Api/GroupsApi.md#emptygroup) | Empty group
| [**exportGroupToCSV()**](docs/Api/GroupsApi.md#exportgrouptocsv) | Export group to CSV
| [**exportGroupToXLSX()**](docs/Api/GroupsApi.md#exportgrouptoxlsx) | Export group to XLSX
| [**getGroupDetails()**](docs/Api/GroupsApi.md#getgroupdetails) | Get group details
| [**getGroupsList()**](docs/Api/GroupsApi.md#getgroupslist) | Get list of groups
| [**updateContactFromGroup()**](docs/Api/GroupsApi.md#updatecontactfromgroup) | Update contact from group



### Class MultichannelApi

Method | Description
| ------------- | -------------
| [**deleteScheduledMultichannelCampaign()**](docs/Api/MultichannelApi.md#deletescheduledmultichannelcampaign) | Delete scheduled Multichannel campaign
| [**deleteScheduledMultichannelMessage()**](docs/Api/MultichannelApi.md#deletescheduledmultichannelmessage) | Delete scheduled Multichannel message
| [**estimateMultichannelCampaign()**](docs/Api/MultichannelApi.md#estimatemultichannelcampaign) | Estimate Multichannel campaign
| [**estimateMultichannelMessage()**](docs/Api/MultichannelApi.md#estimatemultichannelmessage) | Estimate Multichannel message
| [**sendMultichannelCampaign()**](docs/Api/MultichannelApi.md#sendmultichannelcampaign) 💰 | Send Multichannel campaign
| [**sendMultichannelMessage()**](docs/Api/MultichannelApi.md#sendmultichannelmessage) 💰 | Send Multichannel message



### Class NumbersApi

Method | Description
| ------------- | -------------
| [**getBulkLookupStatus()**](docs/Api/NumbersApi.md#getbulklookupstatus) | Get Bulk Lookup result
| [**getSingleLookupStatus()**](docs/Api/NumbersApi.md#getsinglelookupstatus) | Get Single Lookup result
| [**lookupNumber()**](docs/Api/NumbersApi.md#lookupnumber) 💰 | Lookup number
| [**lookupNumbers()**](docs/Api/NumbersApi.md#lookupnumbers) 💰 | Lookup numbers in bulk
| [**validateNumber()**](docs/Api/NumbersApi.md#validatenumber) | Validate number
| [**validateNumbers()**](docs/Api/NumbersApi.md#validatenumbers) | Validate numbers in bulk
| [**getAvailableNumbers()**](docs/Api/NumbersApi.md#getAvailableNumbers) | Get available numbers for rent |
| [**rentNumber()**](docs/Api/NumbersApi.md#rentNumber) 💰 | Rent phone number |
| [**cancelRent()**](docs/Api/NumbersApi.md#cancelRent) | Cancel rent for phone number |
| [**renewRent()**](docs/Api/NumbersApi.md#renewRent) 💰 | Renew rent for phone number |
| [**getRentStatus()**](docs/Api/NumbersApi.md#getRentStatus) | Get status of rent |
| [**getRentedNumbers()**](docs/Api/NumbersApi.md#getRentedNumbers) | Get list of your rented numbers |
| [**getInboundSms()**](docs/Api/NumbersApi.md#getInboundSms) | Get inbound SMS from rented number |


### Class OauthApi

Method | Description
| ------------- | -------------
| [**getAccessToken()**](docs/Api/OauthApi.md#getaccesstoken) | Get access token



### Class OptoutsApi

Method | Description
| ------------- | -------------
| [**addContactToOptoutsList()**](docs/Api/OptoutsApi.md#addcontacttooptoutslist) | Add contact to optouts list
| [**deleteContactFromOptoutsList()**](docs/Api/OptoutsApi.md#deletecontactfromoptoutslist) | Delete contact from optouts list
| [**exportOptoutsToCSV()**](docs/Api/OptoutsApi.md#exportoptoutstocsv) | Export optouts to CSV
| [**exportOptoutsToXLSX()**](docs/Api/OptoutsApi.md#exportoptoutstoxlsx) | Export optouts to XLSX
| [**getOptoutsList()**](docs/Api/OptoutsApi.md#getoptoutslist) | Get optouts list



### Class OriginatorsApi

Method | Description
| ------------- | -------------
| [**createOriginator()**](docs/Api/OriginatorsApi.md#createoriginator) | Create new originator
| [**deleteOriginator()**](docs/Api/OriginatorsApi.md#deleteoriginator) | Delete originator
| [**getOriginatorsList()**](docs/Api/OriginatorsApi.md#getoriginatorslist) | Get originators list



### Class OtpApi

Method | Description
| ------------- | -------------
| [**cancelOtp()**](docs/Api/OtpApi.md#cancelotp) | Cancel OTP
| [**getOtpStatus()**](docs/Api/OtpApi.md#getotpstatus) | Get OTP status
| [**newOtp()**](docs/Api/OtpApi.md#newotp) 💰 | New OTP
| [**verifyOtp()**](docs/Api/OtpApi.md#verifyotp) | Verify OTP



### Class ReportsApi

Method | Description
| ------------- | -------------
| [**exportAdvancedReportToCSV()**](docs/Api/ReportsApi.md#exportadvancedreporttocsv) | Export advanced report to CSV
| [**exportAdvancedReportToXLSX()**](docs/Api/ReportsApi.md#exportadvancedreporttoxlsx) | Export advanced report to XLSX
| [**exportCampaignReportToCSV()**](docs/Api/ReportsApi.md#exportcampaignreporttocsv) | Export campaign report to CSV
| [**exportCampaignReportToXLSX()**](docs/Api/ReportsApi.md#exportcampaignreporttoxlsx) | Export campaign report to XLSX
| [**getAdvancedReport()**](docs/Api/ReportsApi.md#getadvancedreport) | Get advanced report
| [**getCampaignReport()**](docs/Api/ReportsApi.md#getcampaignreport) | Get campaign report
| [**getCampaignsList()**](docs/Api/ReportsApi.md#getcampaignslist) | Get list of sent campaigns
| [**getSingleReport()**](docs/Api/ReportsApi.md#getsinglereport) | Get report for single SMS or Viber or Whatsapp or Multichannel
| [**getSummaryReports()**](docs/Api/ReportsApi.md#getsummaryreports) | Get summary reports for a dimension



### Class ShortlinksApi

Method | Description
| ------------- | -------------
| [**createShortlink()**](docs/Api/ShortlinksApi.md#createshortlink) | Create shortlink
| [**deleteShortlink()**](docs/Api/ShortlinksApi.md#deleteshortlink) | Delete shortlink
| [**exportShortlinkHitsToCSV()**](docs/Api/ShortlinksApi.md#exportshortlinkhitstocsv) | Export shortlink hits to CSV
| [**exportShortlinkHitsToXLSX()**](docs/Api/ShortlinksApi.md#exportshortlinkhitstoxlsx) | Export shortlink hits to XLSX
| [**getShortlinkHits()**](docs/Api/ShortlinksApi.md#getshortlinkhits) | Get shortlink hits
| [**getShortlinksList()**](docs/Api/ShortlinksApi.md#getshortlinkslist) | Get shortlinks list
| [**updateShortlink()**](docs/Api/ShortlinksApi.md#updateshortlink) | Update shortlink



### Class SmsApi

Method | Description
| ------------- | -------------
| [**deleteScheduledSms()**](docs/Api/SmsApi.md#deletescheduledsms) | Delete scheduled SMS
| [**deleteScheduledSmsCampaign()**](docs/Api/SmsApi.md#deletescheduledsmscampaign) | Delete scheduled SMS campaign
| [**estimateSms()**](docs/Api/SmsApi.md#estimatesms) | Estimate new SMS
| [**estimateSmsCampaign()**](docs/Api/SmsApi.md#estimatesmscampaign) | Estimate SMS campaign
| [**sendSms()**](docs/Api/SmsApi.md#sendsms) 💰 | Send SMS
| [**sendSmsCampaign()**](docs/Api/SmsApi.md#sendsmscampaign) 💰 | Send SMS campaign



### Class TemplatesApi

Method | Description
| ------------- | -------------
| [**createTemplate()**](docs/Api/TemplatesApi.md#createtemplate) | Create template
| [**deleteTemplate()**](docs/Api/TemplatesApi.md#deletetemplate) | Delete template
| [**getTemplate()**](docs/Api/TemplatesApi.md#gettemplate) | Get template
| [**getTemplatesList()**](docs/Api/TemplatesApi.md#gettemplateslist) | Get templates list
| [**updateTemplate()**](docs/Api/TemplatesApi.md#updatetemplate) | Update template



### Class ViberApi

Method | Description
| ------------- | -------------
| [**deleteScheduledViberCampaign()**](docs/Api/ViberApi.md#deletescheduledvibercampaign) | Delete scheduled Viber campaign
| [**deleteScheduledViberMessage()**](docs/Api/ViberApi.md#deletescheduledvibermessage) | Delete scheduled Viber message
| [**estimateViberCampaign()**](docs/Api/ViberApi.md#estimatevibercampaign) | Estimate Viber campaign
| [**estimateViberMessage()**](docs/Api/ViberApi.md#estimatevibermessage) | Estimate Viber message
| [**sendViberCampaign()**](docs/Api/ViberApi.md#sendvibercampaign) 💰 | Send Viber campaign
| [**sendViberMessage()**](docs/Api/ViberApi.md#sendvibermessage) 💰 | Send Viber message



### Class WhatsappApi

Method | Description
| ------------- | -------------
| [**deleteScheduledWhatsappMessage()**](docs/Api/WhatsappApi.md#deletescheduledwhatsappmessage) | Delete scheduled Whatsapp message
| [**estimateWhatsappMessage()**](docs/Api/WhatsappApi.md#estimatewhatsappmessage) | Estimate Whatsapp message
| [**sendWhatsappMessage()**](docs/Api/WhatsappApi.md#sendwhatsappmessage) 💰 | Send Whatsapp message




## Authorization

### ApiKeyAuth

- **Type**: API key
- **API key parameter name**: X-API-KEY
- **Location**: HTTP header



### BasicAuth

- **Type**: HTTP basic authentication


### BearerAuth

- **Type**: Bearer authentication

## Tests

To run the tests, use:

```bash
composer install
vendor/bin/phpunit
```

## Author

dev@sms.cx

## About this package

- Client library version: `0.1.0`
- API version: `1.0.2`

## License

[Apache 2.0](LICENSE) © 2022 SMS Connexion