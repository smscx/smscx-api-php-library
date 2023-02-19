<?php
/**
 * DataRentedNumbers
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
 * DataRentedNumbers Class Doc Comment
 *
 * @category Class
 * @package  Smscx
 * @author   SMS Connexion
 * @link     https://sms.cx
 * @implements \ArrayAccess<string, mixed>
 */
class DataRentedNumbers implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $clientModelName = 'DataRentedNumbers';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $clientTypes = [
        'rent_id' => 'string',
        'number_id' => 'string',
        'phone_number' => 'string',
        'country_iso' => 'string',
        'network_operator' => 'string',
        'features' => 'int',
        'number_type' => 'string',
        'rent_cost' => 'float',
        'setup_cost' => 'float',
        'rent_period' => 'int',
        'rent_start' => '\DateTime',
        'rent_end' => '\DateTime',
        'inbound_sms_cost' => 'float',
        'outbound_sms_cost' => 'float',
        'renew_cost' => '\Smscx\Client\Model\RenewCost[]',
        'inbound_sms' => '\Smscx\Client\Model\InboundSms',
        'outbound_sms' => '\Smscx\Client\Model\OutboundSms',
        'min_rent' => 'int',
        'callback_url' => 'string',
        'auto_renew' => 'bool',
        'inbound_sms_sender' => 'bool',
        'active_rent' => 'bool',
        'approved' => 'bool',
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
        'rent_id' => 'uuid',
        'number_id' => 'uuid',
        'phone_number' => null,
        'country_iso' => null,
        'network_operator' => null,
        'features' => 'int32',
        'number_type' => null,
        'rent_cost' => 'decimal',
        'setup_cost' => 'decimal',
        'rent_period' => 'int32',
        'rent_start' => 'date-time',
        'rent_end' => 'date-time',
        'inbound_sms_cost' => 'decimal',
        'outbound_sms_cost' => 'decimal',
        'renew_cost' => null,
        'inbound_sms' => null,
        'outbound_sms' => null,
        'min_rent' => 'int32',
        'callback_url' => 'url',
        'auto_renew' => null,
        'inbound_sms_sender' => null,
        'active_rent' => null,
        'approved' => null,
        'datetime' => 'date-time'
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $clientNullables = [
        'rent_id' => false,
		'number_id' => false,
		'phone_number' => false,
		'country_iso' => false,
		'network_operator' => false,
		'features' => false,
		'number_type' => false,
		'rent_cost' => false,
		'setup_cost' => false,
		'rent_period' => false,
		'rent_start' => false,
		'rent_end' => false,
		'inbound_sms_cost' => false,
		'outbound_sms_cost' => true,
		'renew_cost' => false,
		'inbound_sms' => false,
		'outbound_sms' => false,
		'min_rent' => false,
		'callback_url' => true,
		'auto_renew' => false,
		'inbound_sms_sender' => false,
		'active_rent' => false,
		'approved' => false,
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
        'rent_id' => 'rentId',
        'number_id' => 'numberId',
        'phone_number' => 'phoneNumber',
        'country_iso' => 'countryIso',
        'network_operator' => 'networkOperator',
        'features' => 'features',
        'number_type' => 'numberType',
        'rent_cost' => 'rentCost',
        'setup_cost' => 'setupCost',
        'rent_period' => 'rentPeriod',
        'rent_start' => 'rentStart',
        'rent_end' => 'rentEnd',
        'inbound_sms_cost' => 'inboundSmsCost',
        'outbound_sms_cost' => 'outboundSmsCost',
        'renew_cost' => 'renewCost',
        'inbound_sms' => 'inboundSms',
        'outbound_sms' => 'outboundSms',
        'min_rent' => 'minRent',
        'callback_url' => 'callbackUrl',
        'auto_renew' => 'autoRenew',
        'inbound_sms_sender' => 'inboundSmsSender',
        'active_rent' => 'activeRent',
        'approved' => 'approved',
        'datetime' => 'datetime'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'rent_id' => 'setRentId',
        'number_id' => 'setNumberId',
        'phone_number' => 'setPhoneNumber',
        'country_iso' => 'setCountryIso',
        'network_operator' => 'setNetworkOperator',
        'features' => 'setFeatures',
        'number_type' => 'setNumberType',
        'rent_cost' => 'setRentCost',
        'setup_cost' => 'setSetupCost',
        'rent_period' => 'setRentPeriod',
        'rent_start' => 'setRentStart',
        'rent_end' => 'setRentEnd',
        'inbound_sms_cost' => 'setInboundSmsCost',
        'outbound_sms_cost' => 'setOutboundSmsCost',
        'renew_cost' => 'setRenewCost',
        'inbound_sms' => 'setInboundSms',
        'outbound_sms' => 'setOutboundSms',
        'min_rent' => 'setMinRent',
        'callback_url' => 'setCallbackUrl',
        'auto_renew' => 'setAutoRenew',
        'inbound_sms_sender' => 'setInboundSmsSender',
        'active_rent' => 'setActiveRent',
        'approved' => 'setApproved',
        'datetime' => 'setDatetime'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'rent_id' => 'getRentId',
        'number_id' => 'getNumberId',
        'phone_number' => 'getPhoneNumber',
        'country_iso' => 'getCountryIso',
        'network_operator' => 'getNetworkOperator',
        'features' => 'getFeatures',
        'number_type' => 'getNumberType',
        'rent_cost' => 'getRentCost',
        'setup_cost' => 'getSetupCost',
        'rent_period' => 'getRentPeriod',
        'rent_start' => 'getRentStart',
        'rent_end' => 'getRentEnd',
        'inbound_sms_cost' => 'getInboundSmsCost',
        'outbound_sms_cost' => 'getOutboundSmsCost',
        'renew_cost' => 'getRenewCost',
        'inbound_sms' => 'getInboundSms',
        'outbound_sms' => 'getOutboundSms',
        'min_rent' => 'getMinRent',
        'callback_url' => 'getCallbackUrl',
        'auto_renew' => 'getAutoRenew',
        'inbound_sms_sender' => 'getInboundSmsSender',
        'active_rent' => 'getActiveRent',
        'approved' => 'getApproved',
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
    public const RENT_PERIOD_1 = 1;
    public const RENT_PERIOD_7 = 7;
    public const RENT_PERIOD_30 = 30;
    public const MIN_RENT_1 = 1;
    public const MIN_RENT_7 = 7;
    public const MIN_RENT_30 = 30;

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
    public function getRentPeriodAllowableValues()
    {
        return [
            self::RENT_PERIOD_1,
            self::RENT_PERIOD_7,
            self::RENT_PERIOD_30,
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
        $this->setIfExists('rent_id', $data ?? [], null);
        $this->setIfExists('number_id', $data ?? [], null);
        $this->setIfExists('phone_number', $data ?? [], null);
        $this->setIfExists('country_iso', $data ?? [], null);
        $this->setIfExists('network_operator', $data ?? [], null);
        $this->setIfExists('features', $data ?? [], null);
        $this->setIfExists('number_type', $data ?? [], null);
        $this->setIfExists('rent_cost', $data ?? [], null);
        $this->setIfExists('setup_cost', $data ?? [], null);
        $this->setIfExists('rent_period', $data ?? [], null);
        $this->setIfExists('rent_start', $data ?? [], null);
        $this->setIfExists('rent_end', $data ?? [], null);
        $this->setIfExists('inbound_sms_cost', $data ?? [], null);
        $this->setIfExists('outbound_sms_cost', $data ?? [], null);
        $this->setIfExists('renew_cost', $data ?? [], null);
        $this->setIfExists('inbound_sms', $data ?? [], null);
        $this->setIfExists('outbound_sms', $data ?? [], null);
        $this->setIfExists('min_rent', $data ?? [], null);
        $this->setIfExists('callback_url', $data ?? [], null);
        $this->setIfExists('auto_renew', $data ?? [], null);
        $this->setIfExists('inbound_sms_sender', $data ?? [], null);
        $this->setIfExists('active_rent', $data ?? [], null);
        $this->setIfExists('approved', $data ?? [], null);
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

        if ($this->container['rent_id'] === null) {
            $invalidProperties[] = "'rent_id' can't be null";
        }
        if ((mb_strlen($this->container['rent_id']) > 36)) {
            $invalidProperties[] = "invalid value for 'rent_id', the character length must be smaller than or equal to 36.";
        }

        if ((mb_strlen($this->container['rent_id']) < 36)) {
            $invalidProperties[] = "invalid value for 'rent_id', the character length must be bigger than or equal to 36.";
        }

        if (!preg_match("/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/", $this->container['rent_id'])) {
            $invalidProperties[] = "invalid value for 'rent_id', must be conform to the pattern /^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/.";
        }

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

        if ($this->container['rent_cost'] === null) {
            $invalidProperties[] = "'rent_cost' can't be null";
        }
        if ($this->container['setup_cost'] === null) {
            $invalidProperties[] = "'setup_cost' can't be null";
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

        if ($this->container['rent_start'] === null) {
            $invalidProperties[] = "'rent_start' can't be null";
        }
        if ($this->container['rent_end'] === null) {
            $invalidProperties[] = "'rent_end' can't be null";
        }
        if ($this->container['inbound_sms_cost'] === null) {
            $invalidProperties[] = "'inbound_sms_cost' can't be null";
        }
        if ($this->container['outbound_sms_cost'] === null) {
            $invalidProperties[] = "'outbound_sms_cost' can't be null";
        }
        if ($this->container['renew_cost'] === null) {
            $invalidProperties[] = "'renew_cost' can't be null";
        }
        if ($this->container['inbound_sms'] === null) {
            $invalidProperties[] = "'inbound_sms' can't be null";
        }
        if ($this->container['outbound_sms'] === null) {
            $invalidProperties[] = "'outbound_sms' can't be null";
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

        if ($this->container['callback_url'] === null) {
            $invalidProperties[] = "'callback_url' can't be null";
        }
        if ($this->container['auto_renew'] === null) {
            $invalidProperties[] = "'auto_renew' can't be null";
        }
        if ($this->container['active_rent'] === null) {
            $invalidProperties[] = "'active_rent' can't be null";
        }
        if ($this->container['approved'] === null) {
            $invalidProperties[] = "'approved' can't be null";
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
     * Gets rent_id
     *
     * @return string
     */
    public function getRentId()
    {
        return $this->container['rent_id'];
    }

    /**
     * Sets rent_id
     *
     * @param string $rent_id Unique identifier of the rent operation
     *
     * @return self
     */
    public function setRentId($rent_id)
    {
        if ((mb_strlen($rent_id) > 36)) {
            throw new \InvalidArgumentException('invalid length for $rent_id when calling DataRentedNumbers., must be smaller than or equal to 36.');
        }
        if ((mb_strlen($rent_id) < 36)) {
            throw new \InvalidArgumentException('invalid length for $rent_id when calling DataRentedNumbers., must be bigger than or equal to 36.');
        }
        if ((!preg_match("/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/", $rent_id))) {
            throw new \InvalidArgumentException("invalid value for \$rent_id when calling DataRentedNumbers., must conform to the pattern /^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/.");
        }


        if (is_null($rent_id)) {
            throw new \InvalidArgumentException('non-nullable rent_id cannot be null');
        }

        $this->container['rent_id'] = $rent_id;

        return $this;
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
     * @param string $number_id Unique identifier of the phone number
     *
     * @return self
     */
    public function setNumberId($number_id)
    {
        if ((mb_strlen($number_id) > 36)) {
            throw new \InvalidArgumentException('invalid length for $number_id when calling DataRentedNumbers., must be smaller than or equal to 36.');
        }
        if ((mb_strlen($number_id) < 36)) {
            throw new \InvalidArgumentException('invalid length for $number_id when calling DataRentedNumbers., must be bigger than or equal to 36.');
        }
        if ((!preg_match("/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/", $number_id))) {
            throw new \InvalidArgumentException("invalid value for \$number_id when calling DataRentedNumbers., must conform to the pattern /^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/.");
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
     * @param string $phone_number Phone number that is rented in international E.164 format
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
     * @param string $country_iso Two-letter country code in ISO-3166 alpha 2 standard. Eg. `DE`, `FR`, `IT`
     *
     * @return self
     */
    public function setCountryIso($country_iso)
    {
        if ((mb_strlen($country_iso) > 2)) {
            throw new \InvalidArgumentException('invalid length for $country_iso when calling DataRentedNumbers., must be smaller than or equal to 2.');
        }
        if ((mb_strlen($country_iso) < 2)) {
            throw new \InvalidArgumentException('invalid length for $country_iso when calling DataRentedNumbers., must be bigger than or equal to 2.');
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
     * @param string $number_type Type of phone number.
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
     * Gets rent_cost
     *
     * @return float
     */
    public function getRentCost()
    {
        return $this->container['rent_cost'];
    }

    /**
     * Sets rent_cost
     *
     * @param float $rent_cost Cost of renting the phone number for the current period
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
     * @param float $setup_cost The one time setup fee that was charged at the initial rent of the phone number (if applicable)
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
     * @param int $rent_period Current period of the phone number rent (in days)
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
     * Gets rent_start
     *
     * @return \DateTime
     */
    public function getRentStart()
    {
        return $this->container['rent_start'];
    }

    /**
     * Sets rent_start
     *
     * @param \DateTime $rent_start Start date and time of the rent period (UTC)
     *
     * @return self
     */
    public function setRentStart($rent_start)
    {

        if (is_null($rent_start)) {
            throw new \InvalidArgumentException('non-nullable rent_start cannot be null');
        }

        $this->container['rent_start'] = $rent_start;

        return $this;
    }

    /**
     * Gets rent_end
     *
     * @return \DateTime
     */
    public function getRentEnd()
    {
        return $this->container['rent_end'];
    }

    /**
     * Sets rent_end
     *
     * @param \DateTime $rent_end End date and time of the rent period (UTC)
     *
     * @return self
     */
    public function setRentEnd($rent_end)
    {

        if (is_null($rent_end)) {
            throw new \InvalidArgumentException('non-nullable rent_end cannot be null');
        }

        $this->container['rent_end'] = $rent_end;

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
     * Gets renew_cost
     *
     * @return \Smscx\Client\Model\RenewCost[]
     */
    public function getRenewCost()
    {
        return $this->container['renew_cost'];
    }

    /**
     * Sets renew_cost
     *
     * @param \Smscx\Client\Model\RenewCost[] $renew_cost Array of objects with cost for rent renewal. If the number has minimum rent period of 30 days, this array will contain only one object with 30 days
     *
     * @return self
     */
    public function setRenewCost($renew_cost)
    {

        if (is_null($renew_cost)) {
            throw new \InvalidArgumentException('non-nullable renew_cost cannot be null');
        }

        $this->container['renew_cost'] = $renew_cost;

        return $this;
    }

    /**
     * Gets inbound_sms
     *
     * @return \Smscx\Client\Model\InboundSms
     */
    public function getInboundSms()
    {
        return $this->container['inbound_sms'];
    }

    /**
     * Sets inbound_sms
     *
     * @param \Smscx\Client\Model\InboundSms $inbound_sms inbound_sms
     *
     * @return self
     */
    public function setInboundSms($inbound_sms)
    {

        if (is_null($inbound_sms)) {
            throw new \InvalidArgumentException('non-nullable inbound_sms cannot be null');
        }

        $this->container['inbound_sms'] = $inbound_sms;

        return $this;
    }

    /**
     * Gets outbound_sms
     *
     * @return \Smscx\Client\Model\OutboundSms
     */
    public function getOutboundSms()
    {
        return $this->container['outbound_sms'];
    }

    /**
     * Sets outbound_sms
     *
     * @param \Smscx\Client\Model\OutboundSms $outbound_sms outbound_sms
     *
     * @return self
     */
    public function setOutboundSms($outbound_sms)
    {

        if (is_null($outbound_sms)) {
            throw new \InvalidArgumentException('non-nullable outbound_sms cannot be null');
        }

        $this->container['outbound_sms'] = $outbound_sms;

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
     * @param int $min_rent Minimum period that this phone number can be rented/renewed (in days)
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
     * Gets callback_url
     *
     * @return string
     */
    public function getCallbackUrl()
    {
        return $this->container['callback_url'];
    }

    /**
     * Sets callback_url
     *
     * @param string $callback_url Callback URL (or webhook) to get the received SMS on the rented phone number
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
     * Gets auto_renew
     *
     * @return bool
     */
    public function getAutoRenew()
    {
        return $this->container['auto_renew'];
    }

    /**
     * Sets auto_renew
     *
     * @param bool $auto_renew Automatically renews the rent for the number with the same period as the current subscription
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
     * Gets active_rent
     *
     * @return bool
     */
    public function getActiveRent()
    {
        return $this->container['active_rent'];
    }

    /**
     * Sets active_rent
     *
     * @param bool $active_rent Indicates if the rent is active (not canceled or subscription not expired)
     *
     * @return self
     */
    public function setActiveRent($active_rent)
    {

        if (is_null($active_rent)) {
            throw new \InvalidArgumentException('non-nullable active_rent cannot be null');
        }

        $this->container['active_rent'] = $active_rent;

        return $this;
    }

    /**
     * Gets approved
     *
     * @return bool
     */
    public function getApproved()
    {
        return $this->container['approved'];
    }

    /**
     * Sets approved
     *
     * @param bool $approved If the phone number requires registration, this parameter indicates if the phone number was approved. Value `true` means number approved, `false` means processing
     *
     * @return self
     */
    public function setApproved($approved)
    {

        if (is_null($approved)) {
            throw new \InvalidArgumentException('non-nullable approved cannot be null');
        }

        $this->container['approved'] = $approved;

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


