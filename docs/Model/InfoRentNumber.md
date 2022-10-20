# # InfoRentNumber

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**rent_id** | **string** | Unique identifier of the rent operation |
**rent_cost** | **float** | Cost of renting the phone number for the period chosen |
**setup_cost** | **float** | One time setup fee for the rented phone number (if applicable) |
**rent_period** | **int** | Rental period of the phone number (in days) |
**rent_start** | **\DateTime** | Start date and time of the rental period (UTC) |
**rent_end** | **\DateTime** | End date and time of the rental period (UTC) |
**phone_number** | **string** | Phone number that is rented in international E.164 format |
**country_iso** | **string** | Two-letter country code in ISO-3166 alpha 2 standard. Eg. &#x60;DE&#x60;, &#x60;FR&#x60;, &#x60;IT&#x60; |
**network_operator** | **string** | Network operator of the phone number |
**auto_renew** | **bool** | Status of the auto renewal setting for this number rental |
**sms** | **string[]** | SMS features that the phone number supports (inbound or outbound SMS) |
**voice** | **string[]** | Voice features that the phone number supports |
**min_rent** | **string** | Minimum period that this phone number must be rented (in days) |
**max_rent** | **string** | Maximum period that this phone number can be rented (in days) |
**rental_cost** | [**\Smscx\Client\Model\RentalCost**](RentalCost.md) |  |
**inbound_sms_cost** | **float** | Cost for receiving a SMS on this phone number (most of the time receiving is free, meaning this is has value 0) |
**callback_url** | **string** | Callback URL (or webhook) to get the received SMS on the rented phone number |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
