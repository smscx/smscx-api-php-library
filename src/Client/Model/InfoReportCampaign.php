<?php
/**
 * InfoReportCampaign
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
 * InfoReportCampaign Class Doc Comment
 *
 * @category Class
 * @package  Smscx
 * @author   SMS Connexion
 * @link     https://sms.cx
 * @implements \ArrayAccess<string, mixed>
 */
class InfoReportCampaign implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $clientModelName = 'InfoReportCampaign';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $clientTypes = [
        'campaign_id' => 'string',
        'campaign_name' => 'string',
        'total_phone_numbers' => 'int',
        'total_cost' => 'float',
        'total_parts' => 'int',
        'channel' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $clientFormats = [
        'campaign_id' => null,
        'campaign_name' => null,
        'total_phone_numbers' => 'int32',
        'total_cost' => null,
        'total_parts' => 'int32',
        'channel' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $clientNullables = [
        'campaign_id' => false,
		'campaign_name' => false,
		'total_phone_numbers' => false,
		'total_cost' => false,
		'total_parts' => false,
		'channel' => false
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
        'campaign_name' => 'campaignName',
        'total_phone_numbers' => 'totalPhoneNumbers',
        'total_cost' => 'totalCost',
        'total_parts' => 'totalParts',
        'channel' => 'channel'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'campaign_id' => 'setCampaignId',
        'campaign_name' => 'setCampaignName',
        'total_phone_numbers' => 'setTotalPhoneNumbers',
        'total_cost' => 'setTotalCost',
        'total_parts' => 'setTotalParts',
        'channel' => 'setChannel'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'campaign_id' => 'getCampaignId',
        'campaign_name' => 'getCampaignName',
        'total_phone_numbers' => 'getTotalPhoneNumbers',
        'total_cost' => 'getTotalCost',
        'total_parts' => 'getTotalParts',
        'channel' => 'getChannel'
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
        $this->setIfExists('campaign_name', $data ?? [], null);
        $this->setIfExists('total_phone_numbers', $data ?? [], null);
        $this->setIfExists('total_cost', $data ?? [], null);
        $this->setIfExists('total_parts', $data ?? [], null);
        $this->setIfExists('channel', $data ?? [], null);
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
        if ($this->container['campaign_name'] === null) {
            $invalidProperties[] = "'campaign_name' can't be null";
        }
        if ($this->container['total_phone_numbers'] === null) {
            $invalidProperties[] = "'total_phone_numbers' can't be null";
        }
        if ($this->container['total_cost'] === null) {
            $invalidProperties[] = "'total_cost' can't be null";
        }
        if ($this->container['total_parts'] === null) {
            $invalidProperties[] = "'total_parts' can't be null";
        }
        if ($this->container['channel'] === null) {
            $invalidProperties[] = "'channel' can't be null";
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
     * @param string $campaign_id campaign_id
     *
     * @return self
     */
    public function setCampaignId($campaign_id)
    {

        if (is_null($campaign_id)) {
            throw new \InvalidArgumentException('non-nullable campaign_id cannot be null');
        }

        $this->container['campaign_id'] = $campaign_id;

        return $this;
    }

    /**
     * Gets campaign_name
     *
     * @return string
     */
    public function getCampaignName()
    {
        return $this->container['campaign_name'];
    }

    /**
     * Sets campaign_name
     *
     * @param string $campaign_name campaign_name
     *
     * @return self
     */
    public function setCampaignName($campaign_name)
    {

        if (is_null($campaign_name)) {
            throw new \InvalidArgumentException('non-nullable campaign_name cannot be null');
        }

        $this->container['campaign_name'] = $campaign_name;

        return $this;
    }

    /**
     * Gets total_phone_numbers
     *
     * @return int
     */
    public function getTotalPhoneNumbers()
    {
        return $this->container['total_phone_numbers'];
    }

    /**
     * Sets total_phone_numbers
     *
     * @param int $total_phone_numbers total_phone_numbers
     *
     * @return self
     */
    public function setTotalPhoneNumbers($total_phone_numbers)
    {

        if (is_null($total_phone_numbers)) {
            throw new \InvalidArgumentException('non-nullable total_phone_numbers cannot be null');
        }

        $this->container['total_phone_numbers'] = $total_phone_numbers;

        return $this;
    }

    /**
     * Gets total_cost
     *
     * @return float
     */
    public function getTotalCost()
    {
        return $this->container['total_cost'];
    }

    /**
     * Sets total_cost
     *
     * @param float $total_cost total_cost
     *
     * @return self
     */
    public function setTotalCost($total_cost)
    {

        if (is_null($total_cost)) {
            throw new \InvalidArgumentException('non-nullable total_cost cannot be null');
        }

        $this->container['total_cost'] = $total_cost;

        return $this;
    }

    /**
     * Gets total_parts
     *
     * @return int
     */
    public function getTotalParts()
    {
        return $this->container['total_parts'];
    }

    /**
     * Sets total_parts
     *
     * @param int $total_parts total_parts
     *
     * @return self
     */
    public function setTotalParts($total_parts)
    {

        if (is_null($total_parts)) {
            throw new \InvalidArgumentException('non-nullable total_parts cannot be null');
        }

        $this->container['total_parts'] = $total_parts;

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
     * @param string $channel channel
     *
     * @return self
     */
    public function setChannel($channel)
    {

        if (is_null($channel)) {
            throw new \InvalidArgumentException('non-nullable channel cannot be null');
        }

        $this->container['channel'] = $channel;

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


