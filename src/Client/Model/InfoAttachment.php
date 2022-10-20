<?php
/**
 * InfoAttachment
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
 * InfoAttachment Class Doc Comment
 *
 * @category Class
 * @package  Smscx
 * @author   SMS Connexion
 * @link     https://sms.cx
 * @implements \ArrayAccess<string, mixed>
 */
class InfoAttachment implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $clientModelName = 'InfoAttachment';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $clientTypes = [
        'id' => 'string',
        'name' => 'string',
        'short_url' => 'string',
        'file_url' => 'string',
        'file_type' => 'string',
        'date_created' => 'string',
        'hits' => 'int'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $clientFormats = [
        'id' => null,
        'name' => null,
        'short_url' => null,
        'file_url' => null,
        'file_type' => null,
        'date_created' => null,
        'hits' => 'int32'
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $clientNullables = [
        'id' => false,
		'name' => false,
		'short_url' => false,
		'file_url' => false,
		'file_type' => false,
		'date_created' => false,
		'hits' => false
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
        'name' => 'name',
        'short_url' => 'shortUrl',
        'file_url' => 'fileUrl',
        'file_type' => 'fileType',
        'date_created' => 'dateCreated',
        'hits' => 'hits'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'name' => 'setName',
        'short_url' => 'setShortUrl',
        'file_url' => 'setFileUrl',
        'file_type' => 'setFileType',
        'date_created' => 'setDateCreated',
        'hits' => 'setHits'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'name' => 'getName',
        'short_url' => 'getShortUrl',
        'file_url' => 'getFileUrl',
        'file_type' => 'getFileType',
        'date_created' => 'getDateCreated',
        'hits' => 'getHits'
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
        $this->setIfExists('name', $data ?? [], null);
        $this->setIfExists('short_url', $data ?? [], null);
        $this->setIfExists('file_url', $data ?? [], null);
        $this->setIfExists('file_type', $data ?? [], null);
        $this->setIfExists('date_created', $data ?? [], null);
        $this->setIfExists('hits', $data ?? [], null);
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
        if ($this->container['name'] === null) {
            $invalidProperties[] = "'name' can't be null";
        }
        if ($this->container['short_url'] === null) {
            $invalidProperties[] = "'short_url' can't be null";
        }
        if ($this->container['file_url'] === null) {
            $invalidProperties[] = "'file_url' can't be null";
        }
        if ($this->container['file_type'] === null) {
            $invalidProperties[] = "'file_type' can't be null";
        }
        if ($this->container['date_created'] === null) {
            $invalidProperties[] = "'date_created' can't be null";
        }
        if ($this->container['hits'] === null) {
            $invalidProperties[] = "'hits' can't be null";
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

        if (is_null($id)) {
            throw new \InvalidArgumentException('non-nullable id cannot be null');
        }

        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets name
     *
     * @return string
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string $name name
     *
     * @return self
     */
    public function setName($name)
    {

        if (is_null($name)) {
            throw new \InvalidArgumentException('non-nullable name cannot be null');
        }

        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets short_url
     *
     * @return string
     */
    public function getShortUrl()
    {
        return $this->container['short_url'];
    }

    /**
     * Sets short_url
     *
     * @param string $short_url short_url
     *
     * @return self
     */
    public function setShortUrl($short_url)
    {

        if (is_null($short_url)) {
            throw new \InvalidArgumentException('non-nullable short_url cannot be null');
        }

        $this->container['short_url'] = $short_url;

        return $this;
    }

    /**
     * Gets file_url
     *
     * @return string
     */
    public function getFileUrl()
    {
        return $this->container['file_url'];
    }

    /**
     * Sets file_url
     *
     * @param string $file_url file_url
     *
     * @return self
     */
    public function setFileUrl($file_url)
    {

        if (is_null($file_url)) {
            throw new \InvalidArgumentException('non-nullable file_url cannot be null');
        }

        $this->container['file_url'] = $file_url;

        return $this;
    }

    /**
     * Gets file_type
     *
     * @return string
     */
    public function getFileType()
    {
        return $this->container['file_type'];
    }

    /**
     * Sets file_type
     *
     * @param string $file_type file_type
     *
     * @return self
     */
    public function setFileType($file_type)
    {

        if (is_null($file_type)) {
            throw new \InvalidArgumentException('non-nullable file_type cannot be null');
        }

        $this->container['file_type'] = $file_type;

        return $this;
    }

    /**
     * Gets date_created
     *
     * @return string
     */
    public function getDateCreated()
    {
        return $this->container['date_created'];
    }

    /**
     * Sets date_created
     *
     * @param string $date_created date_created
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
     * Gets hits
     *
     * @return int
     */
    public function getHits()
    {
        return $this->container['hits'];
    }

    /**
     * Sets hits
     *
     * @param int $hits hits
     *
     * @return self
     */
    public function setHits($hits)
    {

        if (is_null($hits)) {
            throw new \InvalidArgumentException('non-nullable hits cannot be null');
        }

        $this->container['hits'] = $hits;

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


