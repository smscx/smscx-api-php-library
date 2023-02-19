# # InfoRentStatus

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**rent_id** | **string** | Unique identifier of the rent operation |
**number_id** | **string** | Unique identifier of the phone number |
**phone_number** | **string** | Phone number that is rented in international E.164 format |
**country_iso** | **string** | Two-letter country code in ISO-3166 alpha 2 standard. Eg. &#x60;DE&#x60;, &#x60;FR&#x60;, &#x60;IT&#x60; |
**network_operator** | **string** | Network operator of the phone number |
**features** | **int** | Sum of features of the phone number, in numerical value. The following are the corresponding values for each feature:  - &#x60;1&#x60; for receiving SMS (inbound SMS)  - &#x60;2&#x60; for sending SMS (outbound SMS)  - &#x60;4&#x60; for voice.      &lt;br&gt; &lt;br&gt;  A phone number with feature &#x60;1&#x60; can only receive SMS, with feature &#x60;2&#x60; can only send SMS, and with feature value &#x60;3&#x60; (1 + 2) cand send and receive SMS |
**number_type** | **string** | Type of phone number. |
**rent_cost** | **float** | Cost of renting the phone number for the current period |
**setup_cost** | **float** | The one time setup fee that was charged at the initial rent of the phone number (if applicable) |
**rent_period** | **int** | Current period of the phone number rent (in days) |
**rent_start** | **\DateTime** | Start date and time of the rent period (UTC) |
**rent_end** | **\DateTime** | End date and time of the rent period (UTC) |
**inbound_sms_cost** | **float** | Cost for receiving a SMS on this phone number (most of the time receiving is free, meaning this has value 0) |
**outbound_sms_cost** | **float** | Cost for sending a SMS from this phone number. If the number doesn&#39;t have outbound SMS as a feature, this parameter will be &#x60;null&#x60; |
**renew_cost** | [**\Smscx\Client\Model\RenewCost[]**](RenewCost.md) | Array of objects with cost for rent renewal. If the number has minimum rent period of 30 days, this array will contain only one object with 30 days |
**inbound_sms** | [**\Smscx\Client\Model\InboundSms**](InboundSms.md) |  |
**outbound_sms** | [**\Smscx\Client\Model\OutboundSms**](OutboundSms.md) |  |
**min_rent** | **int** | Minimum period that this phone number can be rented/renewed (in days) |
**callback_url** | **string** | Callback URL (or webhook) to get the SMS received on the rented phone number (inbound SMS) |
**auto_renew** | **bool** | Automatically renews the rent for the number with the same period as the current subscription |
**inbound_sms_sender** | **bool** | Indicates if the phone number can receive SMS from alphanumeric sender ID | [optional]
**active_rent** | **bool** | Indicates if the rent is active (not canceled or subscription not expired) |
**approved** | **bool** | If the phone number requires registration, this parameter indicates if the phone number was approved. Value &#x60;true&#x60; means number approved, &#x60;false&#x60; means processing |
**datetime** | **\DateTime** |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
