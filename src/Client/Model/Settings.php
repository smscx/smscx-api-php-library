<?php
/**
 * Settings
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
 * Settings Class Doc Comment
 *
 * @category Class
 * @package  Smscx
 * @author   SMS Connexion
 * @link     https://sms.cx
 * @implements \ArrayAccess<string, mixed>
 */
class Settings implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $clientModelName = 'Settings';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $clientTypes = [
        'sms' => '\Smscx\Client\Model\Sms',
        'viber' => '\Smscx\Client\Model\Viber',
        'whatsapp' => '\Smscx\Client\Model\Whatsapp',
        'multichannel' => '\Smscx\Client\Model\Multichannel',
        'shortlinks' => '\Smscx\Client\Model\Shortlinks',
        'attachments' => '\Smscx\Client\Model\Attachments',
        'optouts' => '\Smscx\Client\Model\Optouts',
        'lookup' => '\Smscx\Client\Model\Lookup',
        'otp' => '\Smscx\Client\Model\Otp'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $clientFormats = [
        'sms' => null,
        'viber' => null,
        'whatsapp' => null,
        'multichannel' => null,
        'shortlinks' => null,
        'attachments' => null,
        'optouts' => null,
        'lookup' => null,
        'otp' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $clientNullables = [
        'sms' => false,
		'viber' => false,
		'whatsapp' => false,
		'multichannel' => false,
		'shortlinks' => false,
		'attachments' => false,
		'optouts' => false,
		'lookup' => false,
		'otp' => false
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
        'sms' => 'sms',
        'viber' => 'viber',
        'whatsapp' => 'whatsapp',
        'multichannel' => 'multichannel',
        'shortlinks' => 'shortlinks',
        'attachments' => 'attachments',
        'optouts' => 'optouts',
        'lookup' => 'lookup',
        'otp' => 'otp'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'sms' => 'setSms',
        'viber' => 'setViber',
        'whatsapp' => 'setWhatsapp',
        'multichannel' => 'setMultichannel',
        'shortlinks' => 'setShortlinks',
        'attachments' => 'setAttachments',
        'optouts' => 'setOptouts',
        'lookup' => 'setLookup',
        'otp' => 'setOtp'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'sms' => 'getSms',
        'viber' => 'getViber',
        'whatsapp' => 'getWhatsapp',
        'multichannel' => 'getMultichannel',
        'shortlinks' => 'getShortlinks',
        'attachments' => 'getAttachments',
        'optouts' => 'getOptouts',
        'lookup' => 'getLookup',
        'otp' => 'getOtp'
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
        $this->setIfExists('sms', $data ?? [], null);
        $this->setIfExists('viber', $data ?? [], null);
        $this->setIfExists('whatsapp', $data ?? [], null);
        $this->setIfExists('multichannel', $data ?? [], null);
        $this->setIfExists('shortlinks', $data ?? [], null);
        $this->setIfExists('attachments', $data ?? [], null);
        $this->setIfExists('optouts', $data ?? [], null);
        $this->setIfExists('lookup', $data ?? [], null);
        $this->setIfExists('otp', $data ?? [], null);
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

        if ($this->container['sms'] === null) {
            $invalidProperties[] = "'sms' can't be null";
        }
        if ($this->container['viber'] === null) {
            $invalidProperties[] = "'viber' can't be null";
        }
        if ($this->container['whatsapp'] === null) {
            $invalidProperties[] = "'whatsapp' can't be null";
        }
        if ($this->container['multichannel'] === null) {
            $invalidProperties[] = "'multichannel' can't be null";
        }
        if ($this->container['shortlinks'] === null) {
            $invalidProperties[] = "'shortlinks' can't be null";
        }
        if ($this->container['attachments'] === null) {
            $invalidProperties[] = "'attachments' can't be null";
        }
        if ($this->container['optouts'] === null) {
            $invalidProperties[] = "'optouts' can't be null";
        }
        if ($this->container['lookup'] === null) {
            $invalidProperties[] = "'lookup' can't be null";
        }
        if ($this->container['otp'] === null) {
            $invalidProperties[] = "'otp' can't be null";
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
     * Gets sms
     *
     * @return \Smscx\Client\Model\Sms
     */
    public function getSms()
    {
        return $this->container['sms'];
    }

    /**
     * Sets sms
     *
     * @param \Smscx\Client\Model\Sms $sms sms
     *
     * @return self
     */
    public function setSms($sms)
    {

        if (is_null($sms)) {
            throw new \InvalidArgumentException('non-nullable sms cannot be null');
        }

        $this->container['sms'] = $sms;

        return $this;
    }

    /**
     * Gets viber
     *
     * @return \Smscx\Client\Model\Viber
     */
    public function getViber()
    {
        return $this->container['viber'];
    }

    /**
     * Sets viber
     *
     * @param \Smscx\Client\Model\Viber $viber viber
     *
     * @return self
     */
    public function setViber($viber)
    {

        if (is_null($viber)) {
            throw new \InvalidArgumentException('non-nullable viber cannot be null');
        }

        $this->container['viber'] = $viber;

        return $this;
    }

    /**
     * Gets whatsapp
     *
     * @return \Smscx\Client\Model\Whatsapp
     */
    public function getWhatsapp()
    {
        return $this->container['whatsapp'];
    }

    /**
     * Sets whatsapp
     *
     * @param \Smscx\Client\Model\Whatsapp $whatsapp whatsapp
     *
     * @return self
     */
    public function setWhatsapp($whatsapp)
    {

        if (is_null($whatsapp)) {
            throw new \InvalidArgumentException('non-nullable whatsapp cannot be null');
        }

        $this->container['whatsapp'] = $whatsapp;

        return $this;
    }

    /**
     * Gets multichannel
     *
     * @return \Smscx\Client\Model\Multichannel
     */
    public function getMultichannel()
    {
        return $this->container['multichannel'];
    }

    /**
     * Sets multichannel
     *
     * @param \Smscx\Client\Model\Multichannel $multichannel multichannel
     *
     * @return self
     */
    public function setMultichannel($multichannel)
    {

        if (is_null($multichannel)) {
            throw new \InvalidArgumentException('non-nullable multichannel cannot be null');
        }

        $this->container['multichannel'] = $multichannel;

        return $this;
    }

    /**
     * Gets shortlinks
     *
     * @return \Smscx\Client\Model\Shortlinks
     */
    public function getShortlinks()
    {
        return $this->container['shortlinks'];
    }

    /**
     * Sets shortlinks
     *
     * @param \Smscx\Client\Model\Shortlinks $shortlinks shortlinks
     *
     * @return self
     */
    public function setShortlinks($shortlinks)
    {

        if (is_null($shortlinks)) {
            throw new \InvalidArgumentException('non-nullable shortlinks cannot be null');
        }

        $this->container['shortlinks'] = $shortlinks;

        return $this;
    }

    /**
     * Gets attachments
     *
     * @return \Smscx\Client\Model\Attachments
     */
    public function getAttachments()
    {
        return $this->container['attachments'];
    }

    /**
     * Sets attachments
     *
     * @param \Smscx\Client\Model\Attachments $attachments attachments
     *
     * @return self
     */
    public function setAttachments($attachments)
    {

        if (is_null($attachments)) {
            throw new \InvalidArgumentException('non-nullable attachments cannot be null');
        }

        $this->container['attachments'] = $attachments;

        return $this;
    }

    /**
     * Gets optouts
     *
     * @return \Smscx\Client\Model\Optouts
     */
    public function getOptouts()
    {
        return $this->container['optouts'];
    }

    /**
     * Sets optouts
     *
     * @param \Smscx\Client\Model\Optouts $optouts optouts
     *
     * @return self
     */
    public function setOptouts($optouts)
    {

        if (is_null($optouts)) {
            throw new \InvalidArgumentException('non-nullable optouts cannot be null');
        }

        $this->container['optouts'] = $optouts;

        return $this;
    }

    /**
     * Gets lookup
     *
     * @return \Smscx\Client\Model\Lookup
     */
    public function getLookup()
    {
        return $this->container['lookup'];
    }

    /**
     * Sets lookup
     *
     * @param \Smscx\Client\Model\Lookup $lookup lookup
     *
     * @return self
     */
    public function setLookup($lookup)
    {

        if (is_null($lookup)) {
            throw new \InvalidArgumentException('non-nullable lookup cannot be null');
        }

        $this->container['lookup'] = $lookup;

        return $this;
    }

    /**
     * Gets otp
     *
     * @return \Smscx\Client\Model\Otp
     */
    public function getOtp()
    {
        return $this->container['otp'];
    }

    /**
     * Sets otp
     *
     * @param \Smscx\Client\Model\Otp $otp otp
     *
     * @return self
     */
    public function setOtp($otp)
    {

        if (is_null($otp)) {
            throw new \InvalidArgumentException('non-nullable otp cannot be null');
        }

        $this->container['otp'] = $otp;

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


