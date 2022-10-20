<?php
/**
 * NewOtpRequest
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
 * NewOtpRequest Class Doc Comment
 *
 * @category Class
 * @package  Smscx
 * @author   SMS Connexion
 * @link     https://sms.cx
 * @implements \ArrayAccess<string, mixed>
 */
class NewOtpRequest implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $clientModelName = 'NewOtpRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $clientTypes = [
        'phone_number' => 'string',
        'country_iso' => 'string',
        'from' => 'string',
        'template' => 'string',
        'track_id' => 'string',
        'ttl' => 'int',
        'max_attempts' => 'int',
        'pin_type' => 'string',
        'pin_length' => 'int',
        'otp_callback_url' => 'string'
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
        'country_iso' => null,
        'from' => null,
        'template' => null,
        'track_id' => null,
        'ttl' => 'int32',
        'max_attempts' => 'int32',
        'pin_type' => null,
        'pin_length' => 'int32',
        'otp_callback_url' => 'url'
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $clientNullables = [
        'phone_number' => false,
		'country_iso' => false,
		'from' => false,
		'template' => false,
		'track_id' => false,
		'ttl' => false,
		'max_attempts' => false,
		'pin_type' => false,
		'pin_length' => false,
		'otp_callback_url' => false
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
        'country_iso' => 'countryIso',
        'from' => 'from',
        'template' => 'template',
        'track_id' => 'trackId',
        'ttl' => 'ttl',
        'max_attempts' => 'maxAttempts',
        'pin_type' => 'pinType',
        'pin_length' => 'pinLength',
        'otp_callback_url' => 'otpCallbackUrl'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'phone_number' => 'setPhoneNumber',
        'country_iso' => 'setCountryIso',
        'from' => 'setFrom',
        'template' => 'setTemplate',
        'track_id' => 'setTrackId',
        'ttl' => 'setTtl',
        'max_attempts' => 'setMaxAttempts',
        'pin_type' => 'setPinType',
        'pin_length' => 'setPinLength',
        'otp_callback_url' => 'setOtpCallbackUrl'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'phone_number' => 'getPhoneNumber',
        'country_iso' => 'getCountryIso',
        'from' => 'getFrom',
        'template' => 'getTemplate',
        'track_id' => 'getTrackId',
        'ttl' => 'getTtl',
        'max_attempts' => 'getMaxAttempts',
        'pin_type' => 'getPinType',
        'pin_length' => 'getPinLength',
        'otp_callback_url' => 'getOtpCallbackUrl'
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
        $this->setIfExists('phone_number', $data ?? [], null);
        $this->setIfExists('country_iso', $data ?? [], null);
        $this->setIfExists('from', $data ?? [], null);
        $this->setIfExists('template', $data ?? [], null);
        $this->setIfExists('track_id', $data ?? [], null);
        $this->setIfExists('ttl', $data ?? [], null);
        $this->setIfExists('max_attempts', $data ?? [], null);
        $this->setIfExists('pin_type', $data ?? [], null);
        $this->setIfExists('pin_length', $data ?? [], null);
        $this->setIfExists('otp_callback_url', $data ?? [], null);
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
        if (!is_null($this->container['country_iso']) && (mb_strlen($this->container['country_iso']) > 2)) {
            $invalidProperties[] = "invalid value for 'country_iso', the character length must be smaller than or equal to 2.";
        }

        if (!is_null($this->container['country_iso']) && (mb_strlen($this->container['country_iso']) < 2)) {
            $invalidProperties[] = "invalid value for 'country_iso', the character length must be bigger than or equal to 2.";
        }

        if (!is_null($this->container['from']) && (mb_strlen($this->container['from']) > 15)) {
            $invalidProperties[] = "invalid value for 'from', the character length must be smaller than or equal to 15.";
        }

        if (!is_null($this->container['from']) && (mb_strlen($this->container['from']) < 3)) {
            $invalidProperties[] = "invalid value for 'from', the character length must be bigger than or equal to 3.";
        }

        if (!is_null($this->container['track_id']) && (mb_strlen($this->container['track_id']) > 36)) {
            $invalidProperties[] = "invalid value for 'track_id', the character length must be smaller than or equal to 36.";
        }

        if (!is_null($this->container['track_id']) && (mb_strlen($this->container['track_id']) < 36)) {
            $invalidProperties[] = "invalid value for 'track_id', the character length must be bigger than or equal to 36.";
        }

        if (!is_null($this->container['track_id']) && !preg_match("/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/", $this->container['track_id'])) {
            $invalidProperties[] = "invalid value for 'track_id', must be conform to the pattern /^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/.";
        }

        if (!is_null($this->container['ttl']) && ($this->container['ttl'] > 1800)) {
            $invalidProperties[] = "invalid value for 'ttl', must be smaller than or equal to 1800.";
        }

        if (!is_null($this->container['ttl']) && ($this->container['ttl'] < 60)) {
            $invalidProperties[] = "invalid value for 'ttl', must be bigger than or equal to 60.";
        }

        if (!is_null($this->container['max_attempts']) && ($this->container['max_attempts'] > 10)) {
            $invalidProperties[] = "invalid value for 'max_attempts', must be smaller than or equal to 10.";
        }

        if (!is_null($this->container['max_attempts']) && ($this->container['max_attempts'] < 1)) {
            $invalidProperties[] = "invalid value for 'max_attempts', must be bigger than or equal to 1.";
        }

        $allowedValues = $this->getPinTypeAllowableValues();
        if (!is_null($this->container['pin_type']) && !in_array($this->container['pin_type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'pin_type', must be one of '%s'",
                $this->container['pin_type'],
                implode("', '", $allowedValues)
            );
        }

        if (!is_null($this->container['pin_length']) && ($this->container['pin_length'] > 10)) {
            $invalidProperties[] = "invalid value for 'pin_length', must be smaller than or equal to 10.";
        }

        if (!is_null($this->container['pin_length']) && ($this->container['pin_length'] < 4)) {
            $invalidProperties[] = "invalid value for 'pin_length', must be bigger than or equal to 4.";
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
     * @param string $phone_number Phone number in international E.164 format or national format. If national format is provided, for better validation you must use the parameter `countryIso` to provide the country code of the destination phone number
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
     * @return string|null
     */
    public function getCountryIso()
    {
        return $this->container['country_iso'];
    }

    /**
     * Sets country_iso
     *
     * @param string|null $country_iso Country ISO (two-letter) of the destination phone numbers (if provided in national format). Please note that if an international E.164 phone number format is provided in the `to` parameter, the **countryIso** will be ignored. Eg. **FR** for France, **GB** for United Kingdom. Note: It is \"GB\", not \"UK\", as per the ISO-3166 alpha 2
     *
     * @return self
     */
    public function setCountryIso($country_iso)
    {
        if (!is_null($country_iso) && (mb_strlen($country_iso) > 2)) {
            throw new \InvalidArgumentException('invalid length for $country_iso when calling NewOtpRequest., must be smaller than or equal to 2.');
        }
        if (!is_null($country_iso) && (mb_strlen($country_iso) < 2)) {
            throw new \InvalidArgumentException('invalid length for $country_iso when calling NewOtpRequest., must be bigger than or equal to 2.');
        }


        if (is_null($country_iso)) {
            throw new \InvalidArgumentException('non-nullable country_iso cannot be null');
        }

        $this->container['country_iso'] = $country_iso;

        return $this;
    }

    /**
     * Gets from
     *
     * @return string|null
     */
    public function getFrom()
    {
        return $this->container['from'];
    }

    /**
     * Sets from
     *
     * @param string|null $from The originator (sender name) of the text message (min 3, max 11 characters). If the originator used in this value is not approved, it will be overwritten by a default system originator (eg. InfoText). Read more about [sender names](#) Note: This parameter is optional and can be used only if you want to overwrite the OTP settings of your SMS API application
     *
     * @return self
     */
    public function setFrom($from)
    {
        if (!is_null($from) && (mb_strlen($from) > 15)) {
            throw new \InvalidArgumentException('invalid length for $from when calling NewOtpRequest., must be smaller than or equal to 15.');
        }
        if (!is_null($from) && (mb_strlen($from) < 3)) {
            throw new \InvalidArgumentException('invalid length for $from when calling NewOtpRequest., must be bigger than or equal to 3.');
        }


        if (is_null($from)) {
            throw new \InvalidArgumentException('non-nullable from cannot be null');
        }

        $this->container['from'] = $from;

        return $this;
    }

    /**
     * Gets template
     *
     * @return string|null
     */
    public function getTemplate()
    {
        return $this->container['template'];
    }

    /**
     * Sets template
     *
     * @param string|null $template The text message that will be delivered to the mobile number. It must contain the placeholder `{{pin}}`.    Note: This parameter is optional and can be used only if you want to overwrite the OTP settings of your SMS API application. [General placeholders](#) can be used in the text template.
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
     * Gets track_id
     *
     * @return string|null
     */
    public function getTrackId()
    {
        return $this->container['track_id'];
    }

    /**
     * Sets track_id
     *
     * @param string|null $track_id Client provided UUID (v1-v5) for tracking purposes
     *
     * @return self
     */
    public function setTrackId($track_id)
    {
        if (!is_null($track_id) && (mb_strlen($track_id) > 36)) {
            throw new \InvalidArgumentException('invalid length for $track_id when calling NewOtpRequest., must be smaller than or equal to 36.');
        }
        if (!is_null($track_id) && (mb_strlen($track_id) < 36)) {
            throw new \InvalidArgumentException('invalid length for $track_id when calling NewOtpRequest., must be bigger than or equal to 36.');
        }
        if (!is_null($track_id) && (!preg_match("/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/", $track_id))) {
            throw new \InvalidArgumentException("invalid value for \$track_id when calling NewOtpRequest., must conform to the pattern /^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/.");
        }


        if (is_null($track_id)) {
            throw new \InvalidArgumentException('non-nullable track_id cannot be null');
        }

        $this->container['track_id'] = $track_id;

        return $this;
    }

    /**
     * Gets ttl
     *
     * @return int|null
     */
    public function getTtl()
    {
        return $this->container['ttl'];
    }

    /**
     * Sets ttl
     *
     * @param int|null $ttl The time to live (ttl) defines the time in seconds that a pin is valid. Min 1 minute (60 seconds) and max 30 minutes (1800 seconds)   Note: If this parameter is set, it will overwrite the setting from [Admin Dashboard > HTTP API > Oauth2 > Application settings](#)
     *
     * @return self
     */
    public function setTtl($ttl)
    {

        if (!is_null($ttl) && ($ttl > 1800)) {
            throw new \InvalidArgumentException('invalid value for $ttl when calling NewOtpRequest., must be smaller than or equal to 1800.');
        }
        if (!is_null($ttl) && ($ttl < 60)) {
            throw new \InvalidArgumentException('invalid value for $ttl when calling NewOtpRequest., must be bigger than or equal to 60.');
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
     * @return int|null
     */
    public function getMaxAttempts()
    {
        return $this->container['max_attempts'];
    }

    /**
     * Sets max_attempts
     *
     * @param int|null $max_attempts Number of attempts to allow the OTP to be verified before marking it as failed  Note: If this parameter is set, it will overwrite the setting from [Admin Dashboard > HTTP API > Oauth2 > Application settings](#)
     *
     * @return self
     */
    public function setMaxAttempts($max_attempts)
    {

        if (!is_null($max_attempts) && ($max_attempts > 10)) {
            throw new \InvalidArgumentException('invalid value for $max_attempts when calling NewOtpRequest., must be smaller than or equal to 10.');
        }
        if (!is_null($max_attempts) && ($max_attempts < 1)) {
            throw new \InvalidArgumentException('invalid value for $max_attempts when calling NewOtpRequest., must be bigger than or equal to 1.');
        }


        if (is_null($max_attempts)) {
            throw new \InvalidArgumentException('non-nullable max_attempts cannot be null');
        }

        $this->container['max_attempts'] = $max_attempts;

        return $this;
    }

    /**
     * Gets pin_type
     *
     * @return string|null
     */
    public function getPinType()
    {
        return $this->container['pin_type'];
    }

    /**
     * Sets pin_type
     *
     * @param string|null $pin_type Type of pin that will be generated for each mobile phone and will replace the placeholder {{pin}  Note: If this parameter is set, it will overwrite the setting from [Admin Dashboard > HTTP API > Oauth2 > Application settings](#)
     *
     * @return self
     */
    public function setPinType($pin_type)
    {
        $allowedValues = $this->getPinTypeAllowableValues();
        if (!is_null($pin_type) && !in_array($pin_type, $allowedValues, true)) {
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
     * @return int|null
     */
    public function getPinLength()
    {
        return $this->container['pin_length'];
    }

    /**
     * Sets pin_length
     *
     * @param int|null $pin_length Character length of the pin   Note: If this parameter is set, it will overwrite the setting from [Admin Dashboard > HTTP API > Oauth2 > Application settings](#)
     *
     * @return self
     */
    public function setPinLength($pin_length)
    {

        if (!is_null($pin_length) && ($pin_length > 10)) {
            throw new \InvalidArgumentException('invalid value for $pin_length when calling NewOtpRequest., must be smaller than or equal to 10.');
        }
        if (!is_null($pin_length) && ($pin_length < 4)) {
            throw new \InvalidArgumentException('invalid value for $pin_length when calling NewOtpRequest., must be bigger than or equal to 4.');
        }


        if (is_null($pin_length)) {
            throw new \InvalidArgumentException('non-nullable pin_length cannot be null');
        }

        $this->container['pin_length'] = $pin_length;

        return $this;
    }

    /**
     * Gets otp_callback_url
     *
     * @return string|null
     */
    public function getOtpCallbackUrl()
    {
        return $this->container['otp_callback_url'];
    }

    /**
     * Sets otp_callback_url
     *
     * @param string|null $otp_callback_url A valid URL to receive status updates for the OTP verification.   Note: If this parameter is set, it will overwrite the setting from [Admin Dashboard > HTTP API > Oauth2 > Application settings](#)
     *
     * @return self
     */
    public function setOtpCallbackUrl($otp_callback_url)
    {

        if (is_null($otp_callback_url)) {
            throw new \InvalidArgumentException('non-nullable otp_callback_url cannot be null');
        }

        $this->container['otp_callback_url'] = $otp_callback_url;

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


