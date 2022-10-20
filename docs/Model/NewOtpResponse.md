# # NewOtpResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**otp_id** | **string** | Unique identifier of the OTP request |
**track_id** | **string** | Client provided UUID (v1-v5) for tracking purposes |
**phone_number** | **string** | The phone number where the pin was sent |
**country_iso** | **string** | The country ISO of the phone numver. Eg. &#x60;DE&#x60;, &#x60;FR&#x60;, &#x60;IT&#x60; |
**status** | **string** | Status of the OTP request. The initial status is &#x60;PENDING&#x60; |
**cost** | **float** | The cost of the OTP request |
**parts** | **int** | Message parts |
**max_attempts** | **int** | Number of attempts to allow the OTP to be verified before marking it as failed Note: If this parameter is set, it will overwrite the setting from [Admin Dashboard &gt; HTTP API &gt; Oauth2 &gt; Application settings](#) |
**attempts** | **int** | Number of unsuccessful attempts made to validate the pin |
**ttl** | **int** | The time to live (ttl) defines the time in seconds that a pin is valid. Min 1 minute (60 seconds) and max 30 minutes (1800 seconds)  Note: If this parameter is set, it will overwrite the setting from [Admin Dashboard &gt; HTTP API &gt; Oauth2 &gt; Application settings](#) |
**otp_callback_url** | **string** | The webhook where request will be made with status upddates for the OTP |
**date_created** | **\DateTime** | Datetime of the OTP request |
**date_expires** | **\DateTime** | Datetime of the OTP request expiration. After this date and time the pin will no longer be valid |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
