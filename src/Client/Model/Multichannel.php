<?php
/**
 * Multichannel
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
 * Multichannel Class Doc Comment
 *
 * @category Class
 * @package  Smscx
 * @author   SMS Connexion
 * @link     https://sms.cx
 * @implements \ArrayAccess<string, mixed>
 */
class Multichannel implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $clientModelName = 'Multichannel';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $clientTypes = [
        'dlr_callback' => 'string',
        'receive_callback' => 'string',
        'quiet_hours' => '\Smscx\Client\Model\QuietHours',
        'ttl' => 'int',
        'expire_after_ttl' => 'bool'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $clientFormats = [
        'dlr_callback' => null,
        'receive_callback' => null,
        'quiet_hours' => null,
        'ttl' => 'int32',
        'expire_after_ttl' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $clientNullables = [
        'dlr_callback' => true,
		'receive_callback' => true,
		'quiet_hours' => true,
		'ttl' => false,
		'expire_after_ttl' => false
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
        'dlr_callback' => 'dlrCallback',
        'receive_callback' => 'receiveCallback',
        'quiet_hours' => 'quietHours',
        'ttl' => 'ttl',
        'expire_after_ttl' => 'expireAfterTtl'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'dlr_callback' => 'setDlrCallback',
        'receive_callback' => 'setReceiveCallback',
        'quiet_hours' => 'setQuietHours',
        'ttl' => 'setTtl',
        'expire_after_ttl' => 'setExpireAfterTtl'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'dlr_callback' => 'getDlrCallback',
        'receive_callback' => 'getReceiveCallback',
        'quiet_hours' => 'getQuietHours',
        'ttl' => 'getTtl',
        'expire_after_ttl' => 'getExpireAfterTtl'
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
        $this->setIfExists('dlr_callback', $data ?? [], null);
        $this->setIfExists('receive_callback', $data ?? [], null);
        $this->setIfExists('quiet_hours', $data ?? [], null);
        $this->setIfExists('ttl', $data ?? [], null);
        $this->setIfExists('expire_after_ttl', $data ?? [], null);
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

        if ($this->container['dlr_callback'] === null) {
            $invalidProperties[] = "'dlr_callback' can't be null";
        }
        if ($this->container['receive_callback'] === null) {
            $invalidProperties[] = "'receive_callback' can't be null";
        }
        if ($this->container['quiet_hours'] === null) {
            $invalidProperties[] = "'quiet_hours' can't be null";
        }
        if ($this->container['ttl'] === null) {
            $invalidProperties[] = "'ttl' can't be null";
        }
        if ($this->container['expire_after_ttl'] === null) {
            $invalidProperties[] = "'expire_after_ttl' can't be null";
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
     * Gets dlr_callback
     *
     * @return string
     */
    public function getDlrCallback()
    {
        return $this->container['dlr_callback'];
    }

    /**
     * Sets dlr_callback
     *
     * @param string $dlr_callback dlr_callback
     *
     * @return self
     */
    public function setDlrCallback($dlr_callback)
    {

        if (is_null($dlr_callback)) {
            array_push($this->clientNullablesSetToNull, 'dlr_callback');
        } else {
            $nullablesSetToNull = $this->getClientNullablesSetToNull();
            $index = array_search('dlr_callback', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setClientNullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['dlr_callback'] = $dlr_callback;

        return $this;
    }

    /**
     * Gets receive_callback
     *
     * @return string
     */
    public function getReceiveCallback()
    {
        return $this->container['receive_callback'];
    }

    /**
     * Sets receive_callback
     *
     * @param string $receive_callback receive_callback
     *
     * @return self
     */
    public function setReceiveCallback($receive_callback)
    {

        if (is_null($receive_callback)) {
            array_push($this->clientNullablesSetToNull, 'receive_callback');
        } else {
            $nullablesSetToNull = $this->getClientNullablesSetToNull();
            $index = array_search('receive_callback', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setClientNullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['receive_callback'] = $receive_callback;

        return $this;
    }

    /**
     * Gets quiet_hours
     *
     * @return \Smscx\Client\Model\QuietHours
     */
    public function getQuietHours()
    {
        return $this->container['quiet_hours'];
    }

    /**
     * Sets quiet_hours
     *
     * @param \Smscx\Client\Model\QuietHours $quiet_hours quiet_hours
     *
     * @return self
     */
    public function setQuietHours($quiet_hours)
    {

        if (is_null($quiet_hours)) {
            array_push($this->clientNullablesSetToNull, 'quiet_hours');
        } else {
            $nullablesSetToNull = $this->getClientNullablesSetToNull();
            $index = array_search('quiet_hours', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setClientNullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['quiet_hours'] = $quiet_hours;

        return $this;
    }

    /**
     * Gets ttl
     *
     * @return int
     */
    public function getTtl()
    {
        return $this->container['ttl'];
    }

    /**
     * Sets ttl
     *
     * @param int $ttl ttl
     *
     * @return self
     */
    public function setTtl($ttl)
    {

        if (is_null($ttl)) {
            throw new \InvalidArgumentException('non-nullable ttl cannot be null');
        }

        $this->container['ttl'] = $ttl;

        return $this;
    }

    /**
     * Gets expire_after_ttl
     *
     * @return bool
     */
    public function getExpireAfterTtl()
    {
        return $this->container['expire_after_ttl'];
    }

    /**
     * Sets expire_after_ttl
     *
     * @param bool $expire_after_ttl expire_after_ttl
     *
     * @return self
     */
    public function setExpireAfterTtl($expire_after_ttl)
    {

        if (is_null($expire_after_ttl)) {
            throw new \InvalidArgumentException('non-nullable expire_after_ttl cannot be null');
        }

        $this->container['expire_after_ttl'] = $expire_after_ttl;

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


