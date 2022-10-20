<?php
/**
 * DataReportCampaign
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  Smscx
 * @author   SMS Connexion
 * @link     https://sms.cx
 */

namespace Smscx\Client\Model;

use \ArrayAccess;
use \Smscx\ObjectSerializer;

/**
 * DataReportCampaign Class Doc Comment
 *
 * @category Class
 * @package  Smscx
 * @author   SMS Connexion
 * @link     https://sms.cx
 * @implements \ArrayAccess<string, mixed>
 */
class DataReportCampaign implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $clientModelName = 'DataReportCampaign';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $clientTypes = [
        'msg_id' => 'string',
        'status' => 'string',
        'status_code' => 'int',
        'error_code' => 'int',
        'in_quiet_hours' => 'bool',
        'created_at' => '\DateTime',
        'updated_at' => '\DateTime',
        'scheduled_at' => '\DateTime',
        'cost' => 'float',
        'to' => 'string',
        'country_iso' => 'string',
        'from' => 'string',
        'text' => 'string',
        'source' => 'string',
        'channel' => 'string',
        'text_analysis' => '\Smscx\Client\Model\TextAnalysis'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $clientFormats = [
        'msg_id' => 'uuid',
        'status' => null,
        'status_code' => null,
        'error_code' => null,
        'in_quiet_hours' => null,
        'created_at' => 'date-time',
        'updated_at' => 'date-time',
        'scheduled_at' => 'date-time',
        'cost' => 'decimal',
        'to' => null,
        'country_iso' => null,
        'from' => null,
        'text' => null,
        'source' => null,
        'channel' => null,
        'text_analysis' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $clientNullables = [
        'msg_id' => false,
		'status' => false,
		'status_code' => false,
		'error_code' => true,
		'in_quiet_hours' => false,
		'created_at' => false,
		'updated_at' => true,
		'scheduled_at' => true,
		'cost' => false,
		'to' => false,
		'country_iso' => false,
		'from' => false,
		'text' => false,
		'source' => false,
		'channel' => false,
		'text_analysis' => false
    ];

    /**
      * If a nullable field gets set to null, insert it here
      *
      * @var boolean[]
      */
    protected array $clientNullablesSetToNull = [];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function clientTypes()
    {
        return self::$clientTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function clientFormats()
    {
        return self::$clientFormats;
    }

    /**
     * Array of nullable properties
     *
     * @return array
     */
    protected static function clientNullables(): array
    {
        return self::$clientNullables;
    }

    /**
     * Array of nullable field names deliberately set to null
     *
     * @return boolean[]
     */
    private function getClientNullablesSetToNull(): array
    {
        return $this->clientNullablesSetToNull;
    }

    /**
     * Checks if a property is nullable
     *
     * @param string $property
     * @return bool
     */
    public static function isNullable(string $property): bool
    {
        return self::clientNullables()[$property] ?? false;
    }

    /**
     * Checks if a nullable property is set to null.
     *
     * @param string $property
     * @return bool
     */
    public function isNullableSetToNull(string $property): bool
    {
        return in_array($property, $this->getClientNullablesSetToNull(), true);
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'msg_id' => 'msgId',
        'status' => 'status',
        'status_code' => 'statusCode',
        'error_code' => 'errorCode',
        'in_quiet_hours' => 'inQuietHours',
        'created_at' => 'createdAt',
        'updated_at' => 'updatedAt',
        'scheduled_at' => 'scheduledAt',
        'cost' => 'cost',
        'to' => 'to',
        'country_iso' => 'countryIso',
        'from' => 'from',
        'text' => 'text',
        'source' => 'source',
        'channel' => 'channel',
        'text_analysis' => 'textAnalysis'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'msg_id' => 'setMsgId',
        'status' => 'setStatus',
        'status_code' => 'setStatusCode',
        'error_code' => 'setErrorCode',
        'in_quiet_hours' => 'setInQuietHours',
        'created_at' => 'setCreatedAt',
        'updated_at' => 'setUpdatedAt',
        'scheduled_at' => 'setScheduledAt',
        'cost' => 'setCost',
        'to' => 'setTo',
        'country_iso' => 'setCountryIso',
        'from' => 'setFrom',
        'text' => 'setText',
        'source' => 'setSource',
        'channel' => 'setChannel',
        'text_analysis' => 'setTextAnalysis'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'msg_id' => 'getMsgId',
        'status' => 'getStatus',
        'status_code' => 'getStatusCode',
        'error_code' => 'getErrorCode',
        'in_quiet_hours' => 'getInQuietHours',
        'created_at' => 'getCreatedAt',
        'updated_at' => 'getUpdatedAt',
        'scheduled_at' => 'getScheduledAt',
        'cost' => 'getCost',
        'to' => 'getTo',
        'country_iso' => 'getCountryIso',
        'from' => 'getFrom',
        'text' => 'getText',
        'source' => 'getSource',
        'channel' => 'getChannel',
        'text_analysis' => 'getTextAnalysis'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$clientModelName;
    }

    public const STATUS_ACCEPTED = 'ACCEPTED';
    public const STATUS_SENT = 'SENT';
    public const STATUS_DELIVERED = 'DELIVERED';
    public const STATUS_FAILED = 'FAILED';
    public const STATUS_SCHEDULED = 'SCHEDULED';
    public const STATUS_REJECTED = 'REJECTED';
    public const STATUS_NO_COVERAGE = 'NO COVERAGE';
    public const SOURCE_API = 'api';
    public const SOURCE_WEBAPP = 'webapp';
    public const SOURCE_SMPP = 'smpp';
    public const SOURCE_PLUGIN = 'plugin';
    public const SOURCE_ALERTS = 'alerts';
    public const SOURCE_EXCEL = 'excel';
    public const CHANNEL_SMS = 'sms';
    public const CHANNEL_VIBER = 'viber';
    public const CHANNEL_WHATSAPP = 'whatsapp';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getStatusAllowableValues()
    {
        return [
            self::STATUS_ACCEPTED,
            self::STATUS_SENT,
            self::STATUS_DELIVERED,
            self::STATUS_FAILED,
            self::STATUS_SCHEDULED,
            self::STATUS_REJECTED,
            self::STATUS_NO_COVERAGE,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getSourceAllowableValues()
    {
        return [
            self::SOURCE_API,
            self::SOURCE_WEBAPP,
            self::SOURCE_SMPP,
            self::SOURCE_PLUGIN,
            self::SOURCE_ALERTS,
            self::SOURCE_EXCEL,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getChannelAllowableValues()
    {
        return [
            self::CHANNEL_SMS,
            self::CHANNEL_VIBER,
            self::CHANNEL_WHATSAPP,
        ];
    }

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->setIfExists('msg_id', $data ?? [], null);
        $this->setIfExists('status', $data ?? [], null);
        $this->setIfExists('status_code', $data ?? [], null);
        $this->setIfExists('error_code', $data ?? [], null);
        $this->setIfExists('in_quiet_hours', $data ?? [], null);
        $this->setIfExists('created_at', $data ?? [], null);
        $this->setIfExists('updated_at', $data ?? [], null);
        $this->setIfExists('scheduled_at', $data ?? [], null);
        $this->setIfExists('cost', $data ?? [], null);
        $this->setIfExists('to', $data ?? [], null);
        $this->setIfExists('country_iso', $data ?? [], null);
        $this->setIfExists('from', $data ?? [], null);
        $this->setIfExists('text', $data ?? [], null);
        $this->setIfExists('source', $data ?? [], null);
        $this->setIfExists('channel', $data ?? [], null);
        $this->setIfExists('text_analysis', $data ?? [], null);
    }

    /**
    * Sets $this->container[$variableName] to the given data or to the given default Value; if $variableName
    * is nullable and its value is set to null in the $fields array, then mark it as "set to null" in the
    * $this->clientNullablesSetToNull array
    *
    * @param string $variableName
    * @param array  $fields
    * @param mixed  $defaultValue
    */
    private function setIfExists(string $variableName, array $fields, $defaultValue): void
    {
        if (self::isNullable($variableName) && array_key_exists($variableName, $fields) && is_null($fields[$variableName])) {
            $this->clientNullablesSetToNull[] = $variableName;
        }

        $this->container[$variableName] = $fields[$variableName] ?? $defaultValue;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['msg_id'] === null) {
            $invalidProperties[] = "'msg_id' can't be null";
        }
        if ((mb_strlen($this->container['msg_id']) > 36)) {
            $invalidProperties[] = "invalid value for 'msg_id', the character length must be smaller than or equal to 36.";
        }

        if ((mb_strlen($this->container['msg_id']) < 36)) {
            $invalidProperties[] = "invalid value for 'msg_id', the character length must be bigger than or equal to 36.";
        }

        if (!preg_match("/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/", $this->container['msg_id'])) {
            $invalidProperties[] = "invalid value for 'msg_id', must be conform to the pattern /^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/.";
        }

        if ($this->container['status'] === null) {
            $invalidProperties[] = "'status' can't be null";
        }
        $allowedValues = $this->getStatusAllowableValues();
        if (!is_null($this->container['status']) && !in_array($this->container['status'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'status', must be one of '%s'",
                $this->container['status'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['status_code'] === null) {
            $invalidProperties[] = "'status_code' can't be null";
        }
        if ($this->container['error_code'] === null) {
            $invalidProperties[] = "'error_code' can't be null";
        }
        if ($this->container['in_quiet_hours'] === null) {
            $invalidProperties[] = "'in_quiet_hours' can't be null";
        }
        if ($this->container['created_at'] === null) {
            $invalidProperties[] = "'created_at' can't be null";
        }
        if ($this->container['updated_at'] === null) {
            $invalidProperties[] = "'updated_at' can't be null";
        }
        if ($this->container['cost'] === null) {
            $invalidProperties[] = "'cost' can't be null";
        }
        if ($this->container['to'] === null) {
            $invalidProperties[] = "'to' can't be null";
        }
        if ($this->container['country_iso'] === null) {
            $invalidProperties[] = "'country_iso' can't be null";
        }
        if ((mb_strlen($this->container['country_iso']) > 2)) {
            $invalidProperties[] = "invalid value for 'country_iso', the character length must be smaller than or equal to 2.";
        }

        if ((mb_strlen($this->container['country_iso']) < 2)) {
            $invalidProperties[] = "invalid value for 'country_iso', the character length must be bigger than or equal to 2.";
        }

        if ($this->container['from'] === null) {
            $invalidProperties[] = "'from' can't be null";
        }
        if ((mb_strlen($this->container['from']) > 15)) {
            $invalidProperties[] = "invalid value for 'from', the character length must be smaller than or equal to 15.";
        }

        if ((mb_strlen($this->container['from']) < 3)) {
            $invalidProperties[] = "invalid value for 'from', the character length must be bigger than or equal to 3.";
        }

        if ($this->container['text'] === null) {
            $invalidProperties[] = "'text' can't be null";
        }
        if ($this->container['source'] === null) {
            $invalidProperties[] = "'source' can't be null";
        }
        $allowedValues = $this->getSourceAllowableValues();
        if (!is_null($this->container['source']) && !in_array($this->container['source'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'source', must be one of '%s'",
                $this->container['source'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['channel'] === null) {
            $invalidProperties[] = "'channel' can't be null";
        }
        $allowedValues = $this->getChannelAllowableValues();
        if (!is_null($this->container['channel']) && !in_array($this->container['channel'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'channel', must be one of '%s'",
                $this->container['channel'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['text_analysis'] === null) {
            $invalidProperties[] = "'text_analysis' can't be null";
        }
        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets msg_id
     *
     * @return string
     */
    public function getMsgId()
    {
        return $this->container['msg_id'];
    }

    /**
     * Sets msg_id
     *
     * @param string $msg_id Unique message identifier
     *
     * @return self
     */
    public function setMsgId($msg_id)
    {
        if ((mb_strlen($msg_id) > 36)) {
            throw new \InvalidArgumentException('invalid length for $msg_id when calling DataReportCampaign., must be smaller than or equal to 36.');
        }
        if ((mb_strlen($msg_id) < 36)) {
            throw new \InvalidArgumentException('invalid length for $msg_id when calling DataReportCampaign., must be bigger than or equal to 36.');
        }
        if ((!preg_match("/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/", $msg_id))) {
            throw new \InvalidArgumentException("invalid value for \$msg_id when calling DataReportCampaign., must conform to the pattern /^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/.");
        }


        if (is_null($msg_id)) {
            throw new \InvalidArgumentException('non-nullable msg_id cannot be null');
        }

        $this->container['msg_id'] = $msg_id;

        return $this;
    }

    /**
     * Gets status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param string $status Delivery report of the message
     *
     * @return self
     */
    public function setStatus($status)
    {
        $allowedValues = $this->getStatusAllowableValues();
        if (!in_array($status, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'status', must be one of '%s'",
                    $status,
                    implode("', '", $allowedValues)
                )
            );
        }

        if (is_null($status)) {
            throw new \InvalidArgumentException('non-nullable status cannot be null');
        }

        $this->container['status'] = $status;

        return $this;
    }

    /**
     * Gets status_code
     *
     * @return int
     */
    public function getStatusCode()
    {
        return $this->container['status_code'];
    }

    /**
     * Sets status_code
     *
     * @param int $status_code Status code for the delivery report
     *
     * @return self
     */
    public function setStatusCode($status_code)
    {

        if (is_null($status_code)) {
            throw new \InvalidArgumentException('non-nullable status_code cannot be null');
        }

        $this->container['status_code'] = $status_code;

        return $this;
    }

    /**
     * Gets error_code
     *
     * @return int
     */
    public function getErrorCode()
    {
        return $this->container['error_code'];
    }

    /**
     * Sets error_code
     *
     * @param int $error_code Status code for the failed delivery report
     *
     * @return self
     */
    public function setErrorCode($error_code)
    {

        if (is_null($error_code)) {
            array_push($this->clientNullablesSetToNull, 'error_code');
        } else {
            $nullablesSetToNull = $this->getClientNullablesSetToNull();
            $index = array_search('error_code', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setClientNullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['error_code'] = $error_code;

        return $this;
    }

    /**
     * Gets in_quiet_hours
     *
     * @return bool
     */
    public function getInQuietHours()
    {
        return $this->container['in_quiet_hours'];
    }

    /**
     * Sets in_quiet_hours
     *
     * @param bool $in_quiet_hours Specified if the sending was between the saved quiet hours
     *
     * @return self
     */
    public function setInQuietHours($in_quiet_hours)
    {

        if (is_null($in_quiet_hours)) {
            throw new \InvalidArgumentException('non-nullable in_quiet_hours cannot be null');
        }

        $this->container['in_quiet_hours'] = $in_quiet_hours;

        return $this;
    }

    /**
     * Gets created_at
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->container['created_at'];
    }

    /**
     * Sets created_at
     *
     * @param \DateTime $created_at Date and time of sending the message
     *
     * @return self
     */
    public function setCreatedAt($created_at)
    {

        if (is_null($created_at)) {
            throw new \InvalidArgumentException('non-nullable created_at cannot be null');
        }

        $this->container['created_at'] = $created_at;

        return $this;
    }

    /**
     * Gets updated_at
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->container['updated_at'];
    }

    /**
     * Sets updated_at
     *
     * @param \DateTime $updated_at Date and time of last delivery report update of the message
     *
     * @return self
     */
    public function setUpdatedAt($updated_at)
    {

        if (is_null($updated_at)) {
            array_push($this->clientNullablesSetToNull, 'updated_at');
        } else {
            $nullablesSetToNull = $this->getClientNullablesSetToNull();
            $index = array_search('updated_at', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setClientNullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['updated_at'] = $updated_at;

        return $this;
    }

    /**
     * Gets scheduled_at
     *
     * @return \DateTime|null
     */
    public function getScheduledAt()
    {
        return $this->container['scheduled_at'];
    }

    /**
     * Sets scheduled_at
     *
     * @param \DateTime|null $scheduled_at Date and time when the message was scheduled
     *
     * @return self
     */
    public function setScheduledAt($scheduled_at)
    {

        if (is_null($scheduled_at)) {
            array_push($this->clientNullablesSetToNull, 'scheduled_at');
        } else {
            $nullablesSetToNull = $this->getClientNullablesSetToNull();
            $index = array_search('scheduled_at', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setClientNullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['scheduled_at'] = $scheduled_at;

        return $this;
    }

    /**
     * Gets cost
     *
     * @return float
     */
    public function getCost()
    {
        return $this->container['cost'];
    }

    /**
     * Sets cost
     *
     * @param float $cost The cost of sending a message, in the currency of the account (**eur** or **usd**). It is calculated as ***cost per message part x parts***. Eg. 3 x 0.041 = 0.123  <br>This parameter has value zero (0) if the status of the message is `REJECTED` or `NO COVERAGE`
     *
     * @return self
     */
    public function setCost($cost)
    {

        if (is_null($cost)) {
            throw new \InvalidArgumentException('non-nullable cost cannot be null');
        }

        $this->container['cost'] = $cost;

        return $this;
    }

    /**
     * Gets to
     *
     * @return string
     */
    public function getTo()
    {
        return $this->container['to'];
    }

    /**
     * Sets to
     *
     * @param string $to Destination phone number in E.164 format
     *
     * @return self
     */
    public function setTo($to)
    {

        if (is_null($to)) {
            throw new \InvalidArgumentException('non-nullable to cannot be null');
        }

        $this->container['to'] = $to;

        return $this;
    }

    /**
     * Gets country_iso
     *
     * @return string
     */
    public function getCountryIso()
    {
        return $this->container['country_iso'];
    }

    /**
     * Sets country_iso
     *
     * @param string $country_iso Two-letter country code in ISO-3166 alpha 2 standard of the destinations. Eg. DE, FR, IT
     *
     * @return self
     */
    public function setCountryIso($country_iso)
    {
        if ((mb_strlen($country_iso) > 2)) {
            throw new \InvalidArgumentException('invalid length for $country_iso when calling DataReportCampaign., must be smaller than or equal to 2.');
        }
        if ((mb_strlen($country_iso) < 2)) {
            throw new \InvalidArgumentException('invalid length for $country_iso when calling DataReportCampaign., must be bigger than or equal to 2.');
        }


        if (is_null($country_iso)) {
            throw new \InvalidArgumentException('non-nullable country_iso cannot be null');
        }

        $this->container['country_iso'] = $country_iso;

        return $this;
    }

    /**
     * Gets from
     *
     * @return string
     */
    public function getFrom()
    {
        return $this->container['from'];
    }

    /**
     * Sets from
     *
     * @param string $from Originator (sender name) of the message
     *
     * @return self
     */
    public function setFrom($from)
    {
        if ((mb_strlen($from) > 15)) {
            throw new \InvalidArgumentException('invalid length for $from when calling DataReportCampaign., must be smaller than or equal to 15.');
        }
        if ((mb_strlen($from) < 3)) {
            throw new \InvalidArgumentException('invalid length for $from when calling DataReportCampaign., must be bigger than or equal to 3.');
        }


        if (is_null($from)) {
            throw new \InvalidArgumentException('non-nullable from cannot be null');
        }

        $this->container['from'] = $from;

        return $this;
    }

    /**
     * Gets text
     *
     * @return string
     */
    public function getText()
    {
        return $this->container['text'];
    }

    /**
     * Sets text
     *
     * @param string $text Content of the message
     *
     * @return self
     */
    public function setText($text)
    {

        if (is_null($text)) {
            throw new \InvalidArgumentException('non-nullable text cannot be null');
        }

        $this->container['text'] = $text;

        return $this;
    }

    /**
     * Gets source
     *
     * @return string
     */
    public function getSource()
    {
        return $this->container['source'];
    }

    /**
     * Sets source
     *
     * @param string $source Source of the message sending
     *
     * @return self
     */
    public function setSource($source)
    {
        $allowedValues = $this->getSourceAllowableValues();
        if (!in_array($source, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'source', must be one of '%s'",
                    $source,
                    implode("', '", $allowedValues)
                )
            );
        }

        if (is_null($source)) {
            throw new \InvalidArgumentException('non-nullable source cannot be null');
        }

        $this->container['source'] = $source;

        return $this;
    }

    /**
     * Gets channel
     *
     * @return string
     */
    public function getChannel()
    {
        return $this->container['channel'];
    }

    /**
     * Sets channel
     *
     * @param string $channel Channel that sent the message
     *
     * @return self
     */
    public function setChannel($channel)
    {
        $allowedValues = $this->getChannelAllowableValues();
        if (!in_array($channel, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'channel', must be one of '%s'",
                    $channel,
                    implode("', '", $allowedValues)
                )
            );
        }

        if (is_null($channel)) {
            throw new \InvalidArgumentException('non-nullable channel cannot be null');
        }

        $this->container['channel'] = $channel;

        return $this;
    }

    /**
     * Gets text_analysis
     *
     * @return \Smscx\Client\Model\TextAnalysis
     */
    public function getTextAnalysis()
    {
        return $this->container['text_analysis'];
    }

    /**
     * Sets text_analysis
     *
     * @param \Smscx\Client\Model\TextAnalysis $text_analysis text_analysis
     *
     * @return self
     */
    public function setTextAnalysis($text_analysis)
    {

        if (is_null($text_analysis)) {
            throw new \InvalidArgumentException('non-nullable text_analysis cannot be null');
        }

        $this->container['text_analysis'] = $text_analysis;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset): bool
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed|null
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param int|null $offset Offset
     * @param mixed    $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset): void
    {
        unset($this->container[$offset]);
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     * @link https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed Returns data which can be serialized by json_encode(), which is a value
     * of any type other than a resource.
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
       return ObjectSerializer::sanitizeForSerialization($this);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string
     */
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


