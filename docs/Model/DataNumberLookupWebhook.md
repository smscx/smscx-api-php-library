# # DataNumberLookupWebhook

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**phone_number** | **string** | Phone number in international E.164 format |
**lookup_bulk_id** | **string** | Unique bulk lookup identifier |
**lookup_id** | **string** | Unique lookup identifier |
**cost** | **float** | The cost of phone number lookup |
**mcc** | **string** | Mobile country code. [See full list of MCC](https://www.itu.int/dms_pub/itu-t/opb/sp/T-SP-E.212B-2018-PDF-E.pdf) |
**mccmnc** | **string** | Mobile country code + Mobile network code. [See full list of MCC + MNC](https://www.itu.int/dms_pub/itu-t/opb/sp/T-SP-E.212B-2018-PDF-E.pdf) |
**country_iso** | **string** | Two-letter country code in ISO-3166 alpha 2 standard of the destinations. Eg. &#x60;DE&#x60;, &#x60;FR&#x60;, &#x60;IT&#x60; |
**country_name** | **string** | Name of the country of the phone number |
**country_name_locale** | **string** | Name of the country in local language |
**status** | **string** | Status of the phone number |
**status_description** | **string** | Short description of the status |
**ported** | **bool** | Returns &#x60;true&#x60; if the phone number is ported to other mobile network, &#x60;false&#x60; otherwise |
**roaming** | **bool** | Returns &#x60;true&#x60; if the phone number is roaming in other network, &#x60;false&#x60; otherwise |
**original_network** | [**\Smscx\Client\Model\OriginalNetwork**](OriginalNetwork.md) |  |
**ported_network** | [**\Smscx\Client\Model\PortedNetwork**](PortedNetwork.md) |  |
**roaming_network** | [**\Smscx\Client\Model\RoamingNetwork**](RoamingNetwork.md) |  |
**datetime** | **\DateTime** | Date and time of the phone number lookup request |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
