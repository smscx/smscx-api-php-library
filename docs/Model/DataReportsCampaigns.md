# # DataReportsCampaigns

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Unique identifier of the campaign |
**name** | **string** | Name of the sent campaign |
**from** | **string** | Originator (sender name) of the message |
**groups** | [**\Smscx\Client\Model\Group[]**](Group.md) |  |
**total_phone_numers** | **int** | Total recipients of the sent campaign |
**parts** | **int** | Total parts of the sent campaign |
**cost** | **float** | Total cost of the sent campaign |
**text** | **string** | Content of the message |
**source** | **string** | Source of the message sending |
**channel** | **string** | Channel that sent the message |
**datetime_added** | **\DateTime** |  |
**datetime_scheduled** | **\DateTime** |  |
**status** | [**\Smscx\Client\Model\Status**](Status.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
