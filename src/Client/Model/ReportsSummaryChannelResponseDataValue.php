<?php
/**
 * ReportsSummaryChannelResponseDataValue
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  Smscx
 * @author   SMS Connexion
 * @link     https://sms.cx
 */

namespace Smscx\Client\Model;
use \Smscx\ObjectSerializer;

/**
 * ReportsSummaryChannelResponseDataValue Class Doc Comment
 *
 * @category Class
 * @description Channel from where the messages were sent
 * @package  Smscx
 * @author   SMS Connexion
 * @link     https://sms.cx
 */
class ReportsSummaryChannelResponseDataValue
{
    /**
     * Possible values of this enum
     */
    public const NUMBER_SMS = 'sms';

    public const NUMBER_VIBER = 'viber';

    public const NUMBER_WHATSAPP = 'whatsapp';

    public const NUMBER_MULTICHANNEL = 'multichannel';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::NUMBER_SMS,
            self::NUMBER_VIBER,
            self::NUMBER_WHATSAPP,
            self::NUMBER_MULTICHANNEL
        ];
    }
}


