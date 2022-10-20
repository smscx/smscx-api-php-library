<?php
/**
 * DataReportsCampaigns
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
 * DataReportsCampaigns Class Doc Comment
 *
 * @category Class
 * @package  Smscx
 * @author   SMS Connexion
 * @link     https://sms.cx
 * @implements \ArrayAccess<string, mixed>
 */
class DataReportsCampaigns implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $clientModelName = 'DataReportsCampaigns';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $clientTypes = [
        'id' => 'string',
        'name' => 'string',
        'from' => 'string',
        'groups' => '\Smscx\Client\Model\Group[]',
        'total_phone_numers' => 'int',
        'parts' => 'int',
        'cost' => 'float',
        'text' => 'string',
        'source' => 'string',
        'channel' => 'string',
        'datetime_added' => '\DateTime',
        'datetime_scheduled' => '\DateTime',
        'status' => '\Smscx\Client\Model\Status'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $clientFormats = [
        'id' => null,
        'name' => null,
        'from' => null,
        'groups' => null,
        'total_phone_numers' => 'int32',
        'parts' => 'int32',
        'cost' => 'decimal',
        'text' => null,
        'source' => null,
        'channel' => null,
        'datetime_added' => 'date-time',
        'datetime_scheduled' => 'date-time',
        'status' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $clientNullables = [
        'id' => false,
		'name' => false,
		'from' => false,
		'groups' => false,
		'total_phone_numers' => false,
		'parts' => false,
		'cost' => false,
		'text' => false,
		'source' => false,
		'channel' => false,
		'datetime_added' => false,
		'datetime_scheduled' => true,
		'status' => false
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
        'id' => 'id',
        'name' => 'name',
        'from' => 'from',
        'groups' => 'groups',
        'total_phone_numers' => 'totalPhoneNumers',
        'parts' => 'parts',
        'cost' => 'cost',
        'text' => 'text',
        'source' => 'source',
        'channel' => 'channel',
        'datetime_added' => 'datetimeAdded',
        'datetime_scheduled' => 'datetimeScheduled',
        'status' => 'status'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'name' => 'setName',
        'from' => 'setFrom',
        'groups' => 'setGroups',
        'total_phone_numers' => 'setTotalPhoneNumers',
        'parts' => 'setParts',
        'cost' => 'setCost',
        'text' => 'setText',
        'source' => 'setSource',
        'channel' => 'setChannel',
        'datetime_added' => 'setDatetimeAdded',
        'datetime_scheduled' => 'setDatetimeScheduled',
        'status' => 'setStatus'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'name' => 'getName',
        'from' => 'getFrom',
        'groups' => 'getGroups',
        'total_phone_numers' => 'getTotalPhoneNumers',
        'parts' => 'getParts',
        'cost' => 'getCost',
        'text' => 'getText',
        'source' => 'getSource',
        'channel' => 'getChannel',
        'datetime_added' => 'getDatetimeAdded',
        'datetime_scheduled' => 'getDatetimeScheduled',
        'status' => 'getStatus'
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
        $this->setIfExists('id', $data ?? [], null);
        $this->setIfExists('name', $data ?? [], null);
        $this->setIfExists('from', $data ?? [], null);
        $this->setIfExists('groups', $data ?? [], null);
        $this->setIfExists('total_phone_numers', $data ?? [], null);
        $this->setIfExists('parts', $data ?? [], null);
        $this->setIfExists('cost', $data ?? [], null);
        $this->setIfExists('text', $data ?? [], null);
        $this->setIfExists('source', $data ?? [], null);
        $this->setIfExists('channel', $data ?? [], null);
        $this->setIfExists('datetime_added', $data ?? [], null);
        $this->setIfExists('datetime_scheduled', $data ?? [], null);
        $this->setIfExists('status', $data ?? [], null);
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

        if ($this->container['id'] === null) {
            $invalidProperties[] = "'id' can't be null";
        }
        if ((mb_strlen($this->container['id']) > 36)) {
            $invalidProperties[] = "invalid value for 'id', the character length must be smaller than or equal to 36.";
        }

        if ((mb_strlen($this->container['id']) < 36)) {
            $invalidProperties[] = "invalid value for 'id', the character length must be bigger than or equal to 36.";
        }

        if (!preg_match("/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/", $this->container['id'])) {
            $invalidProperties[] = "invalid value for 'id', must be conform to the pattern /^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/.";
        }

        if ($this->container['name'] === null) {
            $invalidProperties[] = "'name' can't be null";
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

        if ($this->container['groups'] === null) {
            $invalidProperties[] = "'groups' can't be null";
        }
        if ($this->container['total_phone_numers'] === null) {
            $invalidProperties[] = "'total_phone_numers' can't be null";
        }
        if ($this->container['parts'] === null) {
            $invalidProperties[] = "'parts' can't be null";
        }
        if ($this->container['cost'] === null) {
            $invalidProperties[] = "'cost' can't be null";
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

        if ($this->container['datetime_added'] === null) {
            $invalidProperties[] = "'datetime_added' can't be null";
        }
        if ($this->container['datetime_scheduled'] === null) {
            $invalidProperties[] = "'datetime_scheduled' can't be null";
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
     * Gets id
     *
     * @return string
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param string $id Unique identifier of the campaign
     *
     * @return self
     */
    public function setId($id)
    {
        if ((mb_strlen($id) > 36)) {
            throw new \InvalidArgumentException('invalid length for $id when calling DataReportsCampaigns., must be smaller than or equal to 36.');
        }
        if ((mb_strlen($id) < 36)) {
            throw new \InvalidArgumentException('invalid length for $id when calling DataReportsCampaigns., must be bigger than or equal to 36.');
        }
        if ((!preg_match("/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/", $id))) {
            throw new \InvalidArgumentException("invalid value for \$id when calling DataReportsCampaigns., must conform to the pattern /^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/.");
        }


        if (is_null($id)) {
            throw new \InvalidArgumentException('non-nullable id cannot be null');
        }

        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets name
     *
     * @return string
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string $name Name of the sent campaign
     *
     * @return self
     */
    public function setName($name)
    {

        if (is_null($name)) {
            throw new \InvalidArgumentException('non-nullable name cannot be null');
        }

        $this->container['name'] = $name;

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
            throw new \InvalidArgumentException('invalid length for $from when calling DataReportsCampaigns., must be smaller than or equal to 15.');
        }
        if ((mb_strlen($from) < 3)) {
            throw new \InvalidArgumentException('invalid length for $from when calling DataReportsCampaigns., must be bigger than or equal to 3.');
        }


        if (is_null($from)) {
            throw new \InvalidArgumentException('non-nullable from cannot be null');
        }

        $this->container['from'] = $from;

        return $this;
    }

    /**
     * Gets groups
     *
     * @return \Smscx\Client\Model\Group[]
     */
    public function getGroups()
    {
        return $this->container['groups'];
    }

    /**
     * Sets groups
     *
     * @param \Smscx\Client\Model\Group[] $groups 
     *
     * @return self
     */
    public function setGroups($groups)
    {

        if (is_null($groups)) {
            throw new \InvalidArgumentException('non-nullable groups cannot be null');
        }

        $this->container['groups'] = $groups;

        return $this;
    }

    /**
     * Gets total_phone_numers
     *
     * @return int
     */
    public function getTotalPhoneNumers()
    {
        return $this->container['total_phone_numers'];
    }

    /**
     * Sets total_phone_numers
     *
     * @param int $total_phone_numers Total recipients of the sent campaign
     *
     * @return self
     */
    public function setTotalPhoneNumers($total_phone_numers)
    {

        if (is_null($total_phone_numers)) {
            throw new \InvalidArgumentException('non-nullable total_phone_numers cannot be null');
        }

        $this->container['total_phone_numers'] = $total_phone_numers;

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
     * @param int $parts Total parts of the sent campaign
     *
     * @return self
     */
    public function setParts($parts)
    {

        if (is_null($parts)) {
            throw new \InvalidArgumentException('non-nullable parts cannot be null');
        }

        $this->container['parts'] = $parts;

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
     * @param float $cost Total cost of the sent campaign
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
     * Gets datetime_added
     *
     * @return \DateTime
     */
    public function getDatetimeAdded()
    {
        return $this->container['datetime_added'];
    }

    /**
     * Sets datetime_added
     *
     * @param \DateTime $datetime_added datetime_added
     *
     * @return self
     */
    public function setDatetimeAdded($datetime_added)
    {

        if (is_null($datetime_added)) {
            throw new \InvalidArgumentException('non-nullable datetime_added cannot be null');
        }

        $this->container['datetime_added'] = $datetime_added;

        return $this;
    }

    /**
     * Gets datetime_scheduled
     *
     * @return \DateTime
     */
    public function getDatetimeScheduled()
    {
        return $this->container['datetime_scheduled'];
    }

    /**
     * Sets datetime_scheduled
     *
     * @param \DateTime $datetime_scheduled datetime_scheduled
     *
     * @return self
     */
    public function setDatetimeScheduled($datetime_scheduled)
    {

        if (is_null($datetime_scheduled)) {
            array_push($this->clientNullablesSetToNull, 'datetime_scheduled');
        } else {
            $nullablesSetToNull = $this->getClientNullablesSetToNull();
            $index = array_search('datetime_scheduled', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setClientNullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['datetime_scheduled'] = $datetime_scheduled;

        return $this;
    }

    /**
     * Gets status
     *
     * @return \Smscx\Client\Model\Status|null
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param \Smscx\Client\Model\Status|null $status status
     *
     * @return self
     */
    public function setStatus($status)
    {

        if (is_null($status)) {
            throw new \InvalidArgumentException('non-nullable status cannot be null');
        }

        $this->container['status'] = $status;

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


