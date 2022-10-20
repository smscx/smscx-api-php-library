# # RentNumberRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**number_id** | **string** | Unique identifier of the phone number from the available rental list |
**rent_period** | **int** | Rental period of the phone number (in days) |
**auto_renew** | **bool** | Auto renew the rental of the phone number at the end of the rental period | [optional] [default to false]
**callback_url** | **string** | Callback URL (or webhook) to get the received SMS on the rented phone number | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
