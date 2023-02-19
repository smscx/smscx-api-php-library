# # DataAvailableNumbersRent

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**number_id** | **string** | Unique identifier of phone number |
**phone_number** | **string** | Phone number in international E.164 format. In some cases this value might be &#x60;null&#x60; as the phone number will be selected random from a pool of numbers |
**country_iso** | **string** | Two-letter country ISO of the phone number |
**network_operator** | **string** | Network operator of the phone number |
**features** | **int** | Sum of features of the phone number, in numerical value. The following are the corresponding values for each feature:  - &#x60;1&#x60; for receiving SMS (inbound SMS)  - &#x60;2&#x60; for sending SMS (outbound SMS)  - &#x60;4&#x60; for voice.      &lt;br&gt; &lt;br&gt;  A phone number with feature &#x60;1&#x60; can only receive SMS, with feature &#x60;2&#x60; can only send SMS, and with feature value &#x60;3&#x60; (1 + 2) cand send and receive SMS |
**number_type** | **string** | Type of phone number |
**inbound_sms_cost** | **float** | Cost for receiving a SMS on this phone number (most of the time receiving is free, meaning this has value 0) |
**outbound_sms_cost** | **float** | Cost for sending a SMS from this phone number. If the number doesn&#39;t have outbound SMS as a feature, this parameter will be &#x60;null&#x60; |
**setup_cost** | **float** | One time setup fee for the rented phone number (if applicable) |
**rent_cost** | [**\Smscx\Client\Model\RentCost[]**](RentCost.md) | Array of objects with cost for every period (in days). If the phone number has a minimum rent period of 30 days, this array will contain only one object with cost for 30 days. If minimum rent is 1 day, then this array will contain 3 objects with cost for 1, 7, 30 days |
**min_rent** | **int** | Minimum period that this phone number must be rented (in days) |
**setup_time** | **string** | The time to setup the number. instant - the number is available immediately, delayed - the number will be available after a period of time (between 10 minutes and few days) |
**registration** | **bool** | Indicates if the phone number requires registration |
**inbound_sms_sender** | **bool** | Indicates if the phone number can receive SMS from alphanumeric sender ID | [optional]
**datetime** | **\DateTime** |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
