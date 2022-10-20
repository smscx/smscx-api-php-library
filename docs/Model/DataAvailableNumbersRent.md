# # DataAvailableNumbersRent

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**number_id** | **string** | Unique identifier of phone number |
**phone_number** | **string** | Phone number in international E.164 format. In some cases this value might be null as the phone number will be selected random from a pool of numbers |
**country_iso** | **string** | Two-letter country ISO of the phone number |
**network_operator** | **string** | Network operator of the phone number |
**sms** | **string[]** | SMS features that the phone number supports (inbound or outbound SMS) |
**voice** | **string[]** | Voice features that the phone number supports |
**min_rent** | **string** | Minimum period that this phone number must be rented (in days) |
**max_rent** | **string** | Maximum period that this phone number can be rented (in days) |
**setup_cost** | **float** | One time setup fee for the rented phone number (if applicable) |
**rental_cost** | [**\Smscx\Client\Model\RentalCost**](RentalCost.md) |  |
**inbound_sms_cost** | **float** | Cost for receiving a SMS on this phone number (most of the time receiving is free, meaning this is has value 0) |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
