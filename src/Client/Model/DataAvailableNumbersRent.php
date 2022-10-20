<?php
/**
 * DataAvailableNumbersRent
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
 * DataAvailableNumbersRent Class Doc Comment
 *
 * @category Class
 * @package  Smscx
 * @author   SMS Connexion
 * @link     https://sms.cx
 * @implements \ArrayAccess<string, mixed>
 */
class DataAvailableNumbersRent implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $clientModelName = 'DataAvailableNumbersRent';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $clientTypes = [
        'number_id' => 'string',
        'phone_number' => 'string',
        'country_iso' => 'string',
        'network_operator' => 'string',
        'sms' => 'string[]',
        'voice' => 'string[]',
        'min_rent' => 'string',
        'max_rent' => 'string',
        'setup_cost' => 'float',
        'rental_cost' => '\Smscx\Client\Model\RentalCost',
        'inbound_sms_cost' => 'float'
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
        'phone_number' => null,
        'country_iso' => null,
        'network_operator' => null,
        'sms' => null,
        'voice' => null,
        'min_rent' => null,
        'max_rent' => null,
        'setup_cost' => 'decimal',
        'rental_cost' => null,
        'inbound_sms_cost' => 'decimal'
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $clientNullables = [
        'number_id' => false,
		'phone_number' => true,
		'country_iso' => false,
		'network_operator' => false,
		'sms' => false,
		'voice' => false,
		'min_rent' => true,
		'max_rent' => true,
		'setup_cost' => false,
		'rental_cost' => false,
		'inbound_sms_cost' => false
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
        'phone_number' => 'phoneNumber',
        'country_iso' => 'countryIso',
        'network_operator' => 'networkOperator',
        'sms' => 'sms',
        'voice' => 'voice',
        'min_rent' => 'minRent',
        'max_rent' => 'maxRent',
        'setup_cost' => 'setupCost',
        'rental_cost' => 'rentalCost',
        'inbound_sms_cost' => 'inboundSmsCost'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'number_id' => 'setNumberId',
        'phone_number' => 'setPhoneNumber',
        'country_iso' => 'setCountryIso',
        'network_operator' => 'setNetworkOperator',
        'sms' => 'setSms',
        'voice' => 'setVoice',
        'min_rent' => 'setMinRent',
        'max_rent' => 'setMaxRent',
        'setup_cost' => 'setSetupCost',
        'rental_cost' => 'setRentalCost',
        'inbound_sms_cost' => 'setInboundSmsCost'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'number_id' => 'getNumberId',
        'phone_number' => 'getPhoneNumber',
        'country_iso' => 'getCountryIso',
        'network_operator' => 'getNetworkOperator',
        'sms' => 'getSms',
        'voice' => 'getVoice',
        'min_rent' => 'getMinRent',
        'max_rent' => 'getMaxRent',
        'setup_cost' => 'getSetupCost',
        'rental_cost' => 'getRentalCost',
        'inbound_sms_cost' => 'getInboundSmsCost'
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

    public const SMS_INBOUND = 'inbound';
    public const SMS_OUTBOUND = 'outbound';
    public const MIN_RENT__1 = '1';
    public const MIN_RENT__7 = '7';
    public const MIN_RENT__30 = '30';
    public const MAX_RENT__1 = '1';
    public const MAX_RENT__7 = '7';
    public const MAX_RENT__30 = '30';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getSmsAllowableValues()
    {
        return [
            self::SMS_INBOUND,
            self::SMS_OUTBOUND,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getMinRentAllowableValues()
    {
        return [
            self::MIN_RENT__1,
            self::MIN_RENT__7,
            self::MIN_RENT__30,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getMaxRentAllowableValues()
    {
        return [
            self::MAX_RENT__1,
            self::MAX_RENT__7,
            self::MAX_RENT__30,
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
        $this->setIfExists('phone_number', $data ?? [], null);
        $this->setIfExists('country_iso', $data ?? [], null);
        $this->setIfExists('network_operator', $data ?? [], null);
        $this->setIfExists('sms', $data ?? [], null);
        $this->setIfExists('voice', $data ?? [], null);
        $this->setIfExists('min_rent', $data ?? [], null);
        $this->setIfExists('max_rent', $data ?? [], null);
        $this->setIfExists('setup_cost', $data ?? [], null);
        $this->setIfExists('rental_cost', $data ?? [], null);
        $this->setIfExists('inbound_sms_cost', $data ?? [], null);
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

        if ($this->container['phone_number'] === null) {
            $invalidProperties[] = "'phone_number' can't be null";
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

        if ($this->container['network_operator'] === null) {
            $invalidProperties[] = "'network_operator' can't be null";
        }
        if ($this->container['sms'] === null) {
            $invalidProperties[] = "'sms' can't be null";
        }
        if ($this->container['voice'] === null) {
            $invalidProperties[] = "'voice' can't be null";
        }
        if ($this->container['min_rent'] === null) {
            $invalidProperties[] = "'min_rent' can't be null";
        }
        $allowedValues = $this->getMinRentAllowableValues();
        if (!is_null($this->container['min_rent']) && !in_array($this->container['min_rent'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'min_rent', must be one of '%s'",
                $this->container['min_rent'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['max_rent'] === null) {
            $invalidProperties[] = "'max_rent' can't be null";
        }
        $allowedValues = $this->getMaxRentAllowableValues();
        if (!is_null($this->container['max_rent']) && !in_array($this->container['max_rent'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'max_rent', must be one of '%s'",
                $this->container['max_rent'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['setup_cost'] === null) {
            $invalidProperties[] = "'setup_cost' can't be null";
        }
        if ($this->container['rental_cost'] === null) {
            $invalidProperties[] = "'rental_cost' can't be null";
        }
        if ($this->container['inbound_sms_cost'] === null) {
            $invalidProperties[] = "'inbound_sms_cost' can't be null";
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
     * @param string $number_id Unique identifier of phone number
     *
     * @return self
     */
    public function setNumberId($number_id)
    {
        if ((mb_strlen($number_id) > 36)) {
            throw new \InvalidArgumentException('invalid length for $number_id when calling DataAvailableNumbersRent., must be smaller than or equal to 36.');
        }
        if ((mb_strlen($number_id) < 36)) {
            throw new \InvalidArgumentException('invalid length for $number_id when calling DataAvailableNumbersRent., must be bigger than or equal to 36.');
        }
        if ((!preg_match("/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/", $number_id))) {
            throw new \InvalidArgumentException("invalid value for \$number_id when calling DataAvailableNumbersRent., must conform to the pattern /^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/.");
        }


        if (is_null($number_id)) {
            throw new \InvalidArgumentException('non-nullable number_id cannot be null');
        }

        $this->container['number_id'] = $number_id;

        return $this;
    }

    /**
     * Gets phone_number
     *
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->container['phone_number'];
    }

    /**
     * Sets phone_number
     *
     * @param string $phone_number Phone number in international E.164 format. In some cases this value might be null as the phone number will be selected random from a pool of numbers
     *
     * @return self
     */
    public function setPhoneNumber($phone_number)
    {

        if (is_null($phone_number)) {
            array_push($this->clientNullablesSetToNull, 'phone_number');
        } else {
            $nullablesSetToNull = $this->getClientNullablesSetToNull();
            $index = array_search('phone_number', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setClientNullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['phone_number'] = $phone_number;

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
     * @param string $country_iso Two-letter country ISO of the phone number
     *
     * @return self
     */
    public function setCountryIso($country_iso)
    {
        if ((mb_strlen($country_iso) > 2)) {
            throw new \InvalidArgumentException('invalid length for $country_iso when calling DataAvailableNumbersRent., must be smaller than or equal to 2.');
        }
        if ((mb_strlen($country_iso) < 2)) {
            throw new \InvalidArgumentException('invalid length for $country_iso when calling DataAvailableNumbersRent., must be bigger than or equal to 2.');
        }


        if (is_null($country_iso)) {
            throw new \InvalidArgumentException('non-nullable country_iso cannot be null');
        }

        $this->container['country_iso'] = $country_iso;

        return $this;
    }

    /**
     * Gets network_operator
     *
     * @return string
     */
    public function getNetworkOperator()
    {
        return $this->container['network_operator'];
    }

    /**
     * Sets network_operator
     *
     * @param string $network_operator Network operator of the phone number
     *
     * @return self
     */
    public function setNetworkOperator($network_operator)
    {

        if (is_null($network_operator)) {
            throw new \InvalidArgumentException('non-nullable network_operator cannot be null');
        }

        $this->container['network_operator'] = $network_operator;

        return $this;
    }

    /**
     * Gets sms
     *
     * @return string[]
     */
    public function getSms()
    {
        return $this->container['sms'];
    }

    /**
     * Sets sms
     *
     * @param string[] $sms SMS features that the phone number supports (inbound or outbound SMS)
     *
     * @return self
     */
    public function setSms($sms)
    {
        $allowedValues = $this->getSmsAllowableValues();
        if (array_diff($sms, $allowedValues)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'sms', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }

        if (is_null($sms)) {
            throw new \InvalidArgumentException('non-nullable sms cannot be null');
        }

        $this->container['sms'] = $sms;

        return $this;
    }

    /**
     * Gets voice
     *
     * @return string[]
     */
    public function getVoice()
    {
        return $this->container['voice'];
    }

    /**
     * Sets voice
     *
     * @param string[] $voice Voice features that the phone number supports
     *
     * @return self
     */
    public function setVoice($voice)
    {

        if (is_null($voice)) {
            throw new \InvalidArgumentException('non-nullable voice cannot be null');
        }

        $this->container['voice'] = $voice;

        return $this;
    }

    /**
     * Gets min_rent
     *
     * @return string
     */
    public function getMinRent()
    {
        return $this->container['min_rent'];
    }

    /**
     * Sets min_rent
     *
     * @param string $min_rent Minimum period that this phone number must be rented (in days)
     *
     * @return self
     */
    public function setMinRent($min_rent)
    {
        $allowedValues = $this->getMinRentAllowableValues();
        if (!in_array($min_rent, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'min_rent', must be one of '%s'",
                    $min_rent,
                    implode("', '", $allowedValues)
                )
            );
        }

        if (is_null($min_rent)) {
            array_push($this->clientNullablesSetToNull, 'min_rent');
        } else {
            $nullablesSetToNull = $this->getClientNullablesSetToNull();
            $index = array_search('min_rent', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setClientNullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['min_rent'] = $min_rent;

        return $this;
    }

    /**
     * Gets max_rent
     *
     * @return string
     */
    public function getMaxRent()
    {
        return $this->container['max_rent'];
    }

    /**
     * Sets max_rent
     *
     * @param string $max_rent Maximum period that this phone number can be rented (in days)
     *
     * @return self
     */
    public function setMaxRent($max_rent)
    {
        $allowedValues = $this->getMaxRentAllowableValues();
        if (!in_array($max_rent, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'max_rent', must be one of '%s'",
                    $max_rent,
                    implode("', '", $allowedValues)
                )
            );
        }

        if (is_null($max_rent)) {
            array_push($this->clientNullablesSetToNull, 'max_rent');
        } else {
            $nullablesSetToNull = $this->getClientNullablesSetToNull();
            $index = array_search('max_rent', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setClientNullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['max_rent'] = $max_rent;

        return $this;
    }

    /**
     * Gets setup_cost
     *
     * @return float
     */
    public function getSetupCost()
    {
        return $this->container['setup_cost'];
    }

    /**
     * Sets setup_cost
     *
     * @param float $setup_cost One time setup fee for the rented phone number (if applicable)
     *
     * @return self
     */
    public function setSetupCost($setup_cost)
    {

        if (is_null($setup_cost)) {
            throw new \InvalidArgumentException('non-nullable setup_cost cannot be null');
        }

        $this->container['setup_cost'] = $setup_cost;

        return $this;
    }

    /**
     * Gets rental_cost
     *
     * @return \Smscx\Client\Model\RentalCost
     */
    public function getRentalCost()
    {
        return $this->container['rental_cost'];
    }

    /**
     * Sets rental_cost
     *
     * @param \Smscx\Client\Model\RentalCost $rental_cost rental_cost
     *
     * @return self
     */
    public function setRentalCost($rental_cost)
    {

        if (is_null($rental_cost)) {
            throw new \InvalidArgumentException('non-nullable rental_cost cannot be null');
        }

        $this->container['rental_cost'] = $rental_cost;

        return $this;
    }

    /**
     * Gets inbound_sms_cost
     *
     * @return float
     */
    public function getInboundSmsCost()
    {
        return $this->container['inbound_sms_cost'];
    }

    /**
     * Sets inbound_sms_cost
     *
     * @param float $inbound_sms_cost Cost for receiving a SMS on this phone number (most of the time receiving is free, meaning this is has value 0)
     *
     * @return self
     */
    public function setInboundSmsCost($inbound_sms_cost)
    {

        if (is_null($inbound_sms_cost)) {
            throw new \InvalidArgumentException('non-nullable inbound_sms_cost cannot be null');
        }

        $this->container['inbound_sms_cost'] = $inbound_sms_cost;

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


