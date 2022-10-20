<?php
/**
 * TransliterationAnalysis
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
 * TransliterationAnalysis Class Doc Comment
 *
 * @category Class
 * @description Analysis of the tansliteration. Includes parts and cost of the original text, the transliterated text.
 * @package  Smscx
 * @author   SMS Connexion
 * @link     https://sms.cx
 * @implements \ArrayAccess<string, mixed>
 */
class TransliterationAnalysis implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $clientModelName = 'TransliterationAnalysis';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $clientTypes = [
        'total_original_cost' => 'float',
        'total_original_parts' => 'int',
        'total_replaced_cost' => 'float',
        'total_replaced_parts' => 'int',
        'total_cost_saved' => 'int',
        'total_parts_saved' => 'int',
        'text' => '\Smscx\Client\Model\Text'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $clientFormats = [
        'total_original_cost' => null,
        'total_original_parts' => 'int32',
        'total_replaced_cost' => null,
        'total_replaced_parts' => 'int32',
        'total_cost_saved' => 'number',
        'total_parts_saved' => 'int32',
        'text' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $clientNullables = [
        'total_original_cost' => false,
		'total_original_parts' => false,
		'total_replaced_cost' => false,
		'total_replaced_parts' => false,
		'total_cost_saved' => false,
		'total_parts_saved' => false,
		'text' => false
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
        'total_original_cost' => 'totalOriginalCost',
        'total_original_parts' => 'totalOriginalParts',
        'total_replaced_cost' => 'totalReplacedCost',
        'total_replaced_parts' => 'totalReplacedParts',
        'total_cost_saved' => 'totalCostSaved',
        'total_parts_saved' => 'totalPartsSaved',
        'text' => 'text'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'total_original_cost' => 'setTotalOriginalCost',
        'total_original_parts' => 'setTotalOriginalParts',
        'total_replaced_cost' => 'setTotalReplacedCost',
        'total_replaced_parts' => 'setTotalReplacedParts',
        'total_cost_saved' => 'setTotalCostSaved',
        'total_parts_saved' => 'setTotalPartsSaved',
        'text' => 'setText'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'total_original_cost' => 'getTotalOriginalCost',
        'total_original_parts' => 'getTotalOriginalParts',
        'total_replaced_cost' => 'getTotalReplacedCost',
        'total_replaced_parts' => 'getTotalReplacedParts',
        'total_cost_saved' => 'getTotalCostSaved',
        'total_parts_saved' => 'getTotalPartsSaved',
        'text' => 'getText'
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
        $this->setIfExists('total_original_cost', $data ?? [], null);
        $this->setIfExists('total_original_parts', $data ?? [], null);
        $this->setIfExists('total_replaced_cost', $data ?? [], null);
        $this->setIfExists('total_replaced_parts', $data ?? [], null);
        $this->setIfExists('total_cost_saved', $data ?? [], null);
        $this->setIfExists('total_parts_saved', $data ?? [], null);
        $this->setIfExists('text', $data ?? [], null);
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

        if ($this->container['total_original_cost'] === null) {
            $invalidProperties[] = "'total_original_cost' can't be null";
        }
        if ($this->container['total_original_parts'] === null) {
            $invalidProperties[] = "'total_original_parts' can't be null";
        }
        if ($this->container['total_replaced_cost'] === null) {
            $invalidProperties[] = "'total_replaced_cost' can't be null";
        }
        if ($this->container['total_replaced_parts'] === null) {
            $invalidProperties[] = "'total_replaced_parts' can't be null";
        }
        if ($this->container['total_cost_saved'] === null) {
            $invalidProperties[] = "'total_cost_saved' can't be null";
        }
        if ($this->container['total_parts_saved'] === null) {
            $invalidProperties[] = "'total_parts_saved' can't be null";
        }
        if ($this->container['text'] === null) {
            $invalidProperties[] = "'text' can't be null";
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
     * Gets total_original_cost
     *
     * @return float
     */
    public function getTotalOriginalCost()
    {
        return $this->container['total_original_cost'];
    }

    /**
     * Sets total_original_cost
     *
     * @param float $total_original_cost Total cost of sending the text before the conversion of Unicode characters to GSM alphabet
     *
     * @return self
     */
    public function setTotalOriginalCost($total_original_cost)
    {

        if (is_null($total_original_cost)) {
            throw new \InvalidArgumentException('non-nullable total_original_cost cannot be null');
        }

        $this->container['total_original_cost'] = $total_original_cost;

        return $this;
    }

    /**
     * Gets total_original_parts
     *
     * @return int
     */
    public function getTotalOriginalParts()
    {
        return $this->container['total_original_parts'];
    }

    /**
     * Sets total_original_parts
     *
     * @param int $total_original_parts Total parts before the conversion of Unicode characters to GSM alphabet
     *
     * @return self
     */
    public function setTotalOriginalParts($total_original_parts)
    {

        if (is_null($total_original_parts)) {
            throw new \InvalidArgumentException('non-nullable total_original_parts cannot be null');
        }

        $this->container['total_original_parts'] = $total_original_parts;

        return $this;
    }

    /**
     * Gets total_replaced_cost
     *
     * @return float
     */
    public function getTotalReplacedCost()
    {
        return $this->container['total_replaced_cost'];
    }

    /**
     * Sets total_replaced_cost
     *
     * @param float $total_replaced_cost Total cost of sending the text with the converted (replaced) text
     *
     * @return self
     */
    public function setTotalReplacedCost($total_replaced_cost)
    {

        if (is_null($total_replaced_cost)) {
            throw new \InvalidArgumentException('non-nullable total_replaced_cost cannot be null');
        }

        $this->container['total_replaced_cost'] = $total_replaced_cost;

        return $this;
    }

    /**
     * Gets total_replaced_parts
     *
     * @return int
     */
    public function getTotalReplacedParts()
    {
        return $this->container['total_replaced_parts'];
    }

    /**
     * Sets total_replaced_parts
     *
     * @param int $total_replaced_parts Total parts of the sending with the converted (replaced) text
     *
     * @return self
     */
    public function setTotalReplacedParts($total_replaced_parts)
    {

        if (is_null($total_replaced_parts)) {
            throw new \InvalidArgumentException('non-nullable total_replaced_parts cannot be null');
        }

        $this->container['total_replaced_parts'] = $total_replaced_parts;

        return $this;
    }

    /**
     * Gets total_cost_saved
     *
     * @return int
     */
    public function getTotalCostSaved()
    {
        return $this->container['total_cost_saved'];
    }

    /**
     * Sets total_cost_saved
     *
     * @param int $total_cost_saved Total cost saved by sending with the text converted to GSM-7 alphabet
     *
     * @return self
     */
    public function setTotalCostSaved($total_cost_saved)
    {

        if (is_null($total_cost_saved)) {
            throw new \InvalidArgumentException('non-nullable total_cost_saved cannot be null');
        }

        $this->container['total_cost_saved'] = $total_cost_saved;

        return $this;
    }

    /**
     * Gets total_parts_saved
     *
     * @return int
     */
    public function getTotalPartsSaved()
    {
        return $this->container['total_parts_saved'];
    }

    /**
     * Sets total_parts_saved
     *
     * @param int $total_parts_saved Total parts saved by sending with the text converted to GSM-7 alphabet
     *
     * @return self
     */
    public function setTotalPartsSaved($total_parts_saved)
    {

        if (is_null($total_parts_saved)) {
            throw new \InvalidArgumentException('non-nullable total_parts_saved cannot be null');
        }

        $this->container['total_parts_saved'] = $total_parts_saved;

        return $this;
    }

    /**
     * Gets text
     *
     * @return \Smscx\Client\Model\Text
     */
    public function getText()
    {
        return $this->container['text'];
    }

    /**
     * Sets text
     *
     * @param \Smscx\Client\Model\Text $text text
     *
     * @return self
     */
    public function setText($text)
    {

        if (is_null($text)) {
            throw new \InvalidArgumentException('non-nullable text cannot be null');
        }

        $this->container['text'] = $text;

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


