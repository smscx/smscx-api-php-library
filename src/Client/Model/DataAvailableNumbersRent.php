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
        'features' => 'int',
        'number_type' => 'string',
        'inbound_sms_cost' => 'float',
        'outbound_sms_cost' => 'float',
        'setup_cost' => 'float',
        'rent_cost' => '\Smscx\Client\Model\RentCost[]',
        'min_rent' => 'int',
        'setup_time' => 'string',
        'registration' => 'bool',
        'inbound_sms_sender' => 'bool',
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
        'number_id' => 'uuid',
        'phone_number' => null,
        'country_iso' => null,
        'network_operator' => null,
        'features' => 'int32',
        'number_type' => null,
        'inbound_sms_cost' => 'decimal',
        'outbound_sms_cost' => 'decimal',
        'setup_cost' => 'decimal',
        'rent_cost' => null,
        'min_rent' => 'int32',
        'setup_time' => null,
        'registration' => null,
        'inbound_sms_sender' => null,
        'datetime' => 'date-time'
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
		'features' => false,
		'number_type' => false,
		'inbound_sms_cost' => false,
		'outbound_sms_cost' => true,
		'setup_cost' => false,
		'rent_cost' => false,
		'min_rent' => false,
		'setup_time' => false,
		'registration' => false,
		'inbound_sms_sender' => false,
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
        'number_id' => 'numberId',
        'phone_number' => 'phoneNumber',
        'country_iso' => 'countryIso',
        'network_operator' => 'networkOperator',
        'features' => 'features',
        'number_type' => 'numberType',
        'inbound_sms_cost' => 'inboundSmsCost',
        'outbound_sms_cost' => 'outboundSmsCost',
        'setup_cost' => 'setupCost',
        'rent_cost' => 'rentCost',
        'min_rent' => 'minRent',
        'setup_time' => 'setupTime',
        'registration' => 'registration',
        'inbound_sms_sender' => 'inboundSmsSender',
        'datetime' => 'datetime'
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
        'features' => 'setFeatures',
        'number_type' => 'setNumberType',
        'inbound_sms_cost' => 'setInboundSmsCost',
        'outbound_sms_cost' => 'setOutboundSmsCost',
        'setup_cost' => 'setSetupCost',
        'rent_cost' => 'setRentCost',
        'min_rent' => 'setMinRent',
        'setup_time' => 'setSetupTime',
        'registration' => 'setRegistration',
        'inbound_sms_sender' => 'setInboundSmsSender',
        'datetime' => 'setDatetime'
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
        'features' => 'getFeatures',
        'number_type' => 'getNumberType',
        'inbound_sms_cost' => 'getInboundSmsCost',
        'outbound_sms_cost' => 'getOutboundSmsCost',
        'setup_cost' => 'getSetupCost',
        'rent_cost' => 'getRentCost',
        'min_rent' => 'getMinRent',
        'setup_time' => 'getSetupTime',
        'registration' => 'getRegistration',
        'inbound_sms_sender' => 'getInboundSmsSender',
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

    public const NUMBER_TYPE_MOBILE = 'mobile';
    public const NUMBER_TYPE_LANDLINE = 'landline';
    public const MIN_RENT_1 = 1;
    public const MIN_RENT_7 = 7;
    public const MIN_RENT_30 = 30;
    public const SETUP_TIME_INSTANT = 'instant';
    public const SETUP_TIME_DELAYED = 'delayed';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getNumberTypeAllowableValues()
    {
        return [
            self::NUMBER_TYPE_MOBILE,
            self::NUMBER_TYPE_LANDLINE,
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
            self::MIN_RENT_1,
            self::MIN_RENT_7,
            self::MIN_RENT_30,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getSetupTimeAllowableValues()
    {
        return [
            self::SETUP_TIME_INSTANT,
            self::SETUP_TIME_DELAYED,
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
        $this->setIfExists('features', $data ?? [], null);
        $this->setIfExists('number_type', $data ?? [], null);
        $this->setIfExists('inbound_sms_cost', $data ?? [], null);
        $this->setIfExists('outbound_sms_cost', $data ?? [], null);
        $this->setIfExists('setup_cost', $data ?? [], null);
        $this->setIfExists('rent_cost', $data ?? [], null);
        $this->setIfExists('min_rent', $data ?? [], null);
        $this->setIfExists('setup_time', $data ?? [], null);
        $this->setIfExists('registration', $data ?? [], null);
        $this->setIfExists('inbound_sms_sender', $data ?? [], null);
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
        if ($this->container['features'] === null) {
            $invalidProperties[] = "'features' can't be null";
        }
        if ($this->container['number_type'] === null) {
            $invalidProperties[] = "'number_type' can't be null";
        }
        $allowedValues = $this->getNumberTypeAllowableValues();
        if (!is_null($this->container['number_type']) && !in_array($this->container['number_type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'number_type', must be one of '%s'",
                $this->container['number_type'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['inbound_sms_cost'] === null) {
            $invalidProperties[] = "'inbound_sms_cost' can't be null";
        }
        if ($this->container['outbound_sms_cost'] === null) {
            $invalidProperties[] = "'outbound_sms_cost' can't be null";
        }
        if ($this->container['setup_cost'] === null) {
            $invalidProperties[] = "'setup_cost' can't be null";
        }
        if ($this->container['rent_cost'] === null) {
            $invalidProperties[] = "'rent_cost' can't be null";
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

        if ($this->container['setup_time'] === null) {
            $invalidProperties[] = "'setup_time' can't be null";
        }
        $allowedValues = $this->getSetupTimeAllowableValues();
        if (!is_null($this->container['setup_time']) && !in_array($this->container['setup_time'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'setup_time', must be one of '%s'",
                $this->container['setup_time'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['registration'] === null) {
            $invalidProperties[] = "'registration' can't be null";
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
     * @param string $phone_number Phone number in international E.164 format. In some cases this value might be `null` as the phone number will be selected random from a pool of numbers
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
     * Gets features
     *
     * @return int
     */
    public function getFeatures()
    {
        return $this->container['features'];
    }

    /**
     * Sets features
     *
     * @param int $features Sum of features of the phone number, in numerical value. The following are the corresponding values for each feature:  - `1` for receiving SMS (inbound SMS)  - `2` for sending SMS (outbound SMS)  - `4` for voice.      <br> <br>  A phone number with feature `1` can only receive SMS, with feature `2` can only send SMS, and with feature value `3` (1 + 2) cand send and receive SMS
     *
     * @return self
     */
    public function setFeatures($features)
    {

        if (is_null($features)) {
            throw new \InvalidArgumentException('non-nullable features cannot be null');
        }

        $this->container['features'] = $features;

        return $this;
    }

    /**
     * Gets number_type
     *
     * @return string
     */
    public function getNumberType()
    {
        return $this->container['number_type'];
    }

    /**
     * Sets number_type
     *
     * @param string $number_type Type of phone number
     *
     * @return self
     */
    public function setNumberType($number_type)
    {
        $allowedValues = $this->getNumberTypeAllowableValues();
        if (!in_array($number_type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'number_type', must be one of '%s'",
                    $number_type,
                    implode("', '", $allowedValues)
                )
            );
        }

        if (is_null($number_type)) {
            throw new \InvalidArgumentException('non-nullable number_type cannot be null');
        }

        $this->container['number_type'] = $number_type;

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
     * @param float $inbound_sms_cost Cost for receiving a SMS on this phone number (most of the time receiving is free, meaning this has value 0)
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
     * Gets outbound_sms_cost
     *
     * @return float
     */
    public function getOutboundSmsCost()
    {
        return $this->container['outbound_sms_cost'];
    }

    /**
     * Sets outbound_sms_cost
     *
     * @param float $outbound_sms_cost Cost for sending a SMS from this phone number. If the number doesn't have outbound SMS as a feature, this parameter will be `null`
     *
     * @return self
     */
    public function setOutboundSmsCost($outbound_sms_cost)
    {

        if (is_null($outbound_sms_cost)) {
            array_push($this->clientNullablesSetToNull, 'outbound_sms_cost');
        } else {
            $nullablesSetToNull = $this->getClientNullablesSetToNull();
            $index = array_search('outbound_sms_cost', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setClientNullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['outbound_sms_cost'] = $outbound_sms_cost;

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
     * Gets rent_cost
     *
     * @return \Smscx\Client\Model\RentCost[]
     */
    public function getRentCost()
    {
        return $this->container['rent_cost'];
    }

    /**
     * Sets rent_cost
     *
     * @param \Smscx\Client\Model\RentCost[] $rent_cost Array of objects with cost for every period (in days). If the phone number has a minimum rent period of 30 days, this array will contain only one object with cost for 30 days. If minimum rent is 1 day, then this array will contain 3 objects with cost for 1, 7, 30 days
     *
     * @return self
     */
    public function setRentCost($rent_cost)
    {

        if (is_null($rent_cost)) {
            throw new \InvalidArgumentException('non-nullable rent_cost cannot be null');
        }

        $this->container['rent_cost'] = $rent_cost;

        return $this;
    }

    /**
     * Gets min_rent
     *
     * @return int
     */
    public function getMinRent()
    {
        return $this->container['min_rent'];
    }

    /**
     * Sets min_rent
     *
     * @param int $min_rent Minimum period that this phone number must be rented (in days)
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
            throw new \InvalidArgumentException('non-nullable min_rent cannot be null');
        }

        $this->container['min_rent'] = $min_rent;

        return $this;
    }

    /**
     * Gets setup_time
     *
     * @return string
     */
    public function getSetupTime()
    {
        return $this->container['setup_time'];
    }

    /**
     * Sets setup_time
     *
     * @param string $setup_time The time to setup the number. instant - the number is available immediately, delayed - the number will be available after a period of time (between 10 minutes and few days)
     *
     * @return self
     */
    public function setSetupTime($setup_time)
    {
        $allowedValues = $this->getSetupTimeAllowableValues();
        if (!in_array($setup_time, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'setup_time', must be one of '%s'",
                    $setup_time,
                    implode("', '", $allowedValues)
                )
            );
        }

        if (is_null($setup_time)) {
            throw new \InvalidArgumentException('non-nullable setup_time cannot be null');
        }

        $this->container['setup_time'] = $setup_time;

        return $this;
    }

    /**
     * Gets registration
     *
     * @return bool
     */
    public function getRegistration()
    {
        return $this->container['registration'];
    }

    /**
     * Sets registration
     *
     * @param bool $registration Indicates if the phone number requires registration
     *
     * @return self
     */
    public function setRegistration($registration)
    {

        if (is_null($registration)) {
            throw new \InvalidArgumentException('non-nullable registration cannot be null');
        }

        $this->container['registration'] = $registration;

        return $this;
    }

    /**
     * Gets inbound_sms_sender
     *
     * @return bool|null
     */
    public function getInboundSmsSender()
    {
        return $this->container['inbound_sms_sender'];
    }

    /**
     * Sets inbound_sms_sender
     *
     * @param bool|null $inbound_sms_sender Indicates if the phone number can receive SMS from alphanumeric sender ID
     *
     * @return self
     */
    public function setInboundSmsSender($inbound_sms_sender)
    {

        if (is_null($inbound_sms_sender)) {
            throw new \InvalidArgumentException('non-nullable inbound_sms_sender cannot be null');
        }

        $this->container['inbound_sms_sender'] = $inbound_sms_sender;

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
     * @param \DateTime $datetime datetime
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


