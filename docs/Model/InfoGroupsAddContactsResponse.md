# # InfoGroupsAddContactsResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**total_cost** | **float** | Total cost to send a message to the phone numbers added to group |
**total_valid** | **int** | Total valid phone numbers added to the group |
**total_invalid** | **int** | Total invalid phone numbers |
**total_duplicates** | **int** | Total duplicates phone numbers found |
**total_phone_numbers** | **int** | Total submitted phone numbers to be added to the group |
**phone_numbers_by_country** | [**\Smscx\Client\Model\PhoneNumbersByCountry**](PhoneNumbersByCountry.md) |  |
**invalid** | **string[]** | List with all the invalid phone numbers detected |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
