<?php
/**
 * NewOtpResponse
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
 * NewOtpResponse Class Doc Comment
 *
 * @category Class
 * @package  Smscx
 * @author   SMS Connexion
 * @link     https://sms.cx
 * @implements \ArrayAccess<string, mixed>
 */
class NewOtpResponse implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $clientModelName = 'NewOtpResponse';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $clientTypes = [
        'otp_id' => 'string',
        'track_id' => 'string',
        'phone_number' => 'string',
        'country_iso' => 'string',
        'status' => 'string',
        'cost' => 'float',
        'parts' => 'int',
        'max_attempts' => 'int',
        'attempts' => 'int',
        'ttl' => 'int',
        'otp_callback_url' => 'string',
        'date_created' => '\DateTime',
        'date_expires' => '\DateTime'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $clientFormats = [
        'otp_id' => null,
        'track_id' => null,
        'phone_number' => null,
        'country_iso' => null,
        'status' => null,
        'cost' => 'decimal',
        'parts' => 'int32',
        'max_attempts' => 'int32',
        'attempts' => 'int32',
        'ttl' => 'int32',
        'otp_callback_url' => 'url',
        'date_created' => 'date-time',
        'date_expires' => 'date-time'
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $clientNullables = [
        'otp_id' => false,
		'track_id' => true,
		'phone_number' => false,
		'country_iso' => false,
		'status' => false,
		'cost' => false,
		'parts' => false,
		'max_attempts' => false,
		'attempts' => false,
		'ttl' => false,
		'otp_callback_url' => true,
		'date_created' => false,
		'date_expires' => false
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
        'otp_id' => 'otpId',
        'track_id' => 'trackId',
        'phone_number' => 'phoneNumber',
        'country_iso' => 'countryIso',
        'status' => 'status',
        'cost' => 'cost',
        'parts' => 'parts',
        'max_attempts' => 'maxAttempts',
        'attempts' => 'attempts',
        'ttl' => 'ttl',
        'otp_callback_url' => 'otpCallbackUrl',
        'date_created' => 'dateCreated',
        'date_expires' => 'dateExpires'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'otp_id' => 'setOtpId',
        'track_id' => 'setTrackId',
        'phone_number' => 'setPhoneNumber',
        'country_iso' => 'setCountryIso',
        'status' => 'setStatus',
        'cost' => 'setCost',
        'parts' => 'setParts',
        'max_attempts' => 'setMaxAttempts',
        'attempts' => 'setAttempts',
        'ttl' => 'setTtl',
        'otp_callback_url' => 'setOtpCallbackUrl',
        'date_created' => 'setDateCreated',
        'date_expires' => 'setDateExpires'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'otp_id' => 'getOtpId',
        'track_id' => 'getTrackId',
        'phone_number' => 'getPhoneNumber',
        'country_iso' => 'getCountryIso',
        'status' => 'getStatus',
        'cost' => 'getCost',
        'parts' => 'getParts',
        'max_attempts' => 'getMaxAttempts',
        'attempts' => 'getAttempts',
        'ttl' => 'getTtl',
        'otp_callback_url' => 'getOtpCallbackUrl',
        'date_created' => 'getDateCreated',
        'date_expires' => 'getDateExpires'
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

    public const STATUS_PENDING = 'PENDING';
    public const STATUS_VERIFIED = 'VERIFIED';
    public const STATUS_EXPIRED = 'EXPIRED';
    public const STATUS_CANCELLED = 'CANCELLED';
    public const STATUS_FAILED = 'FAILED';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getStatusAllowableValues()
    {
        return [
            self::STATUS_PENDING,
            self::STATUS_VERIFIED,
            self::STATUS_EXPIRED,
            self::STATUS_CANCELLED,
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
        $this->setIfExists('otp_id', $data ?? [], null);
        $this->setIfExists('track_id', $data ?? [], null);
        $this->setIfExists('phone_number', $data ?? [], null);
        $this->setIfExists('country_iso', $data ?? [], null);
        $this->setIfExists('status', $data ?? [], null);
        $this->setIfExists('cost', $data ?? [], null);
        $this->setIfExists('parts', $data ?? [], null);
        $this->setIfExists('max_attempts', $data ?? [], null);
        $this->setIfExists('attempts', $data ?? [], null);
        $this->setIfExists('ttl', $data ?? [], null);
        $this->setIfExists('otp_callback_url', $data ?? [], null);
        $this->setIfExists('date_created', $data ?? [], null);
        $this->setIfExists('date_expires', $data ?? [], null);
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

        if ($this->container['otp_id'] === null) {
            $invalidProperties[] = "'otp_id' can't be null";
        }
        if ((mb_strlen($this->container['otp_id']) > 36)) {
            $invalidProperties[] = "invalid value for 'otp_id', the character length must be smaller than or equal to 36.";
        }

        if ((mb_strlen($this->container['otp_id']) < 36)) {
            $invalidProperties[] = "invalid value for 'otp_id', the character length must be bigger than or equal to 36.";
        }

        if (!preg_match("/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/", $this->container['otp_id'])) {
            $invalidProperties[] = "invalid value for 'otp_id', must be conform to the pattern /^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/.";
        }

        if ( $this->container['track_id'] !== null && (mb_strlen($this->container['track_id']) > 36) ) {
            $invalidProperties[] = "invalid value for 'track_id', the character length must be smaller than or equal to 36.";
        }

        if ( $this->container['track_id'] !== null && (mb_strlen($this->container['track_id']) < 36) ) {
            $invalidProperties[] = "invalid value for 'track_id', the character length must be bigger than or equal to 36.";
        }

        if (!preg_match("/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/", $this->container['track_id'])) {
            $invalidProperties[] = "invalid value for 'track_id', must be conform to the pattern /^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/.";
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

        if ($this->container['cost'] === null) {
            $invalidProperties[] = "'cost' can't be null";
        }
        if ($this->container['parts'] === null) {
            $invalidProperties[] = "'parts' can't be null";
        }
        if (($this->container['parts'] < 1)) {
            $invalidProperties[] = "invalid value for 'parts', must be bigger than or equal to 1.";
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

        if ($this->container['attempts'] === null) {
            $invalidProperties[] = "'attempts' can't be null";
        }
        if (($this->container['attempts'] > 10)) {
            $invalidProperties[] = "invalid value for 'attempts', must be smaller than or equal to 10.";
        }

        if (($this->container['attempts'] < 0)) {
            $invalidProperties[] = "invalid value for 'attempts', must be bigger than or equal to 0.";
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

        if ($this->container['otp_callback_url'] === null) {
            $invalidProperties[] = "'otp_callback_url' can't be null";
        }
        if ($this->container['date_created'] === null) {
            $invalidProperties[] = "'date_created' can't be null";
        }
        if ($this->container['date_expires'] === null) {
            $invalidProperties[] = "'date_expires' can't be null";
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
     * Gets otp_id
     *
     * @return string
     */
    public function getOtpId()
    {
        return $this->container['otp_id'];
    }

    /**
     * Sets otp_id
     *
     * @param string $otp_id Unique identifier of the OTP request
     *
     * @return self
     */
    public function setOtpId($otp_id)
    {
        if ((mb_strlen($otp_id) > 36)) {
            throw new \InvalidArgumentException('invalid length for $otp_id when calling NewOtpResponse., must be smaller than or equal to 36.');
        }
        if ((mb_strlen($otp_id) < 36)) {
            throw new \InvalidArgumentException('invalid length for $otp_id when calling NewOtpResponse., must be bigger than or equal to 36.');
        }
        if ((!preg_match("/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/", $otp_id))) {
            throw new \InvalidArgumentException("invalid value for \$otp_id when calling NewOtpResponse., must conform to the pattern /^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/.");
        }


        if (is_null($otp_id)) {
            throw new \InvalidArgumentException('non-nullable otp_id cannot be null');
        }

        $this->container['otp_id'] = $otp_id;

        return $this;
    }

    /**
     * Gets track_id
     *
     * @return string
     */
    public function getTrackId()
    {
        return $this->container['track_id'];
    }

    /**
     * Sets track_id
     *
     * @param string $track_id Client provided UUID (v1-v5) for tracking purposes
     *
     * @return self
     */
    public function setTrackId($track_id)
    {

        if (!is_null($track_id)) {

            if ((mb_strlen($track_id) > 36)) {
                throw new \InvalidArgumentException('invalid length for $track_id when calling NewOtpResponse., must be smaller than or equal to 36.');
            }
            if ((mb_strlen($track_id) < 36)) {
                throw new \InvalidArgumentException('invalid length for $track_id when calling NewOtpResponse., must be bigger than or equal to 36.');
            }
            if ((!preg_match("/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/", $track_id))) {
                throw new \InvalidArgumentException("invalid value for \$track_id when calling NewOtpResponse., must conform to the pattern /^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/.");
            }

        }

        if (is_null($track_id)) {
            array_push($this->clientNullablesSetToNull, 'track_id');
        } else {
            $nullablesSetToNull = $this->getClientNullablesSetToNull();
            $index = array_search('track_id', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setClientNullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['track_id'] = $track_id;

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
     * @param string $phone_number The phone number where the pin was sent
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
     * @param string $country_iso The country ISO of the phone numver. Eg. `DE`, `FR`, `IT`
     *
     * @return self
     */
    public function setCountryIso($country_iso)
    {
        if ((mb_strlen($country_iso) > 2)) {
            throw new \InvalidArgumentException('invalid length for $country_iso when calling NewOtpResponse., must be smaller than or equal to 2.');
        }
        if ((mb_strlen($country_iso) < 2)) {
            throw new \InvalidArgumentException('invalid length for $country_iso when calling NewOtpResponse., must be bigger than or equal to 2.');
        }


        if (is_null($country_iso)) {
            throw new \InvalidArgumentException('non-nullable country_iso cannot be null');
        }

        $this->container['country_iso'] = $country_iso;

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
     * @param string $status Status of the OTP request. The initial status is `PENDING`
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
     * @param float $cost The cost of the OTP request
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
     * Gets parts
     *
     * @return int
     */
    public function getParts()
    {
        return $this->container['parts'];
    }

    /**
     * Sets parts
     *
     * @param int $parts Message parts
     *
     * @return self
     */
    public function setParts($parts)
    {

        if (($parts < 1)) {
            throw new \InvalidArgumentException('invalid value for $parts when calling NewOtpResponse., must be bigger than or equal to 1.');
        }


        if (is_null($parts)) {
            throw new \InvalidArgumentException('non-nullable parts cannot be null');
        }

        $this->container['parts'] = $parts;

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
     * @param int $max_attempts Number of attempts to allow the OTP to be verified before marking it as failed Note: If this parameter is set, it will overwrite the setting from [Admin Dashboard > HTTP API > Oauth2 > Application settings](#)
     *
     * @return self
     */
    public function setMaxAttempts($max_attempts)
    {

        if (($max_attempts > 10)) {
            throw new \InvalidArgumentException('invalid value for $max_attempts when calling NewOtpResponse., must be smaller than or equal to 10.');
        }
        if (($max_attempts < 1)) {
            throw new \InvalidArgumentException('invalid value for $max_attempts when calling NewOtpResponse., must be bigger than or equal to 1.');
        }


        if (is_null($max_attempts)) {
            throw new \InvalidArgumentException('non-nullable max_attempts cannot be null');
        }

        $this->container['max_attempts'] = $max_attempts;

        return $this;
    }

    /**
     * Gets attempts
     *
     * @return int
     */
    public function getAttempts()
    {
        return $this->container['attempts'];
    }

    /**
     * Sets attempts
     *
     * @param int $attempts Number of unsuccessful attempts made to validate the pin
     *
     * @return self
     */
    public function setAttempts($attempts)
    {

        if (($attempts > 10)) {
            throw new \InvalidArgumentException('invalid value for $attempts when calling NewOtpResponse., must be smaller than or equal to 10.');
        }
        if (($attempts < 0)) {
            throw new \InvalidArgumentException('invalid value for $attempts when calling NewOtpResponse., must be bigger than or equal to 0.');
        }


        if (is_null($attempts)) {
            throw new \InvalidArgumentException('non-nullable attempts cannot be null');
        }

        $this->container['attempts'] = $attempts;

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
     * @param int $ttl The time to live (ttl) defines the time in seconds that a pin is valid. Min 1 minute (60 seconds) and max 30 minutes (1800 seconds)  Note: If this parameter is set, it will overwrite the setting from [Admin Dashboard > HTTP API > Oauth2 > Application settings](#)
     *
     * @return self
     */
    public function setTtl($ttl)
    {

        if (($ttl > 1800)) {
            throw new \InvalidArgumentException('invalid value for $ttl when calling NewOtpResponse., must be smaller than or equal to 1800.');
        }
        if (($ttl < 60)) {
            throw new \InvalidArgumentException('invalid value for $ttl when calling NewOtpResponse., must be bigger than or equal to 60.');
        }


        if (is_null($ttl)) {
            throw new \InvalidArgumentException('non-nullable ttl cannot be null');
        }

        $this->container['ttl'] = $ttl;

        return $this;
    }

    /**
     * Gets otp_callback_url
     *
     * @return string
     */
    public function getOtpCallbackUrl()
    {
        return $this->container['otp_callback_url'];
    }

    /**
     * Sets otp_callback_url
     *
     * @param string $otp_callback_url The webhook where request will be made with status upddates for the OTP
     *
     * @return self
     */
    public function setOtpCallbackUrl($otp_callback_url)
    {

        if (is_null($otp_callback_url)) {
            array_push($this->clientNullablesSetToNull, 'otp_callback_url');
        } else {
            $nullablesSetToNull = $this->getClientNullablesSetToNull();
            $index = array_search('otp_callback_url', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setClientNullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['otp_callback_url'] = $otp_callback_url;

        return $this;
    }

    /**
     * Gets date_created
     *
     * @return \DateTime
     */
    public function getDateCreated()
    {
        return $this->container['date_created'];
    }

    /**
     * Sets date_created
     *
     * @param \DateTime $date_created Datetime of the OTP request
     *
     * @return self
     */
    public function setDateCreated($date_created)
    {

        if (is_null($date_created)) {
            throw new \InvalidArgumentException('non-nullable date_created cannot be null');
        }

        $this->container['date_created'] = $date_created;

        return $this;
    }

    /**
     * Gets date_expires
     *
     * @return \DateTime
     */
    public function getDateExpires()
    {
        return $this->container['date_expires'];
    }

    /**
     * Sets date_expires
     *
     * @param \DateTime $date_expires Datetime of the OTP request expiration. After this date and time the pin will no longer be valid
     *
     * @return self
     */
    public function setDateExpires($date_expires)
    {

        if (is_null($date_expires)) {
            throw new \InvalidArgumentException('non-nullable date_expires cannot be null');
        }

        $this->container['date_expires'] = $date_expires;

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


