# # DataTemplate

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | Identifier of the template |
**name** | **string** | Name of the template |
**text** | **string** | Text of the template |
**channel** | **string** | Channel for wich the template can be used |
**type** | **string** |  |
**rich_media** | [**\Smscx\Client\Model\RichMedia**](RichMedia.md) |  |
**created_at** | **string** |  |
**approved** | **bool** | Approval status of the template (for channel &#x60;sms&#x60; this variable is always &#x60;true&#x60;) |
**locked** | **bool** | If a Viber or Whatsapp template is approved it cannot be edited, so this parameter will be **true** |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
