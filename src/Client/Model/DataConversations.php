<?php
/**
 * DataConversations
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
 * DataConversations Class Doc Comment
 *
 * @category Class
 * @package  Smscx
 * @author   SMS Connexion
 * @link     https://sms.cx
 * @implements \ArrayAccess<string, mixed>
 */
class DataConversations implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $clientModelName = 'DataConversations';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $clientTypes = [
        'conversation_id' => 'string',
        'phone_number' => 'string',
        'country_iso' => 'string',
        'first_name' => 'string',
        'last_name' => 'string',
        'unread_messages' => 'int',
        'last_reply' => 'string',
        'last_update' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $clientFormats = [
        'conversation_id' => 'uuid',
        'phone_number' => null,
        'country_iso' => null,
        'first_name' => null,
        'last_name' => null,
        'unread_messages' => 'int32',
        'last_reply' => null,
        'last_update' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $clientNullables = [
        'conversation_id' => false,
		'phone_number' => false,
		'country_iso' => false,
		'first_name' => true,
		'last_name' => false,
		'unread_messages' => false,
		'last_reply' => false,
		'last_update' => false
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
        'conversation_id' => 'conversationId',
        'phone_number' => 'phoneNumber',
        'country_iso' => 'countryIso',
        'first_name' => 'firstName',
        'last_name' => 'lastName',
        'unread_messages' => 'unreadMessages',
        'last_reply' => 'lastReply',
        'last_update' => 'lastUpdate'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'conversation_id' => 'setConversationId',
        'phone_number' => 'setPhoneNumber',
        'country_iso' => 'setCountryIso',
        'first_name' => 'setFirstName',
        'last_name' => 'setLastName',
        'unread_messages' => 'setUnreadMessages',
        'last_reply' => 'setLastReply',
        'last_update' => 'setLastUpdate'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'conversation_id' => 'getConversationId',
        'phone_number' => 'getPhoneNumber',
        'country_iso' => 'getCountryIso',
        'first_name' => 'getFirstName',
        'last_name' => 'getLastName',
        'unread_messages' => 'getUnreadMessages',
        'last_reply' => 'getLastReply',
        'last_update' => 'getLastUpdate'
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
        $this->setIfExists('conversation_id', $data ?? [], null);
        $this->setIfExists('phone_number', $data ?? [], null);
        $this->setIfExists('country_iso', $data ?? [], null);
        $this->setIfExists('first_name', $data ?? [], null);
        $this->setIfExists('last_name', $data ?? [], null);
        $this->setIfExists('unread_messages', $data ?? [], null);
        $this->setIfExists('last_reply', $data ?? [], null);
        $this->setIfExists('last_update', $data ?? [], null);
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

        if ($this->container['conversation_id'] === null) {
            $invalidProperties[] = "'conversation_id' can't be null";
        }
        if ((mb_strlen($this->container['conversation_id']) > 36)) {
            $invalidProperties[] = "invalid value for 'conversation_id', the character length must be smaller than or equal to 36.";
        }

        if ((mb_strlen($this->container['conversation_id']) < 36)) {
            $invalidProperties[] = "invalid value for 'conversation_id', the character length must be bigger than or equal to 36.";
        }

        if (!preg_match("/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/", $this->container['conversation_id'])) {
            $invalidProperties[] = "invalid value for 'conversation_id', must be conform to the pattern /^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/.";
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

        if ($this->container['first_name'] === null) {
            $invalidProperties[] = "'first_name' can't be null";
        }
        if ($this->container['last_name'] === null) {
            $invalidProperties[] = "'last_name' can't be null";
        }
        if ($this->container['unread_messages'] === null) {
            $invalidProperties[] = "'unread_messages' can't be null";
        }
        if ($this->container['last_reply'] === null) {
            $invalidProperties[] = "'last_reply' can't be null";
        }
        if ($this->container['last_update'] === null) {
            $invalidProperties[] = "'last_update' can't be null";
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
     * Gets conversation_id
     *
     * @return string
     */
    public function getConversationId()
    {
        return $this->container['conversation_id'];
    }

    /**
     * Sets conversation_id
     *
     * @param string $conversation_id Unique identifier of the conversation
     *
     * @return self
     */
    public function setConversationId($conversation_id)
    {
        if ((mb_strlen($conversation_id) > 36)) {
            throw new \InvalidArgumentException('invalid length for $conversation_id when calling DataConversations., must be smaller than or equal to 36.');
        }
        if ((mb_strlen($conversation_id) < 36)) {
            throw new \InvalidArgumentException('invalid length for $conversation_id when calling DataConversations., must be bigger than or equal to 36.');
        }
        if ((!preg_match("/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/", $conversation_id))) {
            throw new \InvalidArgumentException("invalid value for \$conversation_id when calling DataConversations., must conform to the pattern /^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/.");
        }


        if (is_null($conversation_id)) {
            throw new \InvalidArgumentException('non-nullable conversation_id cannot be null');
        }

        $this->container['conversation_id'] = $conversation_id;

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
            throw new \InvalidArgumentException('invalid length for $country_iso when calling DataConversations., must be smaller than or equal to 2.');
        }
        if ((mb_strlen($country_iso) < 2)) {
            throw new \InvalidArgumentException('invalid length for $country_iso when calling DataConversations., must be bigger than or equal to 2.');
        }


        if (is_null($country_iso)) {
            throw new \InvalidArgumentException('non-nullable country_iso cannot be null');
        }

        $this->container['country_iso'] = $country_iso;

        return $this;
    }

    /**
     * Gets first_name
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->container['first_name'];
    }

    /**
     * Sets first_name
     *
     * @param string $first_name First name of the contact
     *
     * @return self
     */
    public function setFirstName($first_name)
    {

        if (is_null($first_name)) {
            array_push($this->clientNullablesSetToNull, 'first_name');
        } else {
            $nullablesSetToNull = $this->getClientNullablesSetToNull();
            $index = array_search('first_name', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setClientNullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['first_name'] = $first_name;

        return $this;
    }

    /**
     * Gets last_name
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->container['last_name'];
    }

    /**
     * Sets last_name
     *
     * @param string $last_name Last name of the contact
     *
     * @return self
     */
    public function setLastName($last_name)
    {

        if (is_null($last_name)) {
            throw new \InvalidArgumentException('non-nullable last_name cannot be null');
        }

        $this->container['last_name'] = $last_name;

        return $this;
    }

    /**
     * Gets unread_messages
     *
     * @return int
     */
    public function getUnreadMessages()
    {
        return $this->container['unread_messages'];
    }

    /**
     * Sets unread_messages
     *
     * @param int $unread_messages New messages in this conversation that were not read
     *
     * @return self
     */
    public function setUnreadMessages($unread_messages)
    {

        if (is_null($unread_messages)) {
            throw new \InvalidArgumentException('non-nullable unread_messages cannot be null');
        }

        $this->container['unread_messages'] = $unread_messages;

        return $this;
    }

    /**
     * Gets last_reply
     *
     * @return string
     */
    public function getLastReply()
    {
        return $this->container['last_reply'];
    }

    /**
     * Sets last_reply
     *
     * @param string $last_reply Preview of the last message in the converstion
     *
     * @return self
     */
    public function setLastReply($last_reply)
    {

        if (is_null($last_reply)) {
            throw new \InvalidArgumentException('non-nullable last_reply cannot be null');
        }

        $this->container['last_reply'] = $last_reply;

        return $this;
    }

    /**
     * Gets last_update
     *
     * @return string
     */
    public function getLastUpdate()
    {
        return $this->container['last_update'];
    }

    /**
     * Sets last_update
     *
     * @param string $last_update Date and time of last reply from the contact to this conversation
     *
     * @return self
     */
    public function setLastUpdate($last_update)
    {

        if (is_null($last_update)) {
            throw new \InvalidArgumentException('non-nullable last_update cannot be null');
        }

        $this->container['last_update'] = $last_update;

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


