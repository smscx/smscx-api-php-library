# # AddContactsToGroupRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**phone_numbers** | [**\Smscx\Client\Model\GroupAdd[]**](GroupAdd.md) | An array of objects if you want to add custom fields data to your contacts |
**allow_invalid** | **bool** | Set value &#x60;true&#x60; to not throw an error if invalid numbers are detected | [optional] [default to false]
**country_iso** | **string** | Two-letter country ISO of the phone number you want to validate. If an international E.164 phone number format is provided the **countryIso** will be ignored | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
