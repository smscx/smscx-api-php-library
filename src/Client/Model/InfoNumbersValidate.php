<?php
/**
 * InfoNumbersValidate
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
 * InfoNumbersValidate Class Doc Comment
 *
 * @category Class
 * @package  Smscx
 * @author   SMS Connexion
 * @link     https://sms.cx
 * @implements \ArrayAccess<string, mixed>
 */
class InfoNumbersValidate implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $clientModelName = 'InfoNumbersValidate';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $clientTypes = [
        'total_phone_numbers' => 'int',
        'total_valid' => 'int',
        'total_invalid' => 'int',
        'phone_numbers_by_country' => '\Smscx\Client\Model\PhoneNumbersByCountry'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $clientFormats = [
        'total_phone_numbers' => 'int32',
        'total_valid' => 'int32',
        'total_invalid' => 'int32',
        'phone_numbers_by_country' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $clientNullables = [
        'total_phone_numbers' => false,
		'total_valid' => false,
		'total_invalid' => false,
		'phone_numbers_by_country' => false
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
        'total_phone_numbers' => 'totalPhoneNumbers',
        'total_valid' => 'totalValid',
        'total_invalid' => 'totalInvalid',
        'phone_numbers_by_country' => 'phoneNumbersByCountry'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'total_phone_numbers' => 'setTotalPhoneNumbers',
        'total_valid' => 'setTotalValid',
        'total_invalid' => 'setTotalInvalid',
        'phone_numbers_by_country' => 'setPhoneNumbersByCountry'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'total_phone_numbers' => 'getTotalPhoneNumbers',
        'total_valid' => 'getTotalValid',
        'total_invalid' => 'getTotalInvalid',
        'phone_numbers_by_country' => 'getPhoneNumbersByCountry'
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
        $this->setIfExists('total_phone_numbers', $data ?? [], null);
        $this->setIfExists('total_valid', $data ?? [], null);
        $this->setIfExists('total_invalid', $data ?? [], null);
        $this->setIfExists('phone_numbers_by_country', $data ?? [], null);
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

        if ($this->container['total_phone_numbers'] === null) {
            $invalidProperties[] = "'total_phone_numbers' can't be null";
        }
        if ($this->container['total_valid'] === null) {
            $invalidProperties[] = "'total_valid' can't be null";
        }
        if ($this->container['total_invalid'] === null) {
            $invalidProperties[] = "'total_invalid' can't be null";
        }
        if ($this->container['phone_numbers_by_country'] === null) {
            $invalidProperties[] = "'phone_numbers_by_country' can't be null";
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
     * @param int $total_phone_numbers Total phone numbers submitted for validation
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
     * Gets total_valid
     *
     * @return int
     */
    public function getTotalValid()
    {
        return $this->container['total_valid'];
    }

    /**
     * Sets total_valid
     *
     * @param int $total_valid Total valid phone numbers
     *
     * @return self
     */
    public function setTotalValid($total_valid)
    {

        if (is_null($total_valid)) {
            throw new \InvalidArgumentException('non-nullable total_valid cannot be null');
        }

        $this->container['total_valid'] = $total_valid;

        return $this;
    }

    /**
     * Gets total_invalid
     *
     * @return int
     */
    public function getTotalInvalid()
    {
        return $this->container['total_invalid'];
    }

    /**
     * Sets total_invalid
     *
     * @param int $total_invalid Total invalid phone numbers
     *
     * @return self
     */
    public function setTotalInvalid($total_invalid)
    {

        if (is_null($total_invalid)) {
            throw new \InvalidArgumentException('non-nullable total_invalid cannot be null');
        }

        $this->container['total_invalid'] = $total_invalid;

        return $this;
    }

    /**
     * Gets phone_numbers_by_country
     *
     * @return \Smscx\Client\Model\PhoneNumbersByCountry
     */
    public function getPhoneNumbersByCountry()
    {
        return $this->container['phone_numbers_by_country'];
    }

    /**
     * Sets phone_numbers_by_country
     *
     * @param \Smscx\Client\Model\PhoneNumbersByCountry $phone_numbers_by_country phone_numbers_by_country
     *
     * @return self
     */
    public function setPhoneNumbersByCountry($phone_numbers_by_country)
    {

        if (is_null($phone_numbers_by_country)) {
            throw new \InvalidArgumentException('non-nullable phone_numbers_by_country cannot be null');
        }

        $this->container['phone_numbers_by_country'] = $phone_numbers_by_country;

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


