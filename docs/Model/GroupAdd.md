# # GroupAdd

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**phone_number** | **string** | Phone number in international E.164 format or national format. If national format is provided, for better validation you must use the parameter &#x60;countryIso&#x60; to provide the country code of the destination phone number |
**first_name** | **string** | Data field for first name of the contact. Use placeholder **{{firstName}}** in text message for data replacement | [optional]
**last_name** | **string** | Data field for last name of the contact. Use placeholder **{{lastName}}** in text message for data replacement | [optional]
**email** | **string** | Data field for email of the contact. Use placeholder **{{email}}** in text message for data replacement | [optional]
**field1** | **string** | Data field for extra information of the contact. Use placeholder **{{field1}}** in text message for data replacement | [optional]
**field2** | **string** | Data field for extra information of the contact. Use placeholder **{{field2}}** in text message for data replacement | [optional]
**field3** | **string** | Data field for extra information of the contact. Use placeholder **{{field3}}** in text message for data replacement | [optional]
**field4** | **string** | Data field for extra information of the contact. Use placeholder **{{field4}}** in text message for data replacement | [optional]
**field5** | **string** | Data field for extra information of the contact. Use placeholder **{{field5}}** in text message for data replacement | [optional]
**country_iso** | **string** | Two-letter country ISO of the phone number you want to validate. Please note that if an international E.164 phone number format is provided, the **countryIso** will be ignored | [optional]
**custom_fields** | [**\Smscx\Client\Model\GroupAddCustomFields**](GroupAddCustomFields.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
