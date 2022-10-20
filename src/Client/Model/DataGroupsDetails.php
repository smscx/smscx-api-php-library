<?php
/**
 * DataGroupsDetails
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
 * DataGroupsDetails Class Doc Comment
 *
 * @category Class
 * @package  Smscx
 * @author   SMS Connexion
 * @link     https://sms.cx
 * @implements \ArrayAccess<string, mixed>
 */
class DataGroupsDetails implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $clientModelName = 'DataGroupsDetails';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $clientTypes = [
        'id' => 'string',
        'phone_number' => 'string',
        'country_iso' => 'string',
        'first_name' => 'string',
        'last_name' => 'string',
        'email' => 'string',
        'field1' => 'string',
        'field2' => 'string',
        'field3' => 'string',
        'field4' => 'string',
        'field5' => 'string',
        'group_id' => 'int',
        'optout' => 'bool',
        'custom_fields' => '\Smscx\Client\Model\CustomFieldsObj',
        'date_added' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $clientFormats = [
        'id' => 'uuid',
        'phone_number' => null,
        'country_iso' => null,
        'first_name' => null,
        'last_name' => null,
        'email' => null,
        'field1' => null,
        'field2' => null,
        'field3' => null,
        'field4' => null,
        'field5' => null,
        'group_id' => null,
        'optout' => null,
        'custom_fields' => null,
        'date_added' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $clientNullables = [
        'id' => false,
		'phone_number' => false,
		'country_iso' => false,
		'first_name' => true,
		'last_name' => true,
		'email' => true,
		'field1' => true,
		'field2' => true,
		'field3' => true,
		'field4' => true,
		'field5' => true,
		'group_id' => false,
		'optout' => false,
		'custom_fields' => false,
		'date_added' => false
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
        'id' => 'id',
        'phone_number' => 'phoneNumber',
        'country_iso' => 'countryIso',
        'first_name' => 'firstName',
        'last_name' => 'lastName',
        'email' => 'email',
        'field1' => 'field1',
        'field2' => 'field2',
        'field3' => 'field3',
        'field4' => 'field4',
        'field5' => 'field5',
        'group_id' => 'groupId',
        'optout' => 'optout',
        'custom_fields' => 'customFields',
        'date_added' => 'dateAdded'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'phone_number' => 'setPhoneNumber',
        'country_iso' => 'setCountryIso',
        'first_name' => 'setFirstName',
        'last_name' => 'setLastName',
        'email' => 'setEmail',
        'field1' => 'setField1',
        'field2' => 'setField2',
        'field3' => 'setField3',
        'field4' => 'setField4',
        'field5' => 'setField5',
        'group_id' => 'setGroupId',
        'optout' => 'setOptout',
        'custom_fields' => 'setCustomFields',
        'date_added' => 'setDateAdded'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'phone_number' => 'getPhoneNumber',
        'country_iso' => 'getCountryIso',
        'first_name' => 'getFirstName',
        'last_name' => 'getLastName',
        'email' => 'getEmail',
        'field1' => 'getField1',
        'field2' => 'getField2',
        'field3' => 'getField3',
        'field4' => 'getField4',
        'field5' => 'getField5',
        'group_id' => 'getGroupId',
        'optout' => 'getOptout',
        'custom_fields' => 'getCustomFields',
        'date_added' => 'getDateAdded'
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
        $this->setIfExists('id', $data ?? [], null);
        $this->setIfExists('phone_number', $data ?? [], null);
        $this->setIfExists('country_iso', $data ?? [], null);
        $this->setIfExists('first_name', $data ?? [], null);
        $this->setIfExists('last_name', $data ?? [], null);
        $this->setIfExists('email', $data ?? [], null);
        $this->setIfExists('field1', $data ?? [], null);
        $this->setIfExists('field2', $data ?? [], null);
        $this->setIfExists('field3', $data ?? [], null);
        $this->setIfExists('field4', $data ?? [], null);
        $this->setIfExists('field5', $data ?? [], null);
        $this->setIfExists('group_id', $data ?? [], null);
        $this->setIfExists('optout', $data ?? [], null);
        $this->setIfExists('custom_fields', $data ?? [], null);
        $this->setIfExists('date_added', $data ?? [], null);
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

        if ($this->container['id'] === null) {
            $invalidProperties[] = "'id' can't be null";
        }
        if ((mb_strlen($this->container['id']) > 36)) {
            $invalidProperties[] = "invalid value for 'id', the character length must be smaller than or equal to 36.";
        }

        if ((mb_strlen($this->container['id']) < 36)) {
            $invalidProperties[] = "invalid value for 'id', the character length must be bigger than or equal to 36.";
        }

        if (!preg_match("/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/", $this->container['id'])) {
            $invalidProperties[] = "invalid value for 'id', must be conform to the pattern /^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/.";
        }

        if ($this->container['phone_number'] === null) {
            $invalidProperties[] = "'phone_number' can't be null";
        }
        if ($this->container['country_iso'] === null) {
            $invalidProperties[] = "'country_iso' can't be null";
        }
        if ($this->container['first_name'] === null) {
            $invalidProperties[] = "'first_name' can't be null";
        }
        if ($this->container['last_name'] === null) {
            $invalidProperties[] = "'last_name' can't be null";
        }
        if ($this->container['email'] === null) {
            $invalidProperties[] = "'email' can't be null";
        }
        if ($this->container['field1'] === null) {
            $invalidProperties[] = "'field1' can't be null";
        }
        if ($this->container['field2'] === null) {
            $invalidProperties[] = "'field2' can't be null";
        }
        if ($this->container['field3'] === null) {
            $invalidProperties[] = "'field3' can't be null";
        }
        if ($this->container['field4'] === null) {
            $invalidProperties[] = "'field4' can't be null";
        }
        if ($this->container['field5'] === null) {
            $invalidProperties[] = "'field5' can't be null";
        }
        if ($this->container['group_id'] === null) {
            $invalidProperties[] = "'group_id' can't be null";
        }
        if ($this->container['optout'] === null) {
            $invalidProperties[] = "'optout' can't be null";
        }
        if ($this->container['date_added'] === null) {
            $invalidProperties[] = "'date_added' can't be null";
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
     * Gets id
     *
     * @return string
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param string $id id
     *
     * @return self
     */
    public function setId($id)
    {
        if ((mb_strlen($id) > 36)) {
            throw new \InvalidArgumentException('invalid length for $id when calling DataGroupsDetails., must be smaller than or equal to 36.');
        }
        if ((mb_strlen($id) < 36)) {
            throw new \InvalidArgumentException('invalid length for $id when calling DataGroupsDetails., must be bigger than or equal to 36.');
        }
        if ((!preg_match("/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/", $id))) {
            throw new \InvalidArgumentException("invalid value for \$id when calling DataGroupsDetails., must conform to the pattern /^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/.");
        }


        if (is_null($id)) {
            throw new \InvalidArgumentException('non-nullable id cannot be null');
        }

        $this->container['id'] = $id;

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
     * @param string $phone_number phone_number
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
     * @param string $country_iso country_iso
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
     * @param string $first_name first_name
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
     * @param string $last_name last_name
     *
     * @return self
     */
    public function setLastName($last_name)
    {

        if (is_null($last_name)) {
            array_push($this->clientNullablesSetToNull, 'last_name');
        } else {
            $nullablesSetToNull = $this->getClientNullablesSetToNull();
            $index = array_search('last_name', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setClientNullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['last_name'] = $last_name;

        return $this;
    }

    /**
     * Gets email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->container['email'];
    }

    /**
     * Sets email
     *
     * @param string $email email
     *
     * @return self
     */
    public function setEmail($email)
    {

        if (is_null($email)) {
            array_push($this->clientNullablesSetToNull, 'email');
        } else {
            $nullablesSetToNull = $this->getClientNullablesSetToNull();
            $index = array_search('email', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setClientNullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['email'] = $email;

        return $this;
    }

    /**
     * Gets field1
     *
     * @return string
     */
    public function getField1()
    {
        return $this->container['field1'];
    }

    /**
     * Sets field1
     *
     * @param string $field1 field1
     *
     * @return self
     */
    public function setField1($field1)
    {

        if (is_null($field1)) {
            array_push($this->clientNullablesSetToNull, 'field1');
        } else {
            $nullablesSetToNull = $this->getClientNullablesSetToNull();
            $index = array_search('field1', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setClientNullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['field1'] = $field1;

        return $this;
    }

    /**
     * Gets field2
     *
     * @return string
     */
    public function getField2()
    {
        return $this->container['field2'];
    }

    /**
     * Sets field2
     *
     * @param string $field2 field2
     *
     * @return self
     */
    public function setField2($field2)
    {

        if (is_null($field2)) {
            array_push($this->clientNullablesSetToNull, 'field2');
        } else {
            $nullablesSetToNull = $this->getClientNullablesSetToNull();
            $index = array_search('field2', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setClientNullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['field2'] = $field2;

        return $this;
    }

    /**
     * Gets field3
     *
     * @return string
     */
    public function getField3()
    {
        return $this->container['field3'];
    }

    /**
     * Sets field3
     *
     * @param string $field3 field3
     *
     * @return self
     */
    public function setField3($field3)
    {

        if (is_null($field3)) {
            array_push($this->clientNullablesSetToNull, 'field3');
        } else {
            $nullablesSetToNull = $this->getClientNullablesSetToNull();
            $index = array_search('field3', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setClientNullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['field3'] = $field3;

        return $this;
    }

    /**
     * Gets field4
     *
     * @return string
     */
    public function getField4()
    {
        return $this->container['field4'];
    }

    /**
     * Sets field4
     *
     * @param string $field4 field4
     *
     * @return self
     */
    public function setField4($field4)
    {

        if (is_null($field4)) {
            array_push($this->clientNullablesSetToNull, 'field4');
        } else {
            $nullablesSetToNull = $this->getClientNullablesSetToNull();
            $index = array_search('field4', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setClientNullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['field4'] = $field4;

        return $this;
    }

    /**
     * Gets field5
     *
     * @return string
     */
    public function getField5()
    {
        return $this->container['field5'];
    }

    /**
     * Sets field5
     *
     * @param string $field5 field5
     *
     * @return self
     */
    public function setField5($field5)
    {

        if (is_null($field5)) {
            array_push($this->clientNullablesSetToNull, 'field5');
        } else {
            $nullablesSetToNull = $this->getClientNullablesSetToNull();
            $index = array_search('field5', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setClientNullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['field5'] = $field5;

        return $this;
    }

    /**
     * Gets group_id
     *
     * @return int
     */
    public function getGroupId()
    {
        return $this->container['group_id'];
    }

    /**
     * Sets group_id
     *
     * @param int $group_id group_id
     *
     * @return self
     */
    public function setGroupId($group_id)
    {

        if (is_null($group_id)) {
            throw new \InvalidArgumentException('non-nullable group_id cannot be null');
        }

        $this->container['group_id'] = $group_id;

        return $this;
    }

    /**
     * Gets optout
     *
     * @return bool
     */
    public function getOptout()
    {
        return $this->container['optout'];
    }

    /**
     * Sets optout
     *
     * @param bool $optout optout
     *
     * @return self
     */
    public function setOptout($optout)
    {

        if (is_null($optout)) {
            throw new \InvalidArgumentException('non-nullable optout cannot be null');
        }

        $this->container['optout'] = $optout;

        return $this;
    }

    /**
     * Gets custom_fields
     *
     * @return \Smscx\Client\Model\CustomFieldsObj|null
     */
    public function getCustomFields()
    {
        return $this->container['custom_fields'];
    }

    /**
     * Sets custom_fields
     *
     * @param \Smscx\Client\Model\CustomFieldsObj|null $custom_fields custom_fields
     *
     * @return self
     */
    public function setCustomFields($custom_fields)
    {

        if (is_null($custom_fields)) {
            throw new \InvalidArgumentException('non-nullable custom_fields cannot be null');
        }

        $this->container['custom_fields'] = $custom_fields;

        return $this;
    }

    /**
     * Gets date_added
     *
     * @return string
     */
    public function getDateAdded()
    {
        return $this->container['date_added'];
    }

    /**
     * Sets date_added
     *
     * @param string $date_added date_added
     *
     * @return self
     */
    public function setDateAdded($date_added)
    {

        if (is_null($date_added)) {
            throw new \InvalidArgumentException('non-nullable date_added cannot be null');
        }

        $this->container['date_added'] = $date_added;

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


