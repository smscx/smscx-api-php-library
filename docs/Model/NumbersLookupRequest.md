# # NumbersLookupRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**phone_numbers** | **string[]** | Array of phone numbers in international E.164 format or national format. If national format is provided, for better validation/lookup you must use the parameter &#x60;countryIso&#x60; to provide the country code of the destination phone number. | required
**country_iso** | **string** | Two-letter country ISO of the phone number you want to lookup. If an international E.164 phone number format is provided the **countryIso** will be ignored | [optional]
**lookup_callback_url** | **string** | A valid URL to receive results for the phone number lookup.   Note: If this parameter is set, it will overwrite the setting from [Admin Dashboard &gt; HTTP API &gt; Oauth2 &gt; Application settings](#) | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
