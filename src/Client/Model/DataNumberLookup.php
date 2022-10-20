<?php
/**
 * DataNumberLookup
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
 * DataNumberLookup Class Doc Comment
 *
 * @category Class
 * @package  Smscx
 * @author   SMS Connexion
 * @link     https://sms.cx
 * @implements \ArrayAccess<string, mixed>
 */
class DataNumberLookup implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $clientModelName = 'DataNumberLookup';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $clientTypes = [
        'phone_number' => 'string',
        'lookup_id' => 'string',
        'cost' => 'float',
        'mcc' => 'string',
        'mccmnc' => 'string',
        'country_iso' => 'string',
        'country_name' => 'string',
        'country_name_locale' => 'string',
        'status' => 'string',
        'status_description' => 'string',
        'ported' => 'bool',
        'roaming' => 'bool',
        'original_network' => '\Smscx\Client\Model\OriginalNetwork',
        'ported_network' => '\Smscx\Client\Model\PortedNetwork',
        'roaming_network' => '\Smscx\Client\Model\RoamingNetwork',
        'datetime' => '\DateTime'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $clientFormats = [
        'phone_number' => null,
        'lookup_id' => 'uuid',
        'cost' => 'decimal',
        'mcc' => null,
        'mccmnc' => null,
        'country_iso' => null,
        'country_name' => null,
        'country_name_locale' => null,
        'status' => null,
        'status_description' => null,
        'ported' => null,
        'roaming' => null,
        'original_network' => null,
        'ported_network' => null,
        'roaming_network' => null,
        'datetime' => 'date-time'
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $clientNullables = [
        'phone_number' => false,
		'lookup_id' => false,
		'cost' => false,
		'mcc' => false,
		'mccmnc' => false,
		'country_iso' => false,
		'country_name' => false,
		'country_name_locale' => false,
		'status' => false,
		'status_description' => false,
		'ported' => false,
		'roaming' => false,
		'original_network' => false,
		'ported_network' => false,
		'roaming_network' => false,
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
        'phone_number' => 'phoneNumber',
        'lookup_id' => 'lookupId',
        'cost' => 'cost',
        'mcc' => 'mcc',
        'mccmnc' => 'mccmnc',
        'country_iso' => 'countryIso',
        'country_name' => 'countryName',
        'country_name_locale' => 'countryNameLocale',
        'status' => 'status',
        'status_description' => 'statusDescription',
        'ported' => 'ported',
        'roaming' => 'roaming',
        'original_network' => 'originalNetwork',
        'ported_network' => 'portedNetwork',
        'roaming_network' => 'roamingNetwork',
        'datetime' => 'datetime'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'phone_number' => 'setPhoneNumber',
        'lookup_id' => 'setLookupId',
        'cost' => 'setCost',
        'mcc' => 'setMcc',
        'mccmnc' => 'setMccmnc',
        'country_iso' => 'setCountryIso',
        'country_name' => 'setCountryName',
        'country_name_locale' => 'setCountryNameLocale',
        'status' => 'setStatus',
        'status_description' => 'setStatusDescription',
        'ported' => 'setPorted',
        'roaming' => 'setRoaming',
        'original_network' => 'setOriginalNetwork',
        'ported_network' => 'setPortedNetwork',
        'roaming_network' => 'setRoamingNetwork',
        'datetime' => 'setDatetime'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'phone_number' => 'getPhoneNumber',
        'lookup_id' => 'getLookupId',
        'cost' => 'getCost',
        'mcc' => 'getMcc',
        'mccmnc' => 'getMccmnc',
        'country_iso' => 'getCountryIso',
        'country_name' => 'getCountryName',
        'country_name_locale' => 'getCountryNameLocale',
        'status' => 'getStatus',
        'status_description' => 'getStatusDescription',
        'ported' => 'getPorted',
        'roaming' => 'getRoaming',
        'original_network' => 'getOriginalNetwork',
        'ported_network' => 'getPortedNetwork',
        'roaming_network' => 'getRoamingNetwork',
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

    public const STATUS_ACTIVE = 'ACTIVE';
    public const STATUS_ABSENT = 'ABSENT';
    public const STATUS_BARRED = 'BARRED';
    public const STATUS_UNKNOWN = 'UNKNOWN';
    public const STATUS_FAILED = 'FAILED';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getStatusAllowableValues()
    {
        return [
            self::STATUS_ACTIVE,
            self::STATUS_ABSENT,
            self::STATUS_BARRED,
            self::STATUS_UNKNOWN,
            self::STATUS_FAILED,
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
        $this->setIfExists('phone_number', $data ?? [], null);
        $this->setIfExists('lookup_id', $data ?? [], null);
        $this->setIfExists('cost', $data ?? [], null);
        $this->setIfExists('mcc', $data ?? [], null);
        $this->setIfExists('mccmnc', $data ?? [], null);
        $this->setIfExists('country_iso', $data ?? [], null);
        $this->setIfExists('country_name', $data ?? [], null);
        $this->setIfExists('country_name_locale', $data ?? [], null);
        $this->setIfExists('status', $data ?? [], null);
        $this->setIfExists('status_description', $data ?? [], null);
        $this->setIfExists('ported', $data ?? [], null);
        $this->setIfExists('roaming', $data ?? [], null);
        $this->setIfExists('original_network', $data ?? [], null);
        $this->setIfExists('ported_network', $data ?? [], null);
        $this->setIfExists('roaming_network', $data ?? [], null);
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

        if ($this->container['phone_number'] === null) {
            $invalidProperties[] = "'phone_number' can't be null";
        }
        if ($this->container['lookup_id'] === null) {
            $invalidProperties[] = "'lookup_id' can't be null";
        }
        if ((mb_strlen($this->container['lookup_id']) > 36)) {
            $invalidProperties[] = "invalid value for 'lookup_id', the character length must be smaller than or equal to 36.";
        }

        if ((mb_strlen($this->container['lookup_id']) < 36)) {
            $invalidProperties[] = "invalid value for 'lookup_id', the character length must be bigger than or equal to 36.";
        }

        if (!preg_match("/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/", $this->container['lookup_id'])) {
            $invalidProperties[] = "invalid value for 'lookup_id', must be conform to the pattern /^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/.";
        }

        if ($this->container['cost'] === null) {
            $invalidProperties[] = "'cost' can't be null";
        }
        if ($this->container['mcc'] === null) {
            $invalidProperties[] = "'mcc' can't be null";
        }
        if ($this->container['mccmnc'] === null) {
            $invalidProperties[] = "'mccmnc' can't be null";
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

        if ($this->container['country_name'] === null) {
            $invalidProperties[] = "'country_name' can't be null";
        }
        if ($this->container['country_name_locale'] === null) {
            $invalidProperties[] = "'country_name_locale' can't be null";
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

        if ($this->container['status_description'] === null) {
            $invalidProperties[] = "'status_description' can't be null";
        }
        if ($this->container['ported'] === null) {
            $invalidProperties[] = "'ported' can't be null";
        }
        if ($this->container['roaming'] === null) {
            $invalidProperties[] = "'roaming' can't be null";
        }
        if ($this->container['original_network'] === null) {
            $invalidProperties[] = "'original_network' can't be null";
        }
        if ($this->container['ported_network'] === null) {
            $invalidProperties[] = "'ported_network' can't be null";
        }
        if ($this->container['roaming_network'] === null) {
            $invalidProperties[] = "'roaming_network' can't be null";
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
     * @param string $phone_number Phone number in international E.164 format
     *
     * @return self
     */
    public function setPhoneNumber($phone_number)
    {

        if (is_null($phone_number)) {
            throw new \InvalidArgumentException('non-nullable phone_number cannot be null');
        }

        $this->container['phone_number'] = $phone_number;

        return $this;
    }

    /**
     * Gets lookup_id
     *
     * @return string
     */
    public function getLookupId()
    {
        return $this->container['lookup_id'];
    }

    /**
     * Sets lookup_id
     *
     * @param string $lookup_id Unique lookup identifier
     *
     * @return self
     */
    public function setLookupId($lookup_id)
    {
        if ((mb_strlen($lookup_id) > 36)) {
            throw new \InvalidArgumentException('invalid length for $lookup_id when calling DataNumberLookup., must be smaller than or equal to 36.');
        }
        if ((mb_strlen($lookup_id) < 36)) {
            throw new \InvalidArgumentException('invalid length for $lookup_id when calling DataNumberLookup., must be bigger than or equal to 36.');
        }
        if ((!preg_match("/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/", $lookup_id))) {
            throw new \InvalidArgumentException("invalid value for \$lookup_id when calling DataNumberLookup., must conform to the pattern /^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/.");
        }


        if (is_null($lookup_id)) {
            throw new \InvalidArgumentException('non-nullable lookup_id cannot be null');
        }

        $this->container['lookup_id'] = $lookup_id;

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
     * @param float $cost The cost of phone number lookup
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
     * Gets mcc
     *
     * @return string
     */
    public function getMcc()
    {
        return $this->container['mcc'];
    }

    /**
     * Sets mcc
     *
     * @param string $mcc Mobile country code. [See full list of MCC](https://www.itu.int/dms_pub/itu-t/opb/sp/T-SP-E.212B-2018-PDF-E.pdf)
     *
     * @return self
     */
    public function setMcc($mcc)
    {

        if (is_null($mcc)) {
            throw new \InvalidArgumentException('non-nullable mcc cannot be null');
        }

        $this->container['mcc'] = $mcc;

        return $this;
    }

    /**
     * Gets mccmnc
     *
     * @return string
     */
    public function getMccmnc()
    {
        return $this->container['mccmnc'];
    }

    /**
     * Sets mccmnc
     *
     * @param string $mccmnc Mobile country code + Mobile network code. [See full list of MCC + MNC](https://www.itu.int/dms_pub/itu-t/opb/sp/T-SP-E.212B-2018-PDF-E.pdf)
     *
     * @return self
     */
    public function setMccmnc($mccmnc)
    {

        if (is_null($mccmnc)) {
            throw new \InvalidArgumentException('non-nullable mccmnc cannot be null');
        }

        $this->container['mccmnc'] = $mccmnc;

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
     * @param string $country_iso Two-letter country code in ISO-3166 alpha 2 standard of the destinations. Eg. `DE`, `FR`, `IT`
     *
     * @return self
     */
    public function setCountryIso($country_iso)
    {
        if ((mb_strlen($country_iso) > 2)) {
            throw new \InvalidArgumentException('invalid length for $country_iso when calling DataNumberLookup., must be smaller than or equal to 2.');
        }
        if ((mb_strlen($country_iso) < 2)) {
            throw new \InvalidArgumentException('invalid length for $country_iso when calling DataNumberLookup., must be bigger than or equal to 2.');
        }


        if (is_null($country_iso)) {
            throw new \InvalidArgumentException('non-nullable country_iso cannot be null');
        }

        $this->container['country_iso'] = $country_iso;

        return $this;
    }

    /**
     * Gets country_name
     *
     * @return string
     */
    public function getCountryName()
    {
        return $this->container['country_name'];
    }

    /**
     * Sets country_name
     *
     * @param string $country_name Name of the country of the phone number
     *
     * @return self
     */
    public function setCountryName($country_name)
    {

        if (is_null($country_name)) {
            throw new \InvalidArgumentException('non-nullable country_name cannot be null');
        }

        $this->container['country_name'] = $country_name;

        return $this;
    }

    /**
     * Gets country_name_locale
     *
     * @return string
     */
    public function getCountryNameLocale()
    {
        return $this->container['country_name_locale'];
    }

    /**
     * Sets country_name_locale
     *
     * @param string $country_name_locale Name of the country in local language
     *
     * @return self
     */
    public function setCountryNameLocale($country_name_locale)
    {

        if (is_null($country_name_locale)) {
            throw new \InvalidArgumentException('non-nullable country_name_locale cannot be null');
        }

        $this->container['country_name_locale'] = $country_name_locale;

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
     * @param string $status Status of the phone number
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
     * Gets status_description
     *
     * @return string
     */
    public function getStatusDescription()
    {
        return $this->container['status_description'];
    }

    /**
     * Sets status_description
     *
     * @param string $status_description Short description of the status
     *
     * @return self
     */
    public function setStatusDescription($status_description)
    {

        if (is_null($status_description)) {
            throw new \InvalidArgumentException('non-nullable status_description cannot be null');
        }

        $this->container['status_description'] = $status_description;

        return $this;
    }

    /**
     * Gets ported
     *
     * @return bool
     */
    public function getPorted()
    {
        return $this->container['ported'];
    }

    /**
     * Sets ported
     *
     * @param bool $ported Returns `true` if the phone number is ported to other mobile network, `false` otherwise
     *
     * @return self
     */
    public function setPorted($ported)
    {

        if (is_null($ported)) {
            throw new \InvalidArgumentException('non-nullable ported cannot be null');
        }

        $this->container['ported'] = $ported;

        return $this;
    }

    /**
     * Gets roaming
     *
     * @return bool
     */
    public function getRoaming()
    {
        return $this->container['roaming'];
    }

    /**
     * Sets roaming
     *
     * @param bool $roaming Returns `true` if the phone number is roaming in other network, `false` otherwise
     *
     * @return self
     */
    public function setRoaming($roaming)
    {

        if (is_null($roaming)) {
            throw new \InvalidArgumentException('non-nullable roaming cannot be null');
        }

        $this->container['roaming'] = $roaming;

        return $this;
    }

    /**
     * Gets original_network
     *
     * @return \Smscx\Client\Model\OriginalNetwork
     */
    public function getOriginalNetwork()
    {
        return $this->container['original_network'];
    }

    /**
     * Sets original_network
     *
     * @param \Smscx\Client\Model\OriginalNetwork $original_network original_network
     *
     * @return self
     */
    public function setOriginalNetwork($original_network)
    {

        if (is_null($original_network)) {
            throw new \InvalidArgumentException('non-nullable original_network cannot be null');
        }

        $this->container['original_network'] = $original_network;

        return $this;
    }

    /**
     * Gets ported_network
     *
     * @return \Smscx\Client\Model\PortedNetwork
     */
    public function getPortedNetwork()
    {
        return $this->container['ported_network'];
    }

    /**
     * Sets ported_network
     *
     * @param \Smscx\Client\Model\PortedNetwork $ported_network ported_network
     *
     * @return self
     */
    public function setPortedNetwork($ported_network)
    {

        if (is_null($ported_network)) {
            throw new \InvalidArgumentException('non-nullable ported_network cannot be null');
        }

        $this->container['ported_network'] = $ported_network;

        return $this;
    }

    /**
     * Gets roaming_network
     *
     * @return \Smscx\Client\Model\RoamingNetwork
     */
    public function getRoamingNetwork()
    {
        return $this->container['roaming_network'];
    }

    /**
     * Sets roaming_network
     *
     * @param \Smscx\Client\Model\RoamingNetwork $roaming_network roaming_network
     *
     * @return self
     */
    public function setRoamingNetwork($roaming_network)
    {

        if (is_null($roaming_network)) {
            throw new \InvalidArgumentException('non-nullable roaming_network cannot be null');
        }

        $this->container['roaming_network'] = $roaming_network;

        return $this;
    }

    /**
     * Gets datetime
     *
     * @return \DateTime
     */
    public function getDatetime()
    {
        return $this->container['datetime'];
    }

    /**
     * Sets datetime
     *
     * @param \DateTime $datetime Date and time of the phone number lookup request
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


