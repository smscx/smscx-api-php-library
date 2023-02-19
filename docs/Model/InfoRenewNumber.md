# # InfoRenewNumber

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**rent_id** | **string** | Unique identifier of the rent operation |
**number_id** | **string** | Unique identifier of phone number |
**phone_number** | **string** | Rented phone number in international E.164 format |
**country_iso** | **string** | Two-letter country code in ISO-3166 alpha 2 standard. Eg. &#x60;DE&#x60;, &#x60;FR&#x60;, &#x60;IT&#x60; |
**rent_start** | **\DateTime** | Start date and time of the rent period (UTC) |
**rent_end** | **\DateTime** | End date and time of the rent period (UTC) |
**rent_cost** | **float** | Cost of renting the phone number |
**auto_renew** | **bool** | Automatically renews the rent for the number with the same period as the current subscription |
**callback_url** | **string** | Callback URL (or webhook) to get the SMS that is received on the rented phone number (inbound SMS) |
**datetime** | **\DateTime** |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
