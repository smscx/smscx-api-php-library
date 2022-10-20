<?php
/**
 * RenewRentRequest
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
 * RenewRentRequest Class Doc Comment
 *
 * @category Class
 * @package  Smscx
 * @author   SMS Connexion
 * @link     https://sms.cx
 * @implements \ArrayAccess<string, mixed>
 */
class RenewRentRequest implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $clientModelName = 'RenewRentRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $clientTypes = [
        'rent_period' => 'int',
        'auto_renew' => 'bool',
        'callback_url' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $clientFormats = [
        'rent_period' => 'int32',
        'auto_renew' => null,
        'callback_url' => 'url'
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $clientNullables = [
        'rent_period' => false,
		'auto_renew' => false,
		'callback_url' => true
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
        'rent_period' => 'rentPeriod',
        'auto_renew' => 'autoRenew',
        'callback_url' => 'callbackUrl'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'rent_period' => 'setRentPeriod',
        'auto_renew' => 'setAutoRenew',
        'callback_url' => 'setCallbackUrl'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'rent_period' => 'getRentPeriod',
        'auto_renew' => 'getAutoRenew',
        'callback_url' => 'getCallbackUrl'
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

    public const RENT_PERIOD_1 = 1;
    public const RENT_PERIOD_7 = 7;
    public const RENT_PERIOD_30 = 30;

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getRentPeriodAllowableValues()
    {
        return [
            self::RENT_PERIOD_1,
            self::RENT_PERIOD_7,
            self::RENT_PERIOD_30,
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
        $this->setIfExists('rent_period', $data ?? [], null);
        $this->setIfExists('auto_renew', $data ?? [], false);
        $this->setIfExists('callback_url', $data ?? [], null);
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

        $allowedValues = $this->getRentPeriodAllowableValues();
        if (!is_null($this->container['rent_period']) && !in_array($this->container['rent_period'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'rent_period', must be one of '%s'",
                $this->container['rent_period'],
                implode("', '", $allowedValues)
            );
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
     * Gets rent_period
     *
     * @return int|null
     */
    public function getRentPeriod()
    {
        return $this->container['rent_period'];
    }

    /**
     * Sets rent_period
     *
     * @param int|null $rent_period Rental period of the phone number (in days). This parameter is optional. If not present, the phone number rent will renew with the current rent period.
     *
     * @return self
     */
    public function setRentPeriod($rent_period)
    {
        $allowedValues = $this->getRentPeriodAllowableValues();
        if (!is_null($rent_period) && !in_array($rent_period, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'rent_period', must be one of '%s'",
                    $rent_period,
                    implode("', '", $allowedValues)
                )
            );
        }

        if (is_null($rent_period)) {
            throw new \InvalidArgumentException('non-nullable rent_period cannot be null');
        }

        $this->container['rent_period'] = $rent_period;

        return $this;
    }

    /**
     * Gets auto_renew
     *
     * @return bool|null
     */
    public function getAutoRenew()
    {
        return $this->container['auto_renew'];
    }

    /**
     * Sets auto_renew
     *
     * @param bool|null $auto_renew Auto renew the rental of the phone number at the end of the rental period
     *
     * @return self
     */
    public function setAutoRenew($auto_renew)
    {

        if (is_null($auto_renew)) {
            throw new \InvalidArgumentException('non-nullable auto_renew cannot be null');
        }

        $this->container['auto_renew'] = $auto_renew;

        return $this;
    }

    /**
     * Gets callback_url
     *
     * @return string|null
     */
    public function getCallbackUrl()
    {
        return $this->container['callback_url'];
    }

    /**
     * Sets callback_url
     *
     * @param string|null $callback_url Callback URL (or webhook) to get the received SMS on the rented phone number
     *
     * @return self
     */
    public function setCallbackUrl($callback_url)
    {

        if (is_null($callback_url)) {
            array_push($this->clientNullablesSetToNull, 'callback_url');
        } else {
            $nullablesSetToNull = $this->getClientNullablesSetToNull();
            $index = array_search('callback_url', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setClientNullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['callback_url'] = $callback_url;

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


