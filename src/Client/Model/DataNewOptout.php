<?php
/**
 * DataNewOptout
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
 * DataNewOptout Class Doc Comment
 *
 * @category Class
 * @description Event data, grouped in multiple objects (up to 200 in a request)
 * @package  Smscx
 * @author   SMS Connexion
 * @link     https://sms.cx
 * @implements \ArrayAccess<string, mixed>
 */
class DataNewOptout implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $clientModelName = 'DataNewOptout';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $clientTypes = [
        'hit_id' => 'int',
        'optout_id' => 'string',
        'optout_url' => 'string',
        'optout_type' => 'string',
        'phone_number' => 'string',
        'campaign_id' => 'string',
        'group_id' => 'string',
        'country_iso' => 'string',
        'datetime' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $clientFormats = [
        'hit_id' => 'int32',
        'optout_id' => null,
        'optout_url' => 'url',
        'optout_type' => null,
        'phone_number' => null,
        'campaign_id' => 'uuid',
        'group_id' => null,
        'country_iso' => null,
        'datetime' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $clientNullables = [
        'hit_id' => false,
		'optout_id' => false,
		'optout_url' => false,
		'optout_type' => false,
		'phone_number' => false,
		'campaign_id' => true,
		'group_id' => true,
		'country_iso' => false,
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
        'hit_id' => 'hitId',
        'optout_id' => 'optoutId',
        'optout_url' => 'optoutUrl',
        'optout_type' => 'optoutType',
        'phone_number' => 'phoneNumber',
        'campaign_id' => 'campaignId',
        'group_id' => 'groupId',
        'country_iso' => 'countryIso',
        'datetime' => 'datetime'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'hit_id' => 'setHitId',
        'optout_id' => 'setOptoutId',
        'optout_url' => 'setOptoutUrl',
        'optout_type' => 'setOptoutType',
        'phone_number' => 'setPhoneNumber',
        'campaign_id' => 'setCampaignId',
        'group_id' => 'setGroupId',
        'country_iso' => 'setCountryIso',
        'datetime' => 'setDatetime'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'hit_id' => 'getHitId',
        'optout_id' => 'getOptoutId',
        'optout_url' => 'getOptoutUrl',
        'optout_type' => 'getOptoutType',
        'phone_number' => 'getPhoneNumber',
        'campaign_id' => 'getCampaignId',
        'group_id' => 'getGroupId',
        'country_iso' => 'getCountryIso',
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

    public const OPTOUT_TYPE_ADMIN = 'admin';
    public const OPTOUT_TYPE_LINK = 'link';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getOptoutTypeAllowableValues()
    {
        return [
            self::OPTOUT_TYPE_ADMIN,
            self::OPTOUT_TYPE_LINK,
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
        $this->setIfExists('hit_id', $data ?? [], null);
        $this->setIfExists('optout_id', $data ?? [], null);
        $this->setIfExists('optout_url', $data ?? [], null);
        $this->setIfExists('optout_type', $data ?? [], null);
        $this->setIfExists('phone_number', $data ?? [], null);
        $this->setIfExists('campaign_id', $data ?? [], null);
        $this->setIfExists('group_id', $data ?? [], null);
        $this->setIfExists('country_iso', $data ?? [], null);
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

        if ($this->container['hit_id'] === null) {
            $invalidProperties[] = "'hit_id' can't be null";
        }
        if ($this->container['optout_id'] === null) {
            $invalidProperties[] = "'optout_id' can't be null";
        }
        if ($this->container['optout_url'] === null) {
            $invalidProperties[] = "'optout_url' can't be null";
        }
        if ($this->container['optout_type'] === null) {
            $invalidProperties[] = "'optout_type' can't be null";
        }
        $allowedValues = $this->getOptoutTypeAllowableValues();
        if (!is_null($this->container['optout_type']) && !in_array($this->container['optout_type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'optout_type', must be one of '%s'",
                $this->container['optout_type'],
                implode("', '", $allowedValues)
            );
        }

        if (!is_null($this->container['campaign_id']) && (mb_strlen($this->container['campaign_id']) > 36)) {
            $invalidProperties[] = "invalid value for 'campaign_id', the character length must be smaller than or equal to 36.";
        }

        if (!is_null($this->container['campaign_id']) && (mb_strlen($this->container['campaign_id']) < 36)) {
            $invalidProperties[] = "invalid value for 'campaign_id', the character length must be bigger than or equal to 36.";
        }

        if (!is_null($this->container['campaign_id']) && !preg_match("/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/", $this->container['campaign_id'])) {
            $invalidProperties[] = "invalid value for 'campaign_id', must be conform to the pattern /^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/.";
        }

        if ($this->container['country_iso'] === null) {
            $invalidProperties[] = "'country_iso' can't be null";
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
     * Gets hit_id
     *
     * @return int
     */
    public function getHitId()
    {
        return $this->container['hit_id'];
    }

    /**
     * Sets hit_id
     *
     * @param int $hit_id hit_id
     *
     * @return self
     */
    public function setHitId($hit_id)
    {

        if (is_null($hit_id)) {
            throw new \InvalidArgumentException('non-nullable hit_id cannot be null');
        }

        $this->container['hit_id'] = $hit_id;

        return $this;
    }

    /**
     * Gets optout_id
     *
     * @return string
     */
    public function getOptoutId()
    {
        return $this->container['optout_id'];
    }

    /**
     * Sets optout_id
     *
     * @param string $optout_id ID of the optout link
     *
     * @return self
     */
    public function setOptoutId($optout_id)
    {

        if (is_null($optout_id)) {
            throw new \InvalidArgumentException('non-nullable optout_id cannot be null');
        }

        $this->container['optout_id'] = $optout_id;

        return $this;
    }

    /**
     * Gets optout_url
     *
     * @return string
     */
    public function getOptoutUrl()
    {
        return $this->container['optout_url'];
    }

    /**
     * Sets optout_url
     *
     * @param string $optout_url URL of the optout link
     *
     * @return self
     */
    public function setOptoutUrl($optout_url)
    {

        if (is_null($optout_url)) {
            throw new \InvalidArgumentException('non-nullable optout_url cannot be null');
        }

        $this->container['optout_url'] = $optout_url;

        return $this;
    }

    /**
     * Gets optout_type
     *
     * @return string
     */
    public function getOptoutType()
    {
        return $this->container['optout_type'];
    }

    /**
     * Sets optout_type
     *
     * @param string $optout_type The method by which the contact has unsubscribed. Value `link` means he clicked on the optout link and submitted the form and value `admin` it means that the client was added to the optout list by you
     *
     * @return self
     */
    public function setOptoutType($optout_type)
    {
        $allowedValues = $this->getOptoutTypeAllowableValues();
        if (!in_array($optout_type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'optout_type', must be one of '%s'",
                    $optout_type,
                    implode("', '", $allowedValues)
                )
            );
        }

        if (is_null($optout_type)) {
            throw new \InvalidArgumentException('non-nullable optout_type cannot be null');
        }

        $this->container['optout_type'] = $optout_type;

        return $this;
    }

    /**
     * Gets phone_number
     *
     * @return string|null
     */
    public function getPhoneNumber()
    {
        return $this->container['phone_number'];
    }

    /**
     * Sets phone_number
     *
     * @param string|null $phone_number Phone number that choose to opt out.
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
     * Gets campaign_id
     *
     * @return string|null
     */
    public function getCampaignId()
    {
        return $this->container['campaign_id'];
    }

    /**
     * Sets campaign_id
     *
     * @param string|null $campaign_id Identifier of the campaign from which the contact has unsubscribed. If optout tracking was enabled, this parameter will not be null.
     *
     * @return self
     */
    public function setCampaignId($campaign_id)
    {
        if (!is_null($campaign_id) && (mb_strlen($campaign_id) > 36)) {
            throw new \InvalidArgumentException('invalid length for $campaign_id when calling DataNewOptout., must be smaller than or equal to 36.');
        }
        if (!is_null($campaign_id) && (mb_strlen($campaign_id) < 36)) {
            throw new \InvalidArgumentException('invalid length for $campaign_id when calling DataNewOptout., must be bigger than or equal to 36.');
        }
        if (!is_null($campaign_id) && (!preg_match("/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/", $campaign_id))) {
            throw new \InvalidArgumentException("invalid value for \$campaign_id when calling DataNewOptout., must conform to the pattern /^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/.");
        }


        if (is_null($campaign_id)) {
            array_push($this->clientNullablesSetToNull, 'campaign_id');
        } else {
            $nullablesSetToNull = $this->getClientNullablesSetToNull();
            $index = array_search('campaign_id', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setClientNullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['campaign_id'] = $campaign_id;

        return $this;
    }

    /**
     * Gets group_id
     *
     * @return string|null
     */
    public function getGroupId()
    {
        return $this->container['group_id'];
    }

    /**
     * Sets group_id
     *
     * @param string|null $group_id Identifier of the group the contact was in. If optout tracking was enabled, this parameter will not be null.
     *
     * @return self
     */
    public function setGroupId($group_id)
    {

        if (is_null($group_id)) {
            array_push($this->clientNullablesSetToNull, 'group_id');
        } else {
            $nullablesSetToNull = $this->getClientNullablesSetToNull();
            $index = array_search('group_id', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setClientNullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['group_id'] = $group_id;

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
     * @param string $country_iso Two-letter country ISO of the phone number that unsubscribed.
     *
     * @return self
     */
    public function setCountryIso($country_iso)
    {

        if (is_null($country_iso)) {
            throw new \InvalidArgumentException('non-nullable country_iso cannot be null');
        }

        $this->container['country_iso'] = $country_iso;

        return $this;
    }

    /**
     * Gets datetime
     *
     * @return string
     */
    public function getDatetime()
    {
        return $this->container['datetime'];
    }

    /**
     * Sets datetime
     *
     * @param string $datetime datetime
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


