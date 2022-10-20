# # DataOptouts

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | Identifier of the optout |
**phone_number** | **string** | Phone number in international E.164 format |
**country_iso** | **string** | Two-letter country ISO of the phone number that unsubscribed |
**optout_from** | **string** | Type of optout. **admin** if the contact has been manually added by the admin or **link** if the contact has clicked the optout link |
**campaign_id** | **string** | Identifier of the campaign from which the contact has unsubscribed | [optional]
**group_id** | **string** | Identifier of the group the contact was in | [optional]
**group_name** | **string** | Name of the group the contact was in | [optional]
**campaign_name** | **string** | Name of the campaign from which the contact has unsubscribed | [optional]
**datetime** | **string** |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
