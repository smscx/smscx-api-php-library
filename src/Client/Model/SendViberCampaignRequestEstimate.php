<?php
/**
 * SendViberCampaignRequestEstimate
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
 * SendViberCampaignRequestEstimate Class Doc Comment
 *
 * @category Class
 * @package  Smscx
 * @author   SMS Connexion
 * @link     https://sms.cx
 * @implements \ArrayAccess<string, mixed>
 */
class SendViberCampaignRequestEstimate implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $clientModelName = 'SendViberCampaignRequestEstimate';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $clientTypes = [
        'groups' => 'int[]',
        'from' => 'string',
        'template_id' => 'int',
        'custom_fields' => '\Smscx\Client\Model\CustomFields',
        'scheduled_date' => '\DateTime',
        'is_utc' => 'bool',
        'dlr_callback_url' => 'string',
        'short_response' => 'bool',
        'no_text_details' => 'bool',
        'show_timezone' => 'bool'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $clientFormats = [
        'groups' => 'int32',
        'from' => null,
        'template_id' => 'int32',
        'custom_fields' => null,
        'scheduled_date' => 'date-time',
        'is_utc' => null,
        'dlr_callback_url' => 'url',
        'short_response' => null,
        'no_text_details' => null,
        'show_timezone' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $clientNullables = [
        'groups' => false,
		'from' => false,
		'template_id' => false,
		'custom_fields' => false,
		'scheduled_date' => false,
		'is_utc' => false,
		'dlr_callback_url' => false,
		'short_response' => false,
		'no_text_details' => false,
		'show_timezone' => false
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
        'groups' => 'groups',
        'from' => 'from',
        'template_id' => 'templateId',
        'custom_fields' => 'customFields',
        'scheduled_date' => 'scheduledDate',
        'is_utc' => 'isUtc',
        'dlr_callback_url' => 'dlrCallbackUrl',
        'short_response' => 'shortResponse',
        'no_text_details' => 'noTextDetails',
        'show_timezone' => 'showTimezone'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'groups' => 'setGroups',
        'from' => 'setFrom',
        'template_id' => 'setTemplateId',
        'custom_fields' => 'setCustomFields',
        'scheduled_date' => 'setScheduledDate',
        'is_utc' => 'setIsUtc',
        'dlr_callback_url' => 'setDlrCallbackUrl',
        'short_response' => 'setShortResponse',
        'no_text_details' => 'setNoTextDetails',
        'show_timezone' => 'setShowTimezone'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'groups' => 'getGroups',
        'from' => 'getFrom',
        'template_id' => 'getTemplateId',
        'custom_fields' => 'getCustomFields',
        'scheduled_date' => 'getScheduledDate',
        'is_utc' => 'getIsUtc',
        'dlr_callback_url' => 'getDlrCallbackUrl',
        'short_response' => 'getShortResponse',
        'no_text_details' => 'getNoTextDetails',
        'show_timezone' => 'getShowTimezone'
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
        $this->setIfExists('groups', $data ?? [], null);
        $this->setIfExists('from', $data ?? [], null);
        $this->setIfExists('template_id', $data ?? [], null);
        $this->setIfExists('custom_fields', $data ?? [], null);
        $this->setIfExists('scheduled_date', $data ?? [], null);
        $this->setIfExists('is_utc', $data ?? [], true);
        $this->setIfExists('dlr_callback_url', $data ?? [], null);
        $this->setIfExists('short_response', $data ?? [], false);
        $this->setIfExists('no_text_details', $data ?? [], false);
        $this->setIfExists('show_timezone', $data ?? [], false);
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

        if ($this->container['groups'] === null) {
            $invalidProperties[] = "'groups' can't be null";
        }
        if ($this->container['from'] === null) {
            $invalidProperties[] = "'from' can't be null";
        }
        if ((mb_strlen($this->container['from']) > 15)) {
            $invalidProperties[] = "invalid value for 'from', the character length must be smaller than or equal to 15.";
        }

        if ((mb_strlen($this->container['from']) < 3)) {
            $invalidProperties[] = "invalid value for 'from', the character length must be bigger than or equal to 3.";
        }

        if ($this->container['template_id'] === null) {
            $invalidProperties[] = "'template_id' can't be null";
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
     * Gets groups
     *
     * @return int[]
     */
    public function getGroups()
    {
        return $this->container['groups'];
    }

    /**
     * Sets groups
     *
     * @param int[] $groups An array of identifiers for groups of contacts
     *
     * @return self
     */
    public function setGroups($groups)
    {

        if (is_null($groups)) {
            throw new \InvalidArgumentException('non-nullable groups cannot be null');
        }

        $this->container['groups'] = $groups;

        return $this;
    }

    /**
     * Gets from
     *
     * @return string
     */
    public function getFrom()
    {
        return $this->container['from'];
    }

    /**
     * Sets from
     *
     * @param string $from The originator (sender name) of the text message (min 3, max 15 characters). If the originator used in this value is not approved, it will be overwritten by a default system originator (eg. InfoText). Read more about [sender names](#)
     *
     * @return self
     */
    public function setFrom($from)
    {
        if ((mb_strlen($from) > 15)) {
            throw new \InvalidArgumentException('invalid length for $from when calling SendViberCampaignRequestEstimate., must be smaller than or equal to 15.');
        }
        if ((mb_strlen($from) < 3)) {
            throw new \InvalidArgumentException('invalid length for $from when calling SendViberCampaignRequestEstimate., must be bigger than or equal to 3.');
        }


        if (is_null($from)) {
            throw new \InvalidArgumentException('non-nullable from cannot be null');
        }

        $this->container['from'] = $from;

        return $this;
    }

    /**
     * Gets template_id
     *
     * @return int
     */
    public function getTemplateId()
    {
        return $this->container['template_id'];
    }

    /**
     * Sets template_id
     *
     * @param int $template_id Identifier of the approved Viber template
     *
     * @return self
     */
    public function setTemplateId($template_id)
    {

        if (is_null($template_id)) {
            throw new \InvalidArgumentException('non-nullable template_id cannot be null');
        }

        $this->container['template_id'] = $template_id;

        return $this;
    }

    /**
     * Gets custom_fields
     *
     * @return \Smscx\Client\Model\CustomFields|null
     */
    public function getCustomFields()
    {
        return $this->container['custom_fields'];
    }

    /**
     * Sets custom_fields
     *
     * @param \Smscx\Client\Model\CustomFields|null $custom_fields custom_fields
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
     * Gets scheduled_date
     *
     * @return \DateTime|null
     */
    public function getScheduledDate()
    {
        return $this->container['scheduled_date'];
    }

    /**
     * Sets scheduled_date
     *
     * @param \DateTime|null $scheduled_date If you want to schedule the Viber message at a later date. The date provided must be in format **YYYY-MM-DD HH:MM:SS** (Eg. 2021-06-23 14:26:10). By default, the date and time in this parameter is treated as `UTC`. So if you want to schedule a Viber message to a french phone number at 16:00 (France is UTC+2), then you should set the parameter at 2021-06-23 14:00 (UTC). If you don't want to make the calculations, you can set this parameter as the date time of the destination (eg. 2021-06-23 16:00) and set the parameter `isUtc` to `false`. In this way, the API will automatically make the conversion from the destination timezone to UTC and set the scheduledDate accordingly
     *
     * @return self
     */
    public function setScheduledDate($scheduled_date)
    {

        if (is_null($scheduled_date)) {
            throw new \InvalidArgumentException('non-nullable scheduled_date cannot be null');
        }

        $this->container['scheduled_date'] = $scheduled_date;

        return $this;
    }

    /**
     * Gets is_utc
     *
     * @return bool|null
     */
    public function getIsUtc()
    {
        return $this->container['is_utc'];
    }

    /**
     * Sets is_utc
     *
     * @param bool|null $is_utc If set to `false` it will indicate that the `scheduledDate` parameter is not a date in UTC time, but the date relative to the timezone of the destination phone number. The API will calculate the offset and convert the date to UTC.
     *
     * @return self
     */
    public function setIsUtc($is_utc)
    {

        if (is_null($is_utc)) {
            throw new \InvalidArgumentException('non-nullable is_utc cannot be null');
        }

        $this->container['is_utc'] = $is_utc;

        return $this;
    }

    /**
     * Gets dlr_callback_url
     *
     * @return string|null
     */
    public function getDlrCallbackUrl()
    {
        return $this->container['dlr_callback_url'];
    }

    /**
     * Sets dlr_callback_url
     *
     * @param string|null $dlr_callback_url A valid URL to receive the delivery report update for the sent Viber. If this parameter is set, it will overwrite the setting from [Admin Dashboard > HTTP API > Oauth2 > Application settings](#)
     *
     * @return self
     */
    public function setDlrCallbackUrl($dlr_callback_url)
    {

        if (is_null($dlr_callback_url)) {
            throw new \InvalidArgumentException('non-nullable dlr_callback_url cannot be null');
        }

        $this->container['dlr_callback_url'] = $dlr_callback_url;

        return $this;
    }

    /**
     * Gets short_response
     *
     * @return bool|null
     */
    public function getShortResponse()
    {
        return $this->container['short_response'];
    }

    /**
     * Sets short_response
     *
     * @param bool|null $short_response If set to `true`, it will return the full `info` object and empty `data` object. For situations when you don't need the information in the `data` object and want to save bandwith
     *
     * @return self
     */
    public function setShortResponse($short_response)
    {

        if (is_null($short_response)) {
            throw new \InvalidArgumentException('non-nullable short_response cannot be null');
        }

        $this->container['short_response'] = $short_response;

        return $this;
    }

    /**
     * Gets no_text_details
     *
     * @return bool|null
     */
    public function getNoTextDetails()
    {
        return $this->container['no_text_details'];
    }

    /**
     * Sets no_text_details
     *
     * @param bool|null $no_text_details The response will not have the parameters `data.text` and `data.textAnalysis`. For situations when you send to large lists of phone numbers and don't need all response parameters (save bandwith)
     *
     * @return self
     */
    public function setNoTextDetails($no_text_details)
    {

        if (is_null($no_text_details)) {
            throw new \InvalidArgumentException('non-nullable no_text_details cannot be null');
        }

        $this->container['no_text_details'] = $no_text_details;

        return $this;
    }

    /**
     * Gets show_timezone
     *
     * @return bool|null
     */
    public function getShowTimezone()
    {
        return $this->container['show_timezone'];
    }

    /**
     * Sets show_timezone
     *
     * @param bool|null $show_timezone Shows the parameter `timezone` in the response, for each phone number
     *
     * @return self
     */
    public function setShowTimezone($show_timezone)
    {

        if (is_null($show_timezone)) {
            throw new \InvalidArgumentException('non-nullable show_timezone cannot be null');
        }

        $this->container['show_timezone'] = $show_timezone;

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


