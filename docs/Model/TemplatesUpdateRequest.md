# # TemplatesUpdateRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | The name of the template. If this parameter is omitted the name of the template will be set by the API eg. \&quot;Template 2021-06-11 21:00:00\&quot; | [optional]
**text** | **string** | Template text. For channels &#x60;viber&#x60; and &#x60;whatsapp&#x60; the max. length is 1000 characters | [optional]
**channel** | **string** | The channel for wich the template is saved | [optional]
**rich_media** | [**\Smscx\Client\Model\RichMedia**](RichMedia.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
