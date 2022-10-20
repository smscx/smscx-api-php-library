# # DataReportCampaign

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**msg_id** | **string** | Unique message identifier |
**status** | **string** | Delivery report of the message |
**status_code** | **int** | Status code for the delivery report |
**error_code** | **int** | Status code for the failed delivery report |
**in_quiet_hours** | **bool** | Specified if the sending was between the saved quiet hours |
**created_at** | **\DateTime** | Date and time of sending the message |
**updated_at** | **\DateTime** | Date and time of last delivery report update of the message |
**scheduled_at** | **\DateTime** | Date and time when the message was scheduled | [optional]
**cost** | **float** | The cost of sending a message, in the currency of the account (**eur** or **usd**). It is calculated as ***cost per message part x parts***. Eg. 3 x 0.041 &#x3D; 0.123  &lt;br&gt;This parameter has value zero (0) if the status of the message is &#x60;REJECTED&#x60; or &#x60;NO COVERAGE&#x60; |
**to** | **string** | Destination phone number in E.164 format |
**country_iso** | **string** | Two-letter country code in ISO-3166 alpha 2 standard of the destinations. Eg. DE, FR, IT |
**from** | **string** | Originator (sender name) of the message |
**text** | **string** | Content of the message |
**source** | **string** | Source of the message sending |
**channel** | **string** | Channel that sent the message |
**text_analysis** | [**\Smscx\Client\Model\TextAnalysis**](TextAnalysis.md) |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
