<?php
/**
 * RentNumberRequest
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
 * RentNumberRequest Class Doc Comment
 *
 * @category Class
 * @package  Smscx
 * @author   SMS Connexion
 * @link     https://sms.cx
 * @implements \ArrayAccess<string, mixed>
 */
class RentNumberRequest implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $clientModelName = 'RentNumberRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $clientTypes = [
        'number_id' => 'string',
        'rent_period' => 'int',
        'auto_renew' => 'bool',
        'callback_url' => 'string',
        'registration_id' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $clientFormats = [
        'number_id' => 'uuid',
        'rent_period' => 'int32',
        'auto_renew' => null,
        'callback_url' => 'url',
        'registration_id' => 'uuid'
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $clientNullables = [
        'number_id' => false,
		'rent_period' => false,
		'auto_renew' => false,
		'callback_url' => true,
		'registration_id' => false
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
        'number_id' => 'numberId',
        'rent_period' => 'rentPeriod',
        'auto_renew' => 'autoRenew',
        'callback_url' => 'callbackUrl',
        'registration_id' => 'registrationId'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'number_id' => 'setNumberId',
        'rent_period' => 'setRentPeriod',
        'auto_renew' => 'setAutoRenew',
        'callback_url' => 'setCallbackUrl',
        'registration_id' => 'setRegistrationId'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'number_id' => 'getNumberId',
        'rent_period' => 'getRentPeriod',
        'auto_renew' => 'getAutoRenew',
        'callback_url' => 'getCallbackUrl',
        'registration_id' => 'getRegistrationId'
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
        $this->setIfExists('number_id', $data ?? [], null);
        $this->setIfExists('rent_period', $data ?? [], null);
        $this->setIfExists('auto_renew', $data ?? [], false);
        $this->setIfExists('callback_url', $data ?? [], null);
        $this->setIfExists('registration_id', $data ?? [], null);
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

        if ($this->container['number_id'] === null) {
            $invalidProperties[] = "'number_id' can't be null";
        }
        if ((mb_strlen($this->container['number_id']) > 36)) {
            $invalidProperties[] = "invalid value for 'number_id', the character length must be smaller than or equal to 36.";
        }

        if ((mb_strlen($this->container['number_id']) < 36)) {
            $invalidProperties[] = "invalid value for 'number_id', the character length must be bigger than or equal to 36.";
        }

        if (!preg_match("/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/", $this->container['number_id'])) {
            $invalidProperties[] = "invalid value for 'number_id', must be conform to the pattern /^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/.";
        }

        if ($this->container['rent_period'] === null) {
            $invalidProperties[] = "'rent_period' can't be null";
        }
        $allowedValues = $this->getRentPeriodAllowableValues();
        if (!is_null($this->container['rent_period']) && !in_array($this->container['rent_period'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'rent_period', must be one of '%s'",
                $this->container['rent_period'],
                implode("', '", $allowedValues)
            );
        }

        if (!is_null($this->container['registration_id']) && (mb_strlen($this->container['registration_id']) > 36)) {
            $invalidProperties[] = "invalid value for 'registration_id', the character length must be smaller than or equal to 36.";
        }

        if (!is_null($this->container['registration_id']) && (mb_strlen($this->container['registration_id']) < 36)) {
            $invalidProperties[] = "invalid value for 'registration_id', the character length must be bigger than or equal to 36.";
        }

        if (!is_null($this->container['registration_id']) && !preg_match("/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/", $this->container['registration_id'])) {
            $invalidProperties[] = "invalid value for 'registration_id', must be conform to the pattern /^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/.";
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
     * Gets number_id
     *
     * @return string
     */
    public function getNumberId()
    {
        return $this->container['number_id'];
    }

    /**
     * Sets number_id
     *
     * @param string $number_id Unique identifier of the phone number from the available rental list
     *
     * @return self
     */
    public function setNumberId($number_id)
    {
        if ((mb_strlen($number_id) > 36)) {
            throw new \InvalidArgumentException('invalid length for $number_id when calling RentNumberRequest., must be smaller than or equal to 36.');
        }
        if ((mb_strlen($number_id) < 36)) {
            throw new \InvalidArgumentException('invalid length for $number_id when calling RentNumberRequest., must be bigger than or equal to 36.');
        }
        if ((!preg_match("/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/", $number_id))) {
            throw new \InvalidArgumentException("invalid value for \$number_id when calling RentNumberRequest., must conform to the pattern /^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/.");
        }


        if (is_null($number_id)) {
            throw new \InvalidArgumentException('non-nullable number_id cannot be null');
        }

        $this->container['number_id'] = $number_id;

        return $this;
    }

    /**
     * Gets rent_period
     *
     * @return int
     */
    public function getRentPeriod()
    {
        return $this->container['rent_period'];
    }

    /**
     * Sets rent_period
     *
     * @param int $rent_period Rental period of the phone number (in days)
     *
     * @return self
     */
    public function setRentPeriod($rent_period)
    {
        $allowedValues = $this->getRentPeriodAllowableValues();
        if (!in_array($rent_period, $allowedValues, true)) {
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
     * Gets registration_id
     *
     * @return string|null
     */
    public function getRegistrationId()
    {
        return $this->container['registration_id'];
    }

    /**
     * Sets registration_id
     *
     * @param string|null $registration_id Applicable if the phone number requires registration. Unique identifier of the registration details for this phone number
     *
     * @return self
     */
    public function setRegistrationId($registration_id)
    {
        if (!is_null($registration_id) && (mb_strlen($registration_id) > 36)) {
            throw new \InvalidArgumentException('invalid length for $registration_id when calling RentNumberRequest., must be smaller than or equal to 36.');
        }
        if (!is_null($registration_id) && (mb_strlen($registration_id) < 36)) {
            throw new \InvalidArgumentException('invalid length for $registration_id when calling RentNumberRequest., must be bigger than or equal to 36.');
        }
        if (!is_null($registration_id) && (!preg_match("/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/", $registration_id))) {
            throw new \InvalidArgumentException("invalid value for \$registration_id when calling RentNumberRequest., must conform to the pattern /^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/.");
        }


        if (is_null($registration_id)) {
            throw new \InvalidArgumentException('non-nullable registration_id cannot be null');
        }

        $this->container['registration_id'] = $registration_id;

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


