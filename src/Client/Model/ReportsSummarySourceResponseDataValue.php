<?php
/**
 * ReportsSummarySourceResponseDataValue
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
 * ReportsSummarySourceResponseDataValue Class Doc Comment
 *
 * @category Class
 * @description Source from where the messages were sent
 * @package  Smscx
 * @author   SMS Connexion
 * @link     https://sms.cx
 */
class ReportsSummarySourceResponseDataValue
{
    /**
     * Possible values of this enum
     */
    public const NUMBER_API = 'api';

    public const NUMBER_EXCEL = 'excel';

    public const NUMBER_CAMPAIGNS = 'campaigns';

    public const NUMBER_SMPP = 'smpp';

    public const NUMBER_PLUGIN = 'plugin';

    public const NUMBER_ALERTS = 'alerts';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::NUMBER_API,
            self::NUMBER_EXCEL,
            self::NUMBER_CAMPAIGNS,
            self::NUMBER_SMPP,
            self::NUMBER_PLUGIN,
            self::NUMBER_ALERTS
        ];
    }
}


