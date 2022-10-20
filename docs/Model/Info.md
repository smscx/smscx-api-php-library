# # Info

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**campaign_id** | **string** | Unique identifier of the campaign |
**total_phone_numbers** | **int** | Total phone numbers submitted for processing |
**total_valid** | **int** | Total valid phone numbers after validation |
**total_invalid** | **int** | Total invalid phone numbers after validation |
**total_cost** | **float** | Total cost of sending the message |
**total_parts** | **int** | Total message parts |
**dlr_callback_url** | **string** | Callback URL for receiving the delivery report |
**phone_numbers_by_country** | [**\Smscx\Client\Model\PhoneNumbersByCountry**](PhoneNumbersByCountry.md) |  |
**transliteration_analysis** | [**\Smscx\Client\Model\TransliterationAnalysis**](TransliterationAnalysis.md) |  | [optional]
**total_in_quiet_hours** | **int** | Total phone numbers that were detected to be inside the interval of quiet hours | [optional]
**invalid** | **string[]** | An array with numbers that were detected to be invalid | [optional]
**scheduled** | **bool** | Confirmation that the message/campaign was scheduled at a later date |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
