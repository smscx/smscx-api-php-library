<?php
/**
 * GroupAdd
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
 * GroupAdd Class Doc Comment
 *
 * @category Class
 * @package  Smscx
 * @author   SMS Connexion
 * @link     https://sms.cx
 * @implements \ArrayAccess<string, mixed>
 */
class GroupAdd implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $clientModelName = 'GroupAdd';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $clientTypes = [
        'phone_number' => 'string',
        'first_name' => 'string',
        'last_name' => 'string',
        'email' => 'string',
        'field1' => 'string',
        'field2' => 'string',
        'field3' => 'string',
        'field4' => 'string',
        'field5' => 'string',
        'country_iso' => 'string',
        'custom_fields' => '\Smscx\Client\Model\GroupAddCustomFields'
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
        'first_name' => null,
        'last_name' => null,
        'email' => null,
        'field1' => null,
        'field2' => null,
        'field3' => null,
        'field4' => null,
        'field5' => null,
        'country_iso' => null,
        'custom_fields' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $clientNullables = [
        'phone_number' => false,
		'first_name' => false,
		'last_name' => false,
		'email' => false,
		'field1' => false,
		'field2' => false,
		'field3' => false,
		'field4' => false,
		'field5' => false,
		'country_iso' => false,
		'custom_fields' => false
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
        'first_name' => 'firstName',
        'last_name' => 'lastName',
        'email' => 'email',
        'field1' => 'field1',
        'field2' => 'field2',
        'field3' => 'field3',
        'field4' => 'field4',
        'field5' => 'field5',
        'country_iso' => 'countryIso',
        'custom_fields' => 'customFields'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'phone_number' => 'setPhoneNumber',
        'first_name' => 'setFirstName',
        'last_name' => 'setLastName',
        'email' => 'setEmail',
        'field1' => 'setField1',
        'field2' => 'setField2',
        'field3' => 'setField3',
        'field4' => 'setField4',
        'field5' => 'setField5',
        'country_iso' => 'setCountryIso',
        'custom_fields' => 'setCustomFields'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'phone_number' => 'getPhoneNumber',
        'first_name' => 'getFirstName',
        'last_name' => 'getLastName',
        'email' => 'getEmail',
        'field1' => 'getField1',
        'field2' => 'getField2',
        'field3' => 'getField3',
        'field4' => 'getField4',
        'field5' => 'getField5',
        'country_iso' => 'getCountryIso',
        'custom_fields' => 'getCustomFields'
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
        $this->setIfExists('phone_number', $data ?? [], null);
        $this->setIfExists('first_name', $data ?? [], null);
        $this->setIfExists('last_name', $data ?? [], null);
        $this->setIfExists('email', $data ?? [], null);
        $this->setIfExists('field1', $data ?? [], null);
        $this->setIfExists('field2', $data ?? [], null);
        $this->setIfExists('field3', $data ?? [], null);
        $this->setIfExists('field4', $data ?? [], null);
        $this->setIfExists('field5', $data ?? [], null);
        $this->setIfExists('country_iso', $data ?? [], null);
        $this->setIfExists('custom_fields', $data ?? [], null);
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
     * Gets first_name
     *
     * @return string|null
     */
    public function getFirstName()
    {
        return $this->container['first_name'];
    }

    /**
     * Sets first_name
     *
     * @param string|null $first_name Data field for first name of the contact. Use placeholder **{{firstName}}** in text message for data replacement
     *
     * @return self
     */
    public function setFirstName($first_name)
    {

        if (is_null($first_name)) {
            throw new \InvalidArgumentException('non-nullable first_name cannot be null');
        }

        $this->container['first_name'] = $first_name;

        return $this;
    }

    /**
     * Gets last_name
     *
     * @return string|null
     */
    public function getLastName()
    {
        return $this->container['last_name'];
    }

    /**
     * Sets last_name
     *
     * @param string|null $last_name Data field for last name of the contact. Use placeholder **{{lastName}}** in text message for data replacement
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
     * Gets email
     *
     * @return string|null
     */
    public function getEmail()
    {
        return $this->container['email'];
    }

    /**
     * Sets email
     *
     * @param string|null $email Data field for email of the contact. Use placeholder **{{email}}** in text message for data replacement
     *
     * @return self
     */
    public function setEmail($email)
    {

        if (is_null($email)) {
            throw new \InvalidArgumentException('non-nullable email cannot be null');
        }

        $this->container['email'] = $email;

        return $this;
    }

    /**
     * Gets field1
     *
     * @return string|null
     */
    public function getField1()
    {
        return $this->container['field1'];
    }

    /**
     * Sets field1
     *
     * @param string|null $field1 Data field for extra information of the contact. Use placeholder **{{field1}}** in text message for data replacement
     *
     * @return self
     */
    public function setField1($field1)
    {

        if (is_null($field1)) {
            throw new \InvalidArgumentException('non-nullable field1 cannot be null');
        }

        $this->container['field1'] = $field1;

        return $this;
    }

    /**
     * Gets field2
     *
     * @return string|null
     */
    public function getField2()
    {
        return $this->container['field2'];
    }

    /**
     * Sets field2
     *
     * @param string|null $field2 Data field for extra information of the contact. Use placeholder **{{field2}}** in text message for data replacement
     *
     * @return self
     */
    public function setField2($field2)
    {

        if (is_null($field2)) {
            throw new \InvalidArgumentException('non-nullable field2 cannot be null');
        }

        $this->container['field2'] = $field2;

        return $this;
    }

    /**
     * Gets field3
     *
     * @return string|null
     */
    public function getField3()
    {
        return $this->container['field3'];
    }

    /**
     * Sets field3
     *
     * @param string|null $field3 Data field for extra information of the contact. Use placeholder **{{field3}}** in text message for data replacement
     *
     * @return self
     */
    public function setField3($field3)
    {

        if (is_null($field3)) {
            throw new \InvalidArgumentException('non-nullable field3 cannot be null');
        }

        $this->container['field3'] = $field3;

        return $this;
    }

    /**
     * Gets field4
     *
     * @return string|null
     */
    public function getField4()
    {
        return $this->container['field4'];
    }

    /**
     * Sets field4
     *
     * @param string|null $field4 Data field for extra information of the contact. Use placeholder **{{field4}}** in text message for data replacement
     *
     * @return self
     */
    public function setField4($field4)
    {

        if (is_null($field4)) {
            throw new \InvalidArgumentException('non-nullable field4 cannot be null');
        }

        $this->container['field4'] = $field4;

        return $this;
    }

    /**
     * Gets field5
     *
     * @return string|null
     */
    public function getField5()
    {
        return $this->container['field5'];
    }

    /**
     * Sets field5
     *
     * @param string|null $field5 Data field for extra information of the contact. Use placeholder **{{field5}}** in text message for data replacement
     *
     * @return self
     */
    public function setField5($field5)
    {

        if (is_null($field5)) {
            throw new \InvalidArgumentException('non-nullable field5 cannot be null');
        }

        $this->container['field5'] = $field5;

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
     * @param string|null $country_iso Two-letter country ISO of the phone number you want to validate. Please note that if an international E.164 phone number format is provided, the **countryIso** will be ignored
     *
     * @return self
     */
    public function setCountryIso($country_iso)
    {
        if (!is_null($country_iso) && (mb_strlen($country_iso) > 2)) {
            throw new \InvalidArgumentException('invalid length for $country_iso when calling GroupAdd., must be smaller than or equal to 2.');
        }
        if (!is_null($country_iso) && (mb_strlen($country_iso) < 2)) {
            throw new \InvalidArgumentException('invalid length for $country_iso when calling GroupAdd., must be bigger than or equal to 2.');
        }


        if (is_null($country_iso)) {
            throw new \InvalidArgumentException('non-nullable country_iso cannot be null');
        }

        $this->container['country_iso'] = $country_iso;

        return $this;
    }

    /**
     * Gets custom_fields
     *
     * @return \Smscx\Client\Model\GroupAddCustomFields|null
     */
    public function getCustomFields()
    {
        return $this->container['custom_fields'];
    }

    /**
     * Sets custom_fields
     *
     * @param \Smscx\Client\Model\GroupAddCustomFields|null $custom_fields custom_fields
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


