# # DataViber

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**msg_id** | **string** | Unique message identifier needed to track the delivery report |
**track_data** | **string** | Client own UUID (v1-v5) provided to track messages | [optional]
**status** | **string** | Possible status of the message at request time:  * &#x60;ACCEPTED&#x60; - Message has been accepted for delivery  * &#x60;SCHEDULED&#x60; - Message has been scheduled at the date time specified  * &#x60;REJECTED&#x60; - Message was rejected because the number has opted out from receiving messages (no balance deduction, cost zero)  * &#x60;NO COVERAGE&#x60; - There is no coverage for this destination, no pricing is set (no balance deduction, cost zero)   The final delivery report (DELIVERED, FAILED) will be sent to the URL provided in the &#x60;dlrCallbackUrl&#x60; parameter or you can query the status at the resource GET &#x60;/reports/single/{msgId}&#x60; |
**status_code** | **int** | Status code for the delivery report |
**error_code** | **int** | Status code for the failed delivery report |
**created_at** | **\DateTime** | Date and time of sending the message |
**scheduled_at** | **\DateTime** | Date and time when the message was scheduled. If the date and time of sending or scheduling is detected to be in the quiet hours interval, the API will schedule the sending of the Viber message at the end of the quiet hours. Eg. If quiet hours is defined between 21:30 and 09:30 and the message sending is at 21:55, then the API will schedule the message the next day at 09:31 | [optional]
**in_quiet_hours** | **bool** | If the date of send or the schedule date of a message is detected to be in the quiet hours of the destination phone number, this parameter will be set to &#x60;true&#x60;. This parameter is &#x60;false&#x60; if no quiet hours detected |
**cost** | **float** | The cost of sending a message, in the currency of the account (**eur** or **usd**). |
**to** | **string** | Destination phone number in E.164 format |
**country_iso** | **string** | Two-letter country code in ISO-3166 alpha 2 standard of the destinations. Eg. DE, FR, IT |
**from** | **string** | Originator (sender name) of the message |
**text** | **string** | The text message sent with all the fields/variables replaced (if any). |
**parts** | **int** | Message parts. For Viber/Whatsapp/Multichannel this variable is always with value 1 |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
