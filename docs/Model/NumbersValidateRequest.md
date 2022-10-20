# # NumbersValidateRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**phone_numbers** | **string[]** | Array of phone numbers in international E.164 format or national format. If national format is provided, for better validation you must use the parameter &#x60;countryIso&#x60; to provide the country code of the destination phone number. |
**country_iso** | **string** | Two-letter country ISO of the phone number you want to validate. If an international E.164 phone number format is provided the **countryIso** will be ignored | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
