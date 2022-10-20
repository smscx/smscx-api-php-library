<?php
/**
 * CallbackEventTypes
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
 * CallbackEventTypes Class Doc Comment
 *
 * @category Class
 * @description Event for which the callback request is made
 * @package  Smscx
 * @author   SMS Connexion
 * @link     https://sms.cx
 */
class CallbackEventTypes
{
    /**
     * Possible values of this enum
     */
    public const DLR_UPDATE = 'dlr_update';

    public const RECEIVE_SMS = 'receive_sms';

    public const RECEIVE_VIBER = 'receive_viber';

    public const RECEIVE_WHATSAPP = 'receive_whatsapp';

    public const SHORTLINK_HIT = 'shortlink_hit';

    public const SHORTLINK_HIT_UPDATE = 'shortlink_hit_update';

    public const ATTACHMENT_HIT = 'attachment_hit';

    public const ATTACHMENT_HIT_UPDATE = 'attachment_hit_update';

    public const NEW_OPTOUT = 'new_optout';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::DLR_UPDATE,
            self::RECEIVE_SMS,
            self::RECEIVE_VIBER,
            self::RECEIVE_WHATSAPP,
            self::SHORTLINK_HIT,
            self::SHORTLINK_HIT_UPDATE,
            self::ATTACHMENT_HIT,
            self::ATTACHMENT_HIT_UPDATE,
            self::NEW_OPTOUT
        ];
    }
}


