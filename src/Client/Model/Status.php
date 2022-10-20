<?php
/**
 * Status
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
 * Status Class Doc Comment
 *
 * @category Class
 * @description Delivery reports summary for each campaign if query parameter &#x60;delivery_reports&#x60; is &#x60;true&#x60;
 * @package  Smscx
 * @author   SMS Connexion
 * @link     https://sms.cx
 * @implements \ArrayAccess<string, mixed>
 */
class Status implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $clientModelName = 'Status';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $clientTypes = [
        'accepted' => 'int',
        'delivered' => 'int',
        'failed' => 'int',
        'scheduled' => 'int',
        'no_coverage' => 'int'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $clientFormats = [
        'accepted' => 'int32',
        'delivered' => 'int32',
        'failed' => 'int32',
        'scheduled' => 'int32',
        'no_coverage' => 'int32'
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $clientNullables = [
        'accepted' => false,
		'delivered' => false,
		'failed' => false,
		'scheduled' => false,
		'no_coverage' => false
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
        'accepted' => 'accepted',
        'delivered' => 'delivered',
        'failed' => 'failed',
        'scheduled' => 'scheduled',
        'no_coverage' => 'noCoverage'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'accepted' => 'setAccepted',
        'delivered' => 'setDelivered',
        'failed' => 'setFailed',
        'scheduled' => 'setScheduled',
        'no_coverage' => 'setNoCoverage'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'accepted' => 'getAccepted',
        'delivered' => 'getDelivered',
        'failed' => 'getFailed',
        'scheduled' => 'getScheduled',
        'no_coverage' => 'getNoCoverage'
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
        $this->setIfExists('accepted', $data ?? [], null);
        $this->setIfExists('delivered', $data ?? [], null);
        $this->setIfExists('failed', $data ?? [], null);
        $this->setIfExists('scheduled', $data ?? [], null);
        $this->setIfExists('no_coverage', $data ?? [], null);
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

        if ($this->container['accepted'] === null) {
            $invalidProperties[] = "'accepted' can't be null";
        }
        if ($this->container['delivered'] === null) {
            $invalidProperties[] = "'delivered' can't be null";
        }
        if ($this->container['failed'] === null) {
            $invalidProperties[] = "'failed' can't be null";
        }
        if ($this->container['scheduled'] === null) {
            $invalidProperties[] = "'scheduled' can't be null";
        }
        if ($this->container['no_coverage'] === null) {
            $invalidProperties[] = "'no_coverage' can't be null";
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
     * Gets accepted
     *
     * @return int
     */
    public function getAccepted()
    {
        return $this->container['accepted'];
    }

    /**
     * Sets accepted
     *
     * @param int $accepted Total accepted messages
     *
     * @return self
     */
    public function setAccepted($accepted)
    {

        if (is_null($accepted)) {
            throw new \InvalidArgumentException('non-nullable accepted cannot be null');
        }

        $this->container['accepted'] = $accepted;

        return $this;
    }

    /**
     * Gets delivered
     *
     * @return int
     */
    public function getDelivered()
    {
        return $this->container['delivered'];
    }

    /**
     * Sets delivered
     *
     * @param int $delivered Total delivered messages
     *
     * @return self
     */
    public function setDelivered($delivered)
    {

        if (is_null($delivered)) {
            throw new \InvalidArgumentException('non-nullable delivered cannot be null');
        }

        $this->container['delivered'] = $delivered;

        return $this;
    }

    /**
     * Gets failed
     *
     * @return int
     */
    public function getFailed()
    {
        return $this->container['failed'];
    }

    /**
     * Sets failed
     *
     * @param int $failed Total failed messages
     *
     * @return self
     */
    public function setFailed($failed)
    {

        if (is_null($failed)) {
            throw new \InvalidArgumentException('non-nullable failed cannot be null');
        }

        $this->container['failed'] = $failed;

        return $this;
    }

    /**
     * Gets scheduled
     *
     * @return int
     */
    public function getScheduled()
    {
        return $this->container['scheduled'];
    }

    /**
     * Sets scheduled
     *
     * @param int $scheduled Total scheduled messages
     *
     * @return self
     */
    public function setScheduled($scheduled)
    {

        if (is_null($scheduled)) {
            throw new \InvalidArgumentException('non-nullable scheduled cannot be null');
        }

        $this->container['scheduled'] = $scheduled;

        return $this;
    }

    /**
     * Gets no_coverage
     *
     * @return int
     */
    public function getNoCoverage()
    {
        return $this->container['no_coverage'];
    }

    /**
     * Sets no_coverage
     *
     * @param int $no_coverage Total no coverage messages
     *
     * @return self
     */
    public function setNoCoverage($no_coverage)
    {

        if (is_null($no_coverage)) {
            throw new \InvalidArgumentException('non-nullable no_coverage cannot be null');
        }

        $this->container['no_coverage'] = $no_coverage;

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


