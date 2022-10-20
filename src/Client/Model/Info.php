<?php
/**
 * Info
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
 * Info Class Doc Comment
 *
 * @category Class
 * @package  Smscx
 * @author   SMS Connexion
 * @link     https://sms.cx
 * @implements \ArrayAccess<string, mixed>
 */
class Info implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $clientModelName = 'Info';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $clientTypes = [
        'campaign_id' => 'string',
        'total_phone_numbers' => 'int',
        'total_valid' => 'int',
        'total_invalid' => 'int',
        'total_cost' => 'float',
        'total_parts' => 'int',
        'dlr_callback_url' => 'string',
        'phone_numbers_by_country' => '\Smscx\Client\Model\PhoneNumbersByCountry',
        'transliteration_analysis' => '\Smscx\Client\Model\TransliterationAnalysis',
        'total_in_quiet_hours' => 'int',
        'invalid' => 'string[]',
        'scheduled' => 'bool'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $clientFormats = [
        'campaign_id' => 'uuid',
        'total_phone_numbers' => 'int32',
        'total_valid' => 'int32',
        'total_invalid' => 'int32',
        'total_cost' => null,
        'total_parts' => 'int32',
        'dlr_callback_url' => 'url',
        'phone_numbers_by_country' => null,
        'transliteration_analysis' => null,
        'total_in_quiet_hours' => 'int32',
        'invalid' => null,
        'scheduled' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $clientNullables = [
        'campaign_id' => false,
		'total_phone_numbers' => false,
		'total_valid' => false,
		'total_invalid' => false,
		'total_cost' => false,
		'total_parts' => false,
		'dlr_callback_url' => true,
		'phone_numbers_by_country' => false,
		'transliteration_analysis' => false,
		'total_in_quiet_hours' => false,
		'invalid' => false,
		'scheduled' => false
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
        'campaign_id' => 'campaignId',
        'total_phone_numbers' => 'totalPhoneNumbers',
        'total_valid' => 'totalValid',
        'total_invalid' => 'totalInvalid',
        'total_cost' => 'totalCost',
        'total_parts' => 'totalParts',
        'dlr_callback_url' => 'dlrCallbackUrl',
        'phone_numbers_by_country' => 'phoneNumbersByCountry',
        'transliteration_analysis' => 'transliterationAnalysis',
        'total_in_quiet_hours' => 'totalInQuietHours',
        'invalid' => 'invalid',
        'scheduled' => 'scheduled'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'campaign_id' => 'setCampaignId',
        'total_phone_numbers' => 'setTotalPhoneNumbers',
        'total_valid' => 'setTotalValid',
        'total_invalid' => 'setTotalInvalid',
        'total_cost' => 'setTotalCost',
        'total_parts' => 'setTotalParts',
        'dlr_callback_url' => 'setDlrCallbackUrl',
        'phone_numbers_by_country' => 'setPhoneNumbersByCountry',
        'transliteration_analysis' => 'setTransliterationAnalysis',
        'total_in_quiet_hours' => 'setTotalInQuietHours',
        'invalid' => 'setInvalid',
        'scheduled' => 'setScheduled'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'campaign_id' => 'getCampaignId',
        'total_phone_numbers' => 'getTotalPhoneNumbers',
        'total_valid' => 'getTotalValid',
        'total_invalid' => 'getTotalInvalid',
        'total_cost' => 'getTotalCost',
        'total_parts' => 'getTotalParts',
        'dlr_callback_url' => 'getDlrCallbackUrl',
        'phone_numbers_by_country' => 'getPhoneNumbersByCountry',
        'transliteration_analysis' => 'getTransliterationAnalysis',
        'total_in_quiet_hours' => 'getTotalInQuietHours',
        'invalid' => 'getInvalid',
        'scheduled' => 'getScheduled'
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
        $this->setIfExists('campaign_id', $data ?? [], null);
        $this->setIfExists('total_phone_numbers', $data ?? [], null);
        $this->setIfExists('total_valid', $data ?? [], null);
        $this->setIfExists('total_invalid', $data ?? [], null);
        $this->setIfExists('total_cost', $data ?? [], null);
        $this->setIfExists('total_parts', $data ?? [], null);
        $this->setIfExists('dlr_callback_url', $data ?? [], null);
        $this->setIfExists('phone_numbers_by_country', $data ?? [], null);
        $this->setIfExists('transliteration_analysis', $data ?? [], null);
        $this->setIfExists('total_in_quiet_hours', $data ?? [], null);
        $this->setIfExists('invalid', $data ?? [], null);
        $this->setIfExists('scheduled', $data ?? [], null);
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

        if ($this->container['campaign_id'] === null) {
            $invalidProperties[] = "'campaign_id' can't be null";
        }
        if ((mb_strlen($this->container['campaign_id']) > 36)) {
            $invalidProperties[] = "invalid value for 'campaign_id', the character length must be smaller than or equal to 36.";
        }

        if ((mb_strlen($this->container['campaign_id']) < 36)) {
            $invalidProperties[] = "invalid value for 'campaign_id', the character length must be bigger than or equal to 36.";
        }

        if (!preg_match("/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/", $this->container['campaign_id'])) {
            $invalidProperties[] = "invalid value for 'campaign_id', must be conform to the pattern /^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/.";
        }

        if ($this->container['total_phone_numbers'] === null) {
            $invalidProperties[] = "'total_phone_numbers' can't be null";
        }
        if ($this->container['total_valid'] === null) {
            $invalidProperties[] = "'total_valid' can't be null";
        }
        if ($this->container['total_invalid'] === null) {
            $invalidProperties[] = "'total_invalid' can't be null";
        }
        if ($this->container['total_cost'] === null) {
            $invalidProperties[] = "'total_cost' can't be null";
        }
        if ($this->container['total_parts'] === null) {
            $invalidProperties[] = "'total_parts' can't be null";
        }
        if ($this->container['dlr_callback_url'] === null) {
            $invalidProperties[] = "'dlr_callback_url' can't be null";
        }
        if ($this->container['phone_numbers_by_country'] === null) {
            $invalidProperties[] = "'phone_numbers_by_country' can't be null";
        }
        if ($this->container['scheduled'] === null) {
            $invalidProperties[] = "'scheduled' can't be null";
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
     * Gets campaign_id
     *
     * @return string
     */
    public function getCampaignId()
    {
        return $this->container['campaign_id'];
    }

    /**
     * Sets campaign_id
     *
     * @param string $campaign_id Unique identifier of the campaign
     *
     * @return self
     */
    public function setCampaignId($campaign_id)
    {
        if ((mb_strlen($campaign_id) > 36)) {
            throw new \InvalidArgumentException('invalid length for $campaign_id when calling Info., must be smaller than or equal to 36.');
        }
        if ((mb_strlen($campaign_id) < 36)) {
            throw new \InvalidArgumentException('invalid length for $campaign_id when calling Info., must be bigger than or equal to 36.');
        }
        if ((!preg_match("/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/", $campaign_id))) {
            throw new \InvalidArgumentException("invalid value for \$campaign_id when calling Info., must conform to the pattern /^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/.");
        }


        if (is_null($campaign_id)) {
            throw new \InvalidArgumentException('non-nullable campaign_id cannot be null');
        }

        $this->container['campaign_id'] = $campaign_id;

        return $this;
    }

    /**
     * Gets total_phone_numbers
     *
     * @return int
     */
    public function getTotalPhoneNumbers()
    {
        return $this->container['total_phone_numbers'];
    }

    /**
     * Sets total_phone_numbers
     *
     * @param int $total_phone_numbers Total phone numbers submitted for processing
     *
     * @return self
     */
    public function setTotalPhoneNumbers($total_phone_numbers)
    {

        if (is_null($total_phone_numbers)) {
            throw new \InvalidArgumentException('non-nullable total_phone_numbers cannot be null');
        }

        $this->container['total_phone_numbers'] = $total_phone_numbers;

        return $this;
    }

    /**
     * Gets total_valid
     *
     * @return int
     */
    public function getTotalValid()
    {
        return $this->container['total_valid'];
    }

    /**
     * Sets total_valid
     *
     * @param int $total_valid Total valid phone numbers after validation
     *
     * @return self
     */
    public function setTotalValid($total_valid)
    {

        if (is_null($total_valid)) {
            throw new \InvalidArgumentException('non-nullable total_valid cannot be null');
        }

        $this->container['total_valid'] = $total_valid;

        return $this;
    }

    /**
     * Gets total_invalid
     *
     * @return int
     */
    public function getTotalInvalid()
    {
        return $this->container['total_invalid'];
    }

    /**
     * Sets total_invalid
     *
     * @param int $total_invalid Total invalid phone numbers after validation
     *
     * @return self
     */
    public function setTotalInvalid($total_invalid)
    {

        if (is_null($total_invalid)) {
            throw new \InvalidArgumentException('non-nullable total_invalid cannot be null');
        }

        $this->container['total_invalid'] = $total_invalid;

        return $this;
    }

    /**
     * Gets total_cost
     *
     * @return float
     */
    public function getTotalCost()
    {
        return $this->container['total_cost'];
    }

    /**
     * Sets total_cost
     *
     * @param float $total_cost Total cost of sending the message
     *
     * @return self
     */
    public function setTotalCost($total_cost)
    {

        if (is_null($total_cost)) {
            throw new \InvalidArgumentException('non-nullable total_cost cannot be null');
        }

        $this->container['total_cost'] = $total_cost;

        return $this;
    }

    /**
     * Gets total_parts
     *
     * @return int
     */
    public function getTotalParts()
    {
        return $this->container['total_parts'];
    }

    /**
     * Sets total_parts
     *
     * @param int $total_parts Total message parts
     *
     * @return self
     */
    public function setTotalParts($total_parts)
    {

        if (is_null($total_parts)) {
            throw new \InvalidArgumentException('non-nullable total_parts cannot be null');
        }

        $this->container['total_parts'] = $total_parts;

        return $this;
    }

    /**
     * Gets dlr_callback_url
     *
     * @return string
     */
    public function getDlrCallbackUrl()
    {
        return $this->container['dlr_callback_url'];
    }

    /**
     * Sets dlr_callback_url
     *
     * @param string $dlr_callback_url Callback URL for receiving the delivery report
     *
     * @return self
     */
    public function setDlrCallbackUrl($dlr_callback_url)
    {

        if (is_null($dlr_callback_url)) {
            array_push($this->clientNullablesSetToNull, 'dlr_callback_url');
        } else {
            $nullablesSetToNull = $this->getClientNullablesSetToNull();
            $index = array_search('dlr_callback_url', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setClientNullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['dlr_callback_url'] = $dlr_callback_url;

        return $this;
    }

    /**
     * Gets phone_numbers_by_country
     *
     * @return \Smscx\Client\Model\PhoneNumbersByCountry
     */
    public function getPhoneNumbersByCountry()
    {
        return $this->container['phone_numbers_by_country'];
    }

    /**
     * Sets phone_numbers_by_country
     *
     * @param \Smscx\Client\Model\PhoneNumbersByCountry $phone_numbers_by_country phone_numbers_by_country
     *
     * @return self
     */
    public function setPhoneNumbersByCountry($phone_numbers_by_country)
    {

        if (is_null($phone_numbers_by_country)) {
            throw new \InvalidArgumentException('non-nullable phone_numbers_by_country cannot be null');
        }

        $this->container['phone_numbers_by_country'] = $phone_numbers_by_country;

        return $this;
    }

    /**
     * Gets transliteration_analysis
     *
     * @return \Smscx\Client\Model\TransliterationAnalysis|null
     */
    public function getTransliterationAnalysis()
    {
        return $this->container['transliteration_analysis'];
    }

    /**
     * Sets transliteration_analysis
     *
     * @param \Smscx\Client\Model\TransliterationAnalysis|null $transliteration_analysis transliteration_analysis
     *
     * @return self
     */
    public function setTransliterationAnalysis($transliteration_analysis)
    {

        if (is_null($transliteration_analysis)) {
            throw new \InvalidArgumentException('non-nullable transliteration_analysis cannot be null');
        }

        $this->container['transliteration_analysis'] = $transliteration_analysis;

        return $this;
    }

    /**
     * Gets total_in_quiet_hours
     *
     * @return int|null
     */
    public function getTotalInQuietHours()
    {
        return $this->container['total_in_quiet_hours'];
    }

    /**
     * Sets total_in_quiet_hours
     *
     * @param int|null $total_in_quiet_hours Total phone numbers that were detected to be inside the interval of quiet hours
     *
     * @return self
     */
    public function setTotalInQuietHours($total_in_quiet_hours)
    {

        if (is_null($total_in_quiet_hours)) {
            throw new \InvalidArgumentException('non-nullable total_in_quiet_hours cannot be null');
        }

        $this->container['total_in_quiet_hours'] = $total_in_quiet_hours;

        return $this;
    }

    /**
     * Gets invalid
     *
     * @return string[]|null
     */
    public function getInvalid()
    {
        return $this->container['invalid'];
    }

    /**
     * Sets invalid
     *
     * @param string[]|null $invalid An array with numbers that were detected to be invalid
     *
     * @return self
     */
    public function setInvalid($invalid)
    {

        if (is_null($invalid)) {
            throw new \InvalidArgumentException('non-nullable invalid cannot be null');
        }

        $this->container['invalid'] = $invalid;

        return $this;
    }

    /**
     * Gets scheduled
     *
     * @return bool
     */
    public function getScheduled()
    {
        return $this->container['scheduled'];
    }

    /**
     * Sets scheduled
     *
     * @param bool $scheduled Confirmation that the message/campaign was scheduled at a later date
     *
     * @return self
     */
    public function setScheduled($scheduled)
    {

        if (is_null($scheduled)) {
            throw new \InvalidArgumentException('non-nullable scheduled cannot be null');
        }

        $this->container['scheduled'] = $scheduled;

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


