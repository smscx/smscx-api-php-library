<?php
/**
 * InfoDeleteScheduledCampaign
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
 * InfoDeleteScheduledCampaign Class Doc Comment
 *
 * @category Class
 * @package  Smscx
 * @author   SMS Connexion
 * @link     https://sms.cx
 * @implements \ArrayAccess<string, mixed>
 */
class InfoDeleteScheduledCampaign implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $clientModelName = 'InfoDeleteScheduledCampaign';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $clientTypes = [
        'campaign_id' => 'string',
        'total_phone_numbers' => 'int',
        'total_parts' => 'int',
        'phone_numbers_deleted' => 'int',
        'parts_deleted' => 'int',
        'credit_returned' => 'float',
        'channel' => 'string'
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
        'total_parts' => 'int32',
        'phone_numbers_deleted' => 'int32',
        'parts_deleted' => 'int32',
        'credit_returned' => 'decimal',
        'channel' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $clientNullables = [
        'campaign_id' => false,
		'total_phone_numbers' => false,
		'total_parts' => false,
		'phone_numbers_deleted' => false,
		'parts_deleted' => false,
		'credit_returned' => false,
		'channel' => false
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
        'total_parts' => 'totalParts',
        'phone_numbers_deleted' => 'phoneNumbersDeleted',
        'parts_deleted' => 'partsDeleted',
        'credit_returned' => 'creditReturned',
        'channel' => 'channel'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'campaign_id' => 'setCampaignId',
        'total_phone_numbers' => 'setTotalPhoneNumbers',
        'total_parts' => 'setTotalParts',
        'phone_numbers_deleted' => 'setPhoneNumbersDeleted',
        'parts_deleted' => 'setPartsDeleted',
        'credit_returned' => 'setCreditReturned',
        'channel' => 'setChannel'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'campaign_id' => 'getCampaignId',
        'total_phone_numbers' => 'getTotalPhoneNumbers',
        'total_parts' => 'getTotalParts',
        'phone_numbers_deleted' => 'getPhoneNumbersDeleted',
        'parts_deleted' => 'getPartsDeleted',
        'credit_returned' => 'getCreditReturned',
        'channel' => 'getChannel'
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

    public const CHANNEL_SMS = 'sms';
    public const CHANNEL_VIBER = 'viber';
    public const CHANNEL_WHATSAPP = 'whatsapp';
    public const CHANNEL_MULTICHANNEL = 'multichannel';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getChannelAllowableValues()
    {
        return [
            self::CHANNEL_SMS,
            self::CHANNEL_VIBER,
            self::CHANNEL_WHATSAPP,
            self::CHANNEL_MULTICHANNEL,
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
        $this->setIfExists('campaign_id', $data ?? [], null);
        $this->setIfExists('total_phone_numbers', $data ?? [], null);
        $this->setIfExists('total_parts', $data ?? [], null);
        $this->setIfExists('phone_numbers_deleted', $data ?? [], null);
        $this->setIfExists('parts_deleted', $data ?? [], null);
        $this->setIfExists('credit_returned', $data ?? [], null);
        $this->setIfExists('channel', $data ?? [], null);
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
        if ($this->container['total_parts'] === null) {
            $invalidProperties[] = "'total_parts' can't be null";
        }
        if ($this->container['phone_numbers_deleted'] === null) {
            $invalidProperties[] = "'phone_numbers_deleted' can't be null";
        }
        if ($this->container['parts_deleted'] === null) {
            $invalidProperties[] = "'parts_deleted' can't be null";
        }
        if ($this->container['credit_returned'] === null) {
            $invalidProperties[] = "'credit_returned' can't be null";
        }
        if ($this->container['channel'] === null) {
            $invalidProperties[] = "'channel' can't be null";
        }
        $allowedValues = $this->getChannelAllowableValues();
        if (!is_null($this->container['channel']) && !in_array($this->container['channel'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'channel', must be one of '%s'",
                $this->container['channel'],
                implode("', '", $allowedValues)
            );
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
     * @param string $campaign_id Identifier of the deleted scheduled campaign
     *
     * @return self
     */
    public function setCampaignId($campaign_id)
    {
        if ((mb_strlen($campaign_id) > 36)) {
            throw new \InvalidArgumentException('invalid length for $campaign_id when calling InfoDeleteScheduledCampaign., must be smaller than or equal to 36.');
        }
        if ((mb_strlen($campaign_id) < 36)) {
            throw new \InvalidArgumentException('invalid length for $campaign_id when calling InfoDeleteScheduledCampaign., must be bigger than or equal to 36.');
        }
        if ((!preg_match("/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/", $campaign_id))) {
            throw new \InvalidArgumentException("invalid value for \$campaign_id when calling InfoDeleteScheduledCampaign., must conform to the pattern /^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/.");
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
     * @param int $total_phone_numbers Total phone numbers in campaign
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
     * @param int $total_parts Total parts of the campaign
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
     * Gets phone_numbers_deleted
     *
     * @return int
     */
    public function getPhoneNumbersDeleted()
    {
        return $this->container['phone_numbers_deleted'];
    }

    /**
     * Sets phone_numbers_deleted
     *
     * @param int $phone_numbers_deleted Unique destinations deleted
     *
     * @return self
     */
    public function setPhoneNumbersDeleted($phone_numbers_deleted)
    {

        if (is_null($phone_numbers_deleted)) {
            throw new \InvalidArgumentException('non-nullable phone_numbers_deleted cannot be null');
        }

        $this->container['phone_numbers_deleted'] = $phone_numbers_deleted;

        return $this;
    }

    /**
     * Gets parts_deleted
     *
     * @return int
     */
    public function getPartsDeleted()
    {
        return $this->container['parts_deleted'];
    }

    /**
     * Sets parts_deleted
     *
     * @param int $parts_deleted Message parts
     *
     * @return self
     */
    public function setPartsDeleted($parts_deleted)
    {

        if (is_null($parts_deleted)) {
            throw new \InvalidArgumentException('non-nullable parts_deleted cannot be null');
        }

        $this->container['parts_deleted'] = $parts_deleted;

        return $this;
    }

    /**
     * Gets credit_returned
     *
     * @return float
     */
    public function getCreditReturned()
    {
        return $this->container['credit_returned'];
    }

    /**
     * Sets credit_returned
     *
     * @param float $credit_returned Credit returned to the user balance after deleting the scheduled messages
     *
     * @return self
     */
    public function setCreditReturned($credit_returned)
    {

        if (is_null($credit_returned)) {
            throw new \InvalidArgumentException('non-nullable credit_returned cannot be null');
        }

        $this->container['credit_returned'] = $credit_returned;

        return $this;
    }

    /**
     * Gets channel
     *
     * @return string
     */
    public function getChannel()
    {
        return $this->container['channel'];
    }

    /**
     * Sets channel
     *
     * @param string $channel channel
     *
     * @return self
     */
    public function setChannel($channel)
    {
        $allowedValues = $this->getChannelAllowableValues();
        if (!in_array($channel, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'channel', must be one of '%s'",
                    $channel,
                    implode("', '", $allowedValues)
                )
            );
        }

        if (is_null($channel)) {
            throw new \InvalidArgumentException('non-nullable channel cannot be null');
        }

        $this->container['channel'] = $channel;

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


