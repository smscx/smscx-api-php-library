<?php
/**
 * InfoRentNumber
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
 * InfoRentNumber Class Doc Comment
 *
 * @category Class
 * @package  Smscx
 * @author   SMS Connexion
 * @link     https://sms.cx
 * @implements \ArrayAccess<string, mixed>
 */
class InfoRentNumber implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $clientModelName = 'InfoRentNumber';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $clientTypes = [
        'rent_id' => 'string',
        'rent_cost' => 'float',
        'setup_cost' => 'float',
        'rent_period' => 'int',
        'rent_start' => '\DateTime',
        'rent_end' => '\DateTime',
        'phone_number' => 'string',
        'country_iso' => 'string',
        'network_operator' => 'string',
        'auto_renew' => 'bool',
        'sms' => 'string[]',
        'voice' => 'string[]',
        'min_rent' => 'string',
        'max_rent' => 'string',
        'rental_cost' => '\Smscx\Client\Model\RentalCost',
        'inbound_sms_cost' => 'float',
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
        'rent_id' => 'uuid',
        'rent_cost' => null,
        'setup_cost' => null,
        'rent_period' => 'int32',
        'rent_start' => 'date-time',
        'rent_end' => 'date-time',
        'phone_number' => null,
        'country_iso' => null,
        'network_operator' => null,
        'auto_renew' => null,
        'sms' => null,
        'voice' => null,
        'min_rent' => null,
        'max_rent' => null,
        'rental_cost' => null,
        'inbound_sms_cost' => 'decimal',
        'callback_url' => 'url'
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $clientNullables = [
        'rent_id' => false,
		'rent_cost' => false,
		'setup_cost' => false,
		'rent_period' => false,
		'rent_start' => false,
		'rent_end' => false,
		'phone_number' => false,
		'country_iso' => false,
		'network_operator' => false,
		'auto_renew' => false,
		'sms' => false,
		'voice' => false,
		'min_rent' => true,
		'max_rent' => true,
		'rental_cost' => false,
		'inbound_sms_cost' => false,
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
        'rent_id' => 'rentId',
        'rent_cost' => 'rentCost',
        'setup_cost' => 'setupCost',
        'rent_period' => 'rentPeriod',
        'rent_start' => 'rentStart',
        'rent_end' => 'rentEnd',
        'phone_number' => 'phoneNumber',
        'country_iso' => 'countryIso',
        'network_operator' => 'networkOperator',
        'auto_renew' => 'autoRenew',
        'sms' => 'sms',
        'voice' => 'voice',
        'min_rent' => 'minRent',
        'max_rent' => 'maxRent',
        'rental_cost' => 'rentalCost',
        'inbound_sms_cost' => 'inboundSmsCost',
        'callback_url' => 'callbackUrl'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'rent_id' => 'setRentId',
        'rent_cost' => 'setRentCost',
        'setup_cost' => 'setSetupCost',
        'rent_period' => 'setRentPeriod',
        'rent_start' => 'setRentStart',
        'rent_end' => 'setRentEnd',
        'phone_number' => 'setPhoneNumber',
        'country_iso' => 'setCountryIso',
        'network_operator' => 'setNetworkOperator',
        'auto_renew' => 'setAutoRenew',
        'sms' => 'setSms',
        'voice' => 'setVoice',
        'min_rent' => 'setMinRent',
        'max_rent' => 'setMaxRent',
        'rental_cost' => 'setRentalCost',
        'inbound_sms_cost' => 'setInboundSmsCost',
        'callback_url' => 'setCallbackUrl'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'rent_id' => 'getRentId',
        'rent_cost' => 'getRentCost',
        'setup_cost' => 'getSetupCost',
        'rent_period' => 'getRentPeriod',
        'rent_start' => 'getRentStart',
        'rent_end' => 'getRentEnd',
        'phone_number' => 'getPhoneNumber',
        'country_iso' => 'getCountryIso',
        'network_operator' => 'getNetworkOperator',
        'auto_renew' => 'getAutoRenew',
        'sms' => 'getSms',
        'voice' => 'getVoice',
        'min_rent' => 'getMinRent',
        'max_rent' => 'getMaxRent',
        'rental_cost' => 'getRentalCost',
        'inbound_sms_cost' => 'getInboundSmsCost',
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
        $this->setIfExists('rent_id', $data ?? [], null);
        $this->setIfExists('rent_cost', $data ?? [], null);
        $this->setIfExists('setup_cost', $data ?? [], null);
        $this->setIfExists('rent_period', $data ?? [], null);
        $this->setIfExists('rent_start', $data ?? [], null);
        $this->setIfExists('rent_end', $data ?? [], null);
        $this->setIfExists('phone_number', $data ?? [], null);
        $this->setIfExists('country_iso', $data ?? [], null);
        $this->setIfExists('network_operator', $data ?? [], null);
        $this->setIfExists('auto_renew', $data ?? [], null);
        $this->setIfExists('sms', $data ?? [], null);
        $this->setIfExists('voice', $data ?? [], null);
        $this->setIfExists('min_rent', $data ?? [], null);
        $this->setIfExists('max_rent', $data ?? [], null);
        $this->setIfExists('rental_cost', $data ?? [], null);
        $this->setIfExists('inbound_sms_cost', $data ?? [], null);
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
        if ($this->container['auto_renew'] === null) {
            $invalidProperties[] = "'auto_renew' can't be null";
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

        if ($this->container['rental_cost'] === null) {
            $invalidProperties[] = "'rental_cost' can't be null";
        }
        if ($this->container['inbound_sms_cost'] === null) {
            $invalidProperties[] = "'inbound_sms_cost' can't be null";
        }
        if ($this->container['callback_url'] === null) {
            $invalidProperties[] = "'callback_url' can't be null";
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
            throw new \InvalidArgumentException('invalid length for $rent_id when calling InfoRentNumber., must be smaller than or equal to 36.');
        }
        if ((mb_strlen($rent_id) < 36)) {
            throw new \InvalidArgumentException('invalid length for $rent_id when calling InfoRentNumber., must be bigger than or equal to 36.');
        }
        if ((!preg_match("/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/", $rent_id))) {
            throw new \InvalidArgumentException("invalid value for \$rent_id when calling InfoRentNumber., must conform to the pattern /^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/.");
        }


        if (is_null($rent_id)) {
            throw new \InvalidArgumentException('non-nullable rent_id cannot be null');
        }

        $this->container['rent_id'] = $rent_id;

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
     * @param float $rent_cost Cost of renting the phone number for the period chosen
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
     * @param \DateTime $rent_start Start date and time of the rental period (UTC)
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
     * @param \DateTime $rent_end End date and time of the rental period (UTC)
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
            throw new \InvalidArgumentException('invalid length for $country_iso when calling InfoRentNumber., must be smaller than or equal to 2.');
        }
        if ((mb_strlen($country_iso) < 2)) {
            throw new \InvalidArgumentException('invalid length for $country_iso when calling InfoRentNumber., must be bigger than or equal to 2.');
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
     * @param bool $auto_renew Status of the auto renewal setting for this number rental
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


