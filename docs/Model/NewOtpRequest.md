# # NewOtpRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**phone_number** | **string** | Phone number in international E.164 format or national format. If national format is provided, for better validation you must use the parameter &#x60;countryIso&#x60; to provide the country code of the destination phone number |
**country_iso** | **string** | Country ISO (two-letter) of the destination phone numbers (if provided in national format). Please note that if an international E.164 phone number format is provided in the &#x60;to&#x60; parameter, the **countryIso** will be ignored. Eg. **FR** for France, **GB** for United Kingdom. Note: It is \&quot;GB\&quot;, not \&quot;UK\&quot;, as per the ISO-3166 alpha 2 | [optional]
**from** | **string** | The originator (sender name) of the text message (min 3, max 11 characters). If the originator used in this value is not approved, it will be overwritten by a default system originator (eg. InfoText). Read more about [sender names](#) Note: This parameter is optional and can be used only if you want to overwrite the OTP settings of your SMS API application | [optional]
**template** | **string** | The text message that will be delivered to the mobile number. It must contain the placeholder &#x60;{{pin}}&#x60;.    Note: This parameter is optional and can be used only if you want to overwrite the OTP settings of your SMS API application. [General placeholders](#) can be used in the text template. | [optional]
**track_id** | **string** | Client provided UUID (v1-v5) for tracking purposes | [optional]
**ttl** | **int** | The time to live (ttl) defines the time in seconds that a pin is valid. Min 1 minute (60 seconds) and max 30 minutes (1800 seconds)   Note: If this parameter is set, it will overwrite the setting from [Admin Dashboard &gt; HTTP API &gt; Oauth2 &gt; Application settings](#) | [optional]
**max_attempts** | **int** | Number of attempts to allow the OTP to be verified before marking it as failed  Note: If this parameter is set, it will overwrite the setting from [Admin Dashboard &gt; HTTP API &gt; Oauth2 &gt; Application settings](#) | [optional]
**pin_type** | **string** | Type of pin that will be generated for each mobile phone and will replace the placeholder {{pin}  Note: If this parameter is set, it will overwrite the setting from [Admin Dashboard &gt; HTTP API &gt; Oauth2 &gt; Application settings](#) | [optional]
**pin_length** | **int** | Character length of the pin   Note: If this parameter is set, it will overwrite the setting from [Admin Dashboard &gt; HTTP API &gt; Oauth2 &gt; Application settings](#) | [optional]
**otp_callback_url** | **string** | A valid URL to receive status updates for the OTP verification.   Note: If this parameter is set, it will overwrite the setting from [Admin Dashboard &gt; HTTP API &gt; Oauth2 &gt; Application settings](#) | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
