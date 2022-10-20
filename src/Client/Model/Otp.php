<?php
/**
 * Otp
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
 * Otp Class Doc Comment
 *
 * @category Class
 * @package  Smscx
 * @author   SMS Connexion
 * @link     https://sms.cx
 * @implements \ArrayAccess<string, mixed>
 */
class Otp implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $clientModelName = 'Otp';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $clientTypes = [
        'template' => 'string',
        'from' => 'string',
        'pin_type' => 'string',
        'pin_length' => 'int',
        'ttl' => 'int',
        'max_attempts' => 'int',
        'otp_callback' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $clientFormats = [
        'template' => null,
        'from' => null,
        'pin_type' => null,
        'pin_length' => 'int32',
        'ttl' => 'int32',
        'max_attempts' => 'int32',
        'otp_callback' => 'url'
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $clientNullables = [
        'template' => false,
		'from' => false,
		'pin_type' => false,
		'pin_length' => false,
		'ttl' => false,
		'max_attempts' => false,
		'otp_callback' => true
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
        'template' => 'template',
        'from' => 'from',
        'pin_type' => 'pinType',
        'pin_length' => 'pinLength',
        'ttl' => 'ttl',
        'max_attempts' => 'maxAttempts',
        'otp_callback' => 'otpCallback'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'template' => 'setTemplate',
        'from' => 'setFrom',
        'pin_type' => 'setPinType',
        'pin_length' => 'setPinLength',
        'ttl' => 'setTtl',
        'max_attempts' => 'setMaxAttempts',
        'otp_callback' => 'setOtpCallback'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'template' => 'getTemplate',
        'from' => 'getFrom',
        'pin_type' => 'getPinType',
        'pin_length' => 'getPinLength',
        'ttl' => 'getTtl',
        'max_attempts' => 'getMaxAttempts',
        'otp_callback' => 'getOtpCallback'
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

    public const PIN_TYPE_LETTERS = 'letters';
    public const PIN_TYPE_NUMBERS = 'numbers';
    public const PIN_TYPE_ALPHANUMERIC = 'alphanumeric';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getPinTypeAllowableValues()
    {
        return [
            self::PIN_TYPE_LETTERS,
            self::PIN_TYPE_NUMBERS,
            self::PIN_TYPE_ALPHANUMERIC,
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
        $this->setIfExists('template', $data ?? [], null);
        $this->setIfExists('from', $data ?? [], null);
        $this->setIfExists('pin_type', $data ?? [], null);
        $this->setIfExists('pin_length', $data ?? [], null);
        $this->setIfExists('ttl', $data ?? [], null);
        $this->setIfExists('max_attempts', $data ?? [], null);
        $this->setIfExists('otp_callback', $data ?? [], null);
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

        if ($this->container['template'] === null) {
            $invalidProperties[] = "'template' can't be null";
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

        if ($this->container['pin_type'] === null) {
            $invalidProperties[] = "'pin_type' can't be null";
        }
        $allowedValues = $this->getPinTypeAllowableValues();
        if (!is_null($this->container['pin_type']) && !in_array($this->container['pin_type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'pin_type', must be one of '%s'",
                $this->container['pin_type'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['pin_length'] === null) {
            $invalidProperties[] = "'pin_length' can't be null";
        }
        if (($this->container['pin_length'] > 10)) {
            $invalidProperties[] = "invalid value for 'pin_length', must be smaller than or equal to 10.";
        }

        if (($this->container['pin_length'] < 4)) {
            $invalidProperties[] = "invalid value for 'pin_length', must be bigger than or equal to 4.";
        }

        if ($this->container['ttl'] === null) {
            $invalidProperties[] = "'ttl' can't be null";
        }
        if (($this->container['ttl'] > 1800)) {
            $invalidProperties[] = "invalid value for 'ttl', must be smaller than or equal to 1800.";
        }

        if (($this->container['ttl'] < 60)) {
            $invalidProperties[] = "invalid value for 'ttl', must be bigger than or equal to 60.";
        }

        if ($this->container['max_attempts'] === null) {
            $invalidProperties[] = "'max_attempts' can't be null";
        }
        if (($this->container['max_attempts'] > 10)) {
            $invalidProperties[] = "invalid value for 'max_attempts', must be smaller than or equal to 10.";
        }

        if (($this->container['max_attempts'] < 1)) {
            $invalidProperties[] = "invalid value for 'max_attempts', must be bigger than or equal to 1.";
        }

        if ($this->container['otp_callback'] === null) {
            $invalidProperties[] = "'otp_callback' can't be null";
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
     * Gets template
     *
     * @return string
     */
    public function getTemplate()
    {
        return $this->container['template'];
    }

    /**
     * Sets template
     *
     * @param string $template template
     *
     * @return self
     */
    public function setTemplate($template)
    {

        if (is_null($template)) {
            throw new \InvalidArgumentException('non-nullable template cannot be null');
        }

        $this->container['template'] = $template;

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
     * @param string $from from
     *
     * @return self
     */
    public function setFrom($from)
    {
        if ((mb_strlen($from) > 15)) {
            throw new \InvalidArgumentException('invalid length for $from when calling Otp., must be smaller than or equal to 15.');
        }
        if ((mb_strlen($from) < 3)) {
            throw new \InvalidArgumentException('invalid length for $from when calling Otp., must be bigger than or equal to 3.');
        }


        if (is_null($from)) {
            throw new \InvalidArgumentException('non-nullable from cannot be null');
        }

        $this->container['from'] = $from;

        return $this;
    }

    /**
     * Gets pin_type
     *
     * @return string
     */
    public function getPinType()
    {
        return $this->container['pin_type'];
    }

    /**
     * Sets pin_type
     *
     * @param string $pin_type pin_type
     *
     * @return self
     */
    public function setPinType($pin_type)
    {
        $allowedValues = $this->getPinTypeAllowableValues();
        if (!in_array($pin_type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'pin_type', must be one of '%s'",
                    $pin_type,
                    implode("', '", $allowedValues)
                )
            );
        }

        if (is_null($pin_type)) {
            throw new \InvalidArgumentException('non-nullable pin_type cannot be null');
        }

        $this->container['pin_type'] = $pin_type;

        return $this;
    }

    /**
     * Gets pin_length
     *
     * @return int
     */
    public function getPinLength()
    {
        return $this->container['pin_length'];
    }

    /**
     * Sets pin_length
     *
     * @param int $pin_length pin_length
     *
     * @return self
     */
    public function setPinLength($pin_length)
    {

        if (($pin_length > 10)) {
            throw new \InvalidArgumentException('invalid value for $pin_length when calling Otp., must be smaller than or equal to 10.');
        }
        if (($pin_length < 4)) {
            throw new \InvalidArgumentException('invalid value for $pin_length when calling Otp., must be bigger than or equal to 4.');
        }


        if (is_null($pin_length)) {
            throw new \InvalidArgumentException('non-nullable pin_length cannot be null');
        }

        $this->container['pin_length'] = $pin_length;

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

        if (($ttl > 1800)) {
            throw new \InvalidArgumentException('invalid value for $ttl when calling Otp., must be smaller than or equal to 1800.');
        }
        if (($ttl < 60)) {
            throw new \InvalidArgumentException('invalid value for $ttl when calling Otp., must be bigger than or equal to 60.');
        }


        if (is_null($ttl)) {
            throw new \InvalidArgumentException('non-nullable ttl cannot be null');
        }

        $this->container['ttl'] = $ttl;

        return $this;
    }

    /**
     * Gets max_attempts
     *
     * @return int
     */
    public function getMaxAttempts()
    {
        return $this->container['max_attempts'];
    }

    /**
     * Sets max_attempts
     *
     * @param int $max_attempts max_attempts
     *
     * @return self
     */
    public function setMaxAttempts($max_attempts)
    {

        if (($max_attempts > 10)) {
            throw new \InvalidArgumentException('invalid value for $max_attempts when calling Otp., must be smaller than or equal to 10.');
        }
        if (($max_attempts < 1)) {
            throw new \InvalidArgumentException('invalid value for $max_attempts when calling Otp., must be bigger than or equal to 1.');
        }


        if (is_null($max_attempts)) {
            throw new \InvalidArgumentException('non-nullable max_attempts cannot be null');
        }

        $this->container['max_attempts'] = $max_attempts;

        return $this;
    }

    /**
     * Gets otp_callback
     *
     * @return string
     */
    public function getOtpCallback()
    {
        return $this->container['otp_callback'];
    }

    /**
     * Sets otp_callback
     *
     * @param string $otp_callback otp_callback
     *
     * @return self
     */
    public function setOtpCallback($otp_callback)
    {

        if (is_null($otp_callback)) {
            array_push($this->clientNullablesSetToNull, 'otp_callback');
        } else {
            $nullablesSetToNull = $this->getClientNullablesSetToNull();
            $index = array_search('otp_callback', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setClientNullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['otp_callback'] = $otp_callback;

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


