<?php
/**
 * DataSms
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
 * DataSms Class Doc Comment
 *
 * @category Class
 * @package  Smscx
 * @author   SMS Connexion
 * @link     https://sms.cx
 * @implements \ArrayAccess<string, mixed>
 */
class DataSms implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $clientModelName = 'DataSms';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $clientTypes = [
        'msg_id' => 'string',
        'track_data' => 'string',
        'status' => 'string',
        'status_code' => 'int',
        'error_code' => 'int',
        'created_at' => '\DateTime',
        'scheduled_at' => '\DateTime',
        'in_quiet_hours' => 'bool',
        'cost' => 'float',
        'to' => 'string',
        'country_iso' => 'string',
        'from' => 'string',
        'text' => 'string',
        'parts' => 'int',
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
        'track_data' => 'uuid',
        'status' => null,
        'status_code' => null,
        'error_code' => null,
        'created_at' => 'date-time',
        'scheduled_at' => 'date-time',
        'in_quiet_hours' => null,
        'cost' => 'decimal',
        'to' => null,
        'country_iso' => null,
        'from' => null,
        'text' => null,
        'parts' => 'int32',
        'text_analysis' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $clientNullables = [
        'msg_id' => false,
		'track_data' => false,
		'status' => false,
		'status_code' => false,
		'error_code' => true,
		'created_at' => false,
		'scheduled_at' => false,
		'in_quiet_hours' => false,
		'cost' => false,
		'to' => false,
		'country_iso' => false,
		'from' => false,
		'text' => false,
		'parts' => false,
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
        'track_data' => 'trackData',
        'status' => 'status',
        'status_code' => 'statusCode',
        'error_code' => 'errorCode',
        'created_at' => 'createdAt',
        'scheduled_at' => 'scheduledAt',
        'in_quiet_hours' => 'inQuietHours',
        'cost' => 'cost',
        'to' => 'to',
        'country_iso' => 'countryIso',
        'from' => 'from',
        'text' => 'text',
        'parts' => 'parts',
        'text_analysis' => 'textAnalysis'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'msg_id' => 'setMsgId',
        'track_data' => 'setTrackData',
        'status' => 'setStatus',
        'status_code' => 'setStatusCode',
        'error_code' => 'setErrorCode',
        'created_at' => 'setCreatedAt',
        'scheduled_at' => 'setScheduledAt',
        'in_quiet_hours' => 'setInQuietHours',
        'cost' => 'setCost',
        'to' => 'setTo',
        'country_iso' => 'setCountryIso',
        'from' => 'setFrom',
        'text' => 'setText',
        'parts' => 'setParts',
        'text_analysis' => 'setTextAnalysis'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'msg_id' => 'getMsgId',
        'track_data' => 'getTrackData',
        'status' => 'getStatus',
        'status_code' => 'getStatusCode',
        'error_code' => 'getErrorCode',
        'created_at' => 'getCreatedAt',
        'scheduled_at' => 'getScheduledAt',
        'in_quiet_hours' => 'getInQuietHours',
        'cost' => 'getCost',
        'to' => 'getTo',
        'country_iso' => 'getCountryIso',
        'from' => 'getFrom',
        'text' => 'getText',
        'parts' => 'getParts',
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
    public const STATUS_SCHEDULED = 'SCHEDULED';
    public const STATUS_REJECTED = 'REJECTED';
    public const STATUS_NO_COVERAGE = 'NO COVERAGE';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getStatusAllowableValues()
    {
        return [
            self::STATUS_ACCEPTED,
            self::STATUS_SCHEDULED,
            self::STATUS_REJECTED,
            self::STATUS_NO_COVERAGE,
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
        $this->setIfExists('track_data', $data ?? [], null);
        $this->setIfExists('status', $data ?? [], null);
        $this->setIfExists('status_code', $data ?? [], null);
        $this->setIfExists('error_code', $data ?? [], null);
        $this->setIfExists('created_at', $data ?? [], null);
        $this->setIfExists('scheduled_at', $data ?? [], null);
        $this->setIfExists('in_quiet_hours', $data ?? [], null);
        $this->setIfExists('cost', $data ?? [], null);
        $this->setIfExists('to', $data ?? [], null);
        $this->setIfExists('country_iso', $data ?? [], null);
        $this->setIfExists('from', $data ?? [], null);
        $this->setIfExists('text', $data ?? [], null);
        $this->setIfExists('parts', $data ?? [], null);
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

        if (!is_null($this->container['track_data']) && (mb_strlen($this->container['track_data']) > 36)) {
            $invalidProperties[] = "invalid value for 'track_data', the character length must be smaller than or equal to 36.";
        }

        if (!is_null($this->container['track_data']) && (mb_strlen($this->container['track_data']) < 36)) {
            $invalidProperties[] = "invalid value for 'track_data', the character length must be bigger than or equal to 36.";
        }

        if (!is_null($this->container['track_data']) && !preg_match("/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/", $this->container['track_data'])) {
            $invalidProperties[] = "invalid value for 'track_data', must be conform to the pattern /^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/.";
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
        if ($this->container['created_at'] === null) {
            $invalidProperties[] = "'created_at' can't be null";
        }
        if ($this->container['in_quiet_hours'] === null) {
            $invalidProperties[] = "'in_quiet_hours' can't be null";
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
        if ($this->container['parts'] === null) {
            $invalidProperties[] = "'parts' can't be null";
        }
        if (($this->container['parts'] < 1)) {
            $invalidProperties[] = "invalid value for 'parts', must be bigger than or equal to 1.";
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
     * @param string $msg_id Unique message identifier needed to track the delivery report
     *
     * @return self
     */
    public function setMsgId($msg_id)
    {
        if ((mb_strlen($msg_id) > 36)) {
            throw new \InvalidArgumentException('invalid length for $msg_id when calling DataSms., must be smaller than or equal to 36.');
        }
        if ((mb_strlen($msg_id) < 36)) {
            throw new \InvalidArgumentException('invalid length for $msg_id when calling DataSms., must be bigger than or equal to 36.');
        }
        if ((!preg_match("/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/", $msg_id))) {
            throw new \InvalidArgumentException("invalid value for \$msg_id when calling DataSms., must conform to the pattern /^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/.");
        }


        if (is_null($msg_id)) {
            throw new \InvalidArgumentException('non-nullable msg_id cannot be null');
        }

        $this->container['msg_id'] = $msg_id;

        return $this;
    }

    /**
     * Gets track_data
     *
     * @return string|null
     */
    public function getTrackData()
    {
        return $this->container['track_data'];
    }

    /**
     * Sets track_data
     *
     * @param string|null $track_data Client own UUID (v1-v5) provided to track messages
     *
     * @return self
     */
    public function setTrackData($track_data)
    {
        if (!is_null($track_data) && (mb_strlen($track_data) > 36)) {
            throw new \InvalidArgumentException('invalid length for $track_data when calling DataSms., must be smaller than or equal to 36.');
        }
        if (!is_null($track_data) && (mb_strlen($track_data) < 36)) {
            throw new \InvalidArgumentException('invalid length for $track_data when calling DataSms., must be bigger than or equal to 36.');
        }
        if (!is_null($track_data) && (!preg_match("/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/", $track_data))) {
            throw new \InvalidArgumentException("invalid value for \$track_data when calling DataSms., must conform to the pattern /^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/.");
        }


        if (is_null($track_data)) {
            throw new \InvalidArgumentException('non-nullable track_data cannot be null');
        }

        $this->container['track_data'] = $track_data;

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
     * @param string $status Possible status of the message at request time:  * `ACCEPTED` - Message has been accepted for delivery  * `SCHEDULED` - Message has been scheduled at the date time specified  * `REJECTED` - Message was rejected because the number has opted out from receiving messages (no balance deduction, cost zero)  * `NO COVERAGE` - There is no coverage for this destination or no pricing is set (no balance deduction, cost zero)   The final delivery report (DELIVERED, FAILED) will be sent to the URL provided in the `dlrCallbackUrl` parameter or you can query the status at the resource GET `/reports/single/{msgId}`
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
     * @param \DateTime|null $scheduled_at Date and time when the message was scheduled. If the date and time of sending or scheduling is detected to be in the quiet hours interval, the API will schedule the sending of the SMS at the end of the quiet hours. Eg. If quiet hours is defined between 21:30 and 09:30 and the message sending is at 21:55, then the API will schedule the message the next day at 09:31
     *
     * @return self
     */
    public function setScheduledAt($scheduled_at)
    {

        if (is_null($scheduled_at)) {
            throw new \InvalidArgumentException('non-nullable scheduled_at cannot be null');
        }

        $this->container['scheduled_at'] = $scheduled_at;

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
     * @param bool $in_quiet_hours If the date of send or the schedule date of a message is detected to be in the quiet hours of the destination phone number, this parameter will be set to `true`. This parameter is `false` if no quiet hours detected
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
            throw new \InvalidArgumentException('invalid length for $country_iso when calling DataSms., must be smaller than or equal to 2.');
        }
        if ((mb_strlen($country_iso) < 2)) {
            throw new \InvalidArgumentException('invalid length for $country_iso when calling DataSms., must be bigger than or equal to 2.');
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
            throw new \InvalidArgumentException('invalid length for $from when calling DataSms., must be smaller than or equal to 15.');
        }
        if ((mb_strlen($from) < 3)) {
            throw new \InvalidArgumentException('invalid length for $from when calling DataSms., must be bigger than or equal to 3.');
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
     * @param string $text The text message sent with all the fields/variables replaced (if any).
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
     * Gets parts
     *
     * @return int
     */
    public function getParts()
    {
        return $this->container['parts'];
    }

    /**
     * Sets parts
     *
     * @param int $parts Message parts
     *
     * @return self
     */
    public function setParts($parts)
    {

        if (($parts < 1)) {
            throw new \InvalidArgumentException('invalid value for $parts when calling DataSms., must be bigger than or equal to 1.');
        }


        if (is_null($parts)) {
            throw new \InvalidArgumentException('non-nullable parts cannot be null');
        }

        $this->container['parts'] = $parts;

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


