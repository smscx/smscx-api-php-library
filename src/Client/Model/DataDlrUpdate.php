<?php
/**
 * DataDlrUpdate
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
 * DataDlrUpdate Class Doc Comment
 *
 * @category Class
 * @description Event data, grouped in multiple objects (up to 200 in a request)
 * @package  Smscx
 * @author   SMS Connexion
 * @link     https://sms.cx
 * @implements \ArrayAccess<string, mixed>
 */
class DataDlrUpdate implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $clientModelName = 'DataDlrUpdate';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $clientTypes = [
        'campaign_id' => 'string',
        'msg_id' => 'string',
        'track_data' => 'string',
        'status_code' => 'int',
        'status' => 'string',
        'error_code' => 'int',
        'datetime' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $clientFormats = [
        'campaign_id' => 'uuid',
        'msg_id' => 'uuid',
        'track_data' => 'uuid',
        'status_code' => 'int32',
        'status' => null,
        'error_code' => 'int32',
        'datetime' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $clientNullables = [
        'campaign_id' => false,
		'msg_id' => false,
		'track_data' => true,
		'status_code' => false,
		'status' => false,
		'error_code' => true,
		'datetime' => false
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
        'campaign_id' => 'campaignId',
        'msg_id' => 'msgId',
        'track_data' => 'trackData',
        'status_code' => 'statusCode',
        'status' => 'status',
        'error_code' => 'errorCode',
        'datetime' => 'datetime'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'campaign_id' => 'setCampaignId',
        'msg_id' => 'setMsgId',
        'track_data' => 'setTrackData',
        'status_code' => 'setStatusCode',
        'status' => 'setStatus',
        'error_code' => 'setErrorCode',
        'datetime' => 'setDatetime'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'campaign_id' => 'getCampaignId',
        'msg_id' => 'getMsgId',
        'track_data' => 'getTrackData',
        'status_code' => 'getStatusCode',
        'status' => 'getStatus',
        'error_code' => 'getErrorCode',
        'datetime' => 'getDatetime'
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
        $this->setIfExists('campaign_id', $data ?? [], null);
        $this->setIfExists('msg_id', $data ?? [], null);
        $this->setIfExists('track_data', $data ?? [], null);
        $this->setIfExists('status_code', $data ?? [], null);
        $this->setIfExists('status', $data ?? [], null);
        $this->setIfExists('error_code', $data ?? [], null);
        $this->setIfExists('datetime', $data ?? [], null);
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

        if ($this->container['campaign_id'] === null) {
            $invalidProperties[] = "'campaign_id' can't be null";
        }
        if ((mb_strlen($this->container['campaign_id']) > 36)) {
            $invalidProperties[] = "invalid value for 'campaign_id', the character length must be smaller than or equal to 36.";
        }

        if ((mb_strlen($this->container['campaign_id']) < 36)) {
            $invalidProperties[] = "invalid value for 'campaign_id', the character length must be bigger than or equal to 36.";
        }

        if (!preg_match("/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/", $this->container['campaign_id'])) {
            $invalidProperties[] = "invalid value for 'campaign_id', must be conform to the pattern /^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/.";
        }

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

        if ($this->container['status_code'] === null) {
            $invalidProperties[] = "'status_code' can't be null";
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

        if ($this->container['error_code'] === null) {
            $invalidProperties[] = "'error_code' can't be null";
        }
        if ($this->container['datetime'] === null) {
            $invalidProperties[] = "'datetime' can't be null";
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
     * Gets campaign_id
     *
     * @return string
     */
    public function getCampaignId()
    {
        return $this->container['campaign_id'];
    }

    /**
     * Sets campaign_id
     *
     * @param string $campaign_id Identifier of the sent campaign
     *
     * @return self
     */
    public function setCampaignId($campaign_id)
    {
        if ((mb_strlen($campaign_id) > 36)) {
            throw new \InvalidArgumentException('invalid length for $campaign_id when calling DataDlrUpdate., must be smaller than or equal to 36.');
        }
        if ((mb_strlen($campaign_id) < 36)) {
            throw new \InvalidArgumentException('invalid length for $campaign_id when calling DataDlrUpdate., must be bigger than or equal to 36.');
        }
        if ((!preg_match("/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/", $campaign_id))) {
            throw new \InvalidArgumentException("invalid value for \$campaign_id when calling DataDlrUpdate., must conform to the pattern /^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/.");
        }


        if (is_null($campaign_id)) {
            throw new \InvalidArgumentException('non-nullable campaign_id cannot be null');
        }

        $this->container['campaign_id'] = $campaign_id;

        return $this;
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
     * @param string $msg_id Identifier of the sent message
     *
     * @return self
     */
    public function setMsgId($msg_id)
    {
        if ((mb_strlen($msg_id) > 36)) {
            throw new \InvalidArgumentException('invalid length for $msg_id when calling DataDlrUpdate., must be smaller than or equal to 36.');
        }
        if ((mb_strlen($msg_id) < 36)) {
            throw new \InvalidArgumentException('invalid length for $msg_id when calling DataDlrUpdate., must be bigger than or equal to 36.');
        }
        if ((!preg_match("/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/", $msg_id))) {
            throw new \InvalidArgumentException("invalid value for \$msg_id when calling DataDlrUpdate., must conform to the pattern /^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/.");
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
     * @param string|null $track_data Identifier of the message ID provided by client for tracking purposes
     *
     * @return self
     */
    public function setTrackData($track_data)
    {
        if (!is_null($track_data) && (mb_strlen($track_data) > 36)) {
            throw new \InvalidArgumentException('invalid length for $track_data when calling DataDlrUpdate., must be smaller than or equal to 36.');
        }
        if (!is_null($track_data) && (mb_strlen($track_data) < 36)) {
            throw new \InvalidArgumentException('invalid length for $track_data when calling DataDlrUpdate., must be bigger than or equal to 36.');
        }
        if (!is_null($track_data) && (!preg_match("/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/", $track_data))) {
            throw new \InvalidArgumentException("invalid value for \$track_data when calling DataDlrUpdate., must conform to the pattern /^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/.");
        }


        if (is_null($track_data)) {
            array_push($this->clientNullablesSetToNull, 'track_data');
        } else {
            $nullablesSetToNull = $this->getClientNullablesSetToNull();
            $index = array_search('track_data', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setClientNullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['track_data'] = $track_data;

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
     * @param int $status_code Numeric value of the delivery report
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
     * @param string $status Delivery report of the sent SMS
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
     * @param int $error_code A code that give detailed information about a failed delivery. See the [list of error codes](#error-codes) for more details. A non-null value indicates that the message could not be delivered.
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
     * Gets datetime
     *
     * @return string
     */
    public function getDatetime()
    {
        return $this->container['datetime'];
    }

    /**
     * Sets datetime
     *
     * @param string $datetime datetime
     *
     * @return self
     */
    public function setDatetime($datetime)
    {

        if (is_null($datetime)) {
            throw new \InvalidArgumentException('non-nullable datetime cannot be null');
        }

        $this->container['datetime'] = $datetime;

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


