# # DataNewOptout

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**hit_id** | **int** |  |
**optout_id** | **string** | ID of the optout link |
**optout_url** | **string** | URL of the optout link |
**optout_type** | **string** | The method by which the contact has unsubscribed. Value &#x60;link&#x60; means he clicked on the optout link and submitted the form and value &#x60;admin&#x60; it means that the client was added to the optout list by you |
**phone_number** | **string** | Phone number that choose to opt out. | [optional]
**campaign_id** | **string** | Identifier of the campaign from which the contact has unsubscribed. If optout tracking was enabled, this parameter will not be null. | [optional]
**group_id** | **string** | Identifier of the group the contact was in. If optout tracking was enabled, this parameter will not be null. | [optional]
**country_iso** | **string** | Two-letter country ISO of the phone number that unsubscribed. |
**datetime** | **string** |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
