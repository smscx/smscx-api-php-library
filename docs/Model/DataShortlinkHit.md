# # DataShortlinkHit

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**hit_id** | **int** |  |
**shortlink_id** | **string** | ID of the short link |
**url** | **string** | URL of the short link |
**phone_number** | **string** | Phone number of the visitor that made the hit to the shortlink (works if link tracking option is used when sending a message). If short link tracking was enabled, this parameter will not be null. | [optional]
**campaign_id** | **string** | Identifier of the campaign from which the contact has made the visit. If short link tracking was enabled, this parameter will not be null. | [optional]
**group_id** | **string** | Identifier of the group the contact is in. If short link tracking was enabled, this parameter will not be null. | [optional]
**device** | **string** | Type of device of the visitor |
**browser** | **string** | Type of browser of the visitor that accessed the short link |
**browser_version** | **string** | Browser version of the device that accessed the short link |
**os** | **string** | Operating system of the visitor that accessed the short link (eg. Android, Windows, Linux, etc.) |
**os_version** | **string** | Version of the operating system |
**brand** | **string** | Brand of phone/tablet of the visitor that accessed the short link |
**model** | **string** | Model of phone/tabled of the visitor that accessed the short link (eg. P30 Pro, Galaxy S8, etc.) |
**screen_resolution** | **string** |  |
**accept_language** | **string** |  |
**referrer** | **string** |  |
**ip_address** | **string** | Anonymized IP address without the last byte. Eg. &#x60;204.79.200.0&#x60; |
**country_iso** | **string** | Two-letter country ISO of the visitor that accessed the short link |
**city** | **string** | The city of the visitor that accessed the short link |
**datetime** | **string** |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
