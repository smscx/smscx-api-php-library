<?php
/**
 * DataShortlinkHit
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
 * DataShortlinkHit Class Doc Comment
 *
 * @category Class
 * @description Event type data, grouped in multiple objects (up to 200 in a request)
 * @package  Smscx
 * @author   SMS Connexion
 * @link     https://sms.cx
 * @implements \ArrayAccess<string, mixed>
 */
class DataShortlinkHit implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $clientModelName = 'DataShortlinkHit';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $clientTypes = [
        'hit_id' => 'int',
        'shortlink_id' => 'string',
        'url' => 'string',
        'phone_number' => 'string',
        'campaign_id' => 'string',
        'group_id' => 'string',
        'device' => 'string',
        'browser' => 'string',
        'browser_version' => 'string',
        'os' => 'string',
        'os_version' => 'string',
        'brand' => 'string',
        'model' => 'string',
        'screen_resolution' => 'string',
        'accept_language' => 'string',
        'referrer' => 'string',
        'ip_address' => 'string',
        'country_iso' => 'string',
        'city' => 'string',
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
        'shortlink_id' => null,
        'url' => 'url',
        'phone_number' => null,
        'campaign_id' => 'uuid',
        'group_id' => null,
        'device' => null,
        'browser' => null,
        'browser_version' => null,
        'os' => null,
        'os_version' => null,
        'brand' => null,
        'model' => null,
        'screen_resolution' => null,
        'accept_language' => null,
        'referrer' => null,
        'ip_address' => null,
        'country_iso' => null,
        'city' => null,
        'datetime' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $clientNullables = [
        'hit_id' => false,
		'shortlink_id' => false,
		'url' => false,
		'phone_number' => false,
		'campaign_id' => true,
		'group_id' => true,
		'device' => false,
		'browser' => false,
		'browser_version' => false,
		'os' => false,
		'os_version' => false,
		'brand' => false,
		'model' => false,
		'screen_resolution' => false,
		'accept_language' => false,
		'referrer' => true,
		'ip_address' => false,
		'country_iso' => false,
		'city' => false,
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
        'shortlink_id' => 'shortlinkId',
        'url' => 'url',
        'phone_number' => 'phoneNumber',
        'campaign_id' => 'campaignId',
        'group_id' => 'groupId',
        'device' => 'device',
        'browser' => 'browser',
        'browser_version' => 'browserVersion',
        'os' => 'os',
        'os_version' => 'osVersion',
        'brand' => 'brand',
        'model' => 'model',
        'screen_resolution' => 'screenResolution',
        'accept_language' => 'acceptLanguage',
        'referrer' => 'referrer',
        'ip_address' => 'ipAddress',
        'country_iso' => 'countryIso',
        'city' => 'city',
        'datetime' => 'datetime'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'hit_id' => 'setHitId',
        'shortlink_id' => 'setShortlinkId',
        'url' => 'setUrl',
        'phone_number' => 'setPhoneNumber',
        'campaign_id' => 'setCampaignId',
        'group_id' => 'setGroupId',
        'device' => 'setDevice',
        'browser' => 'setBrowser',
        'browser_version' => 'setBrowserVersion',
        'os' => 'setOs',
        'os_version' => 'setOsVersion',
        'brand' => 'setBrand',
        'model' => 'setModel',
        'screen_resolution' => 'setScreenResolution',
        'accept_language' => 'setAcceptLanguage',
        'referrer' => 'setReferrer',
        'ip_address' => 'setIpAddress',
        'country_iso' => 'setCountryIso',
        'city' => 'setCity',
        'datetime' => 'setDatetime'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'hit_id' => 'getHitId',
        'shortlink_id' => 'getShortlinkId',
        'url' => 'getUrl',
        'phone_number' => 'getPhoneNumber',
        'campaign_id' => 'getCampaignId',
        'group_id' => 'getGroupId',
        'device' => 'getDevice',
        'browser' => 'getBrowser',
        'browser_version' => 'getBrowserVersion',
        'os' => 'getOs',
        'os_version' => 'getOsVersion',
        'brand' => 'getBrand',
        'model' => 'getModel',
        'screen_resolution' => 'getScreenResolution',
        'accept_language' => 'getAcceptLanguage',
        'referrer' => 'getReferrer',
        'ip_address' => 'getIpAddress',
        'country_iso' => 'getCountryIso',
        'city' => 'getCity',
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

    public const DEVICE_MOBILE = 'mobile';
    public const DEVICE_TABLET = 'tablet';
    public const DEVICE_DESKTOP = 'desktop';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getDeviceAllowableValues()
    {
        return [
            self::DEVICE_MOBILE,
            self::DEVICE_TABLET,
            self::DEVICE_DESKTOP,
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
        $this->setIfExists('shortlink_id', $data ?? [], null);
        $this->setIfExists('url', $data ?? [], null);
        $this->setIfExists('phone_number', $data ?? [], null);
        $this->setIfExists('campaign_id', $data ?? [], null);
        $this->setIfExists('group_id', $data ?? [], null);
        $this->setIfExists('device', $data ?? [], null);
        $this->setIfExists('browser', $data ?? [], null);
        $this->setIfExists('browser_version', $data ?? [], null);
        $this->setIfExists('os', $data ?? [], null);
        $this->setIfExists('os_version', $data ?? [], null);
        $this->setIfExists('brand', $data ?? [], null);
        $this->setIfExists('model', $data ?? [], null);
        $this->setIfExists('screen_resolution', $data ?? [], null);
        $this->setIfExists('accept_language', $data ?? [], null);
        $this->setIfExists('referrer', $data ?? [], null);
        $this->setIfExists('ip_address', $data ?? [], null);
        $this->setIfExists('country_iso', $data ?? [], null);
        $this->setIfExists('city', $data ?? [], null);
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
        if ($this->container['shortlink_id'] === null) {
            $invalidProperties[] = "'shortlink_id' can't be null";
        }
        if ($this->container['url'] === null) {
            $invalidProperties[] = "'url' can't be null";
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

        if ($this->container['device'] === null) {
            $invalidProperties[] = "'device' can't be null";
        }
        $allowedValues = $this->getDeviceAllowableValues();
        if (!is_null($this->container['device']) && !in_array($this->container['device'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'device', must be one of '%s'",
                $this->container['device'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['browser'] === null) {
            $invalidProperties[] = "'browser' can't be null";
        }
        if ($this->container['browser_version'] === null) {
            $invalidProperties[] = "'browser_version' can't be null";
        }
        if ($this->container['os'] === null) {
            $invalidProperties[] = "'os' can't be null";
        }
        if ($this->container['os_version'] === null) {
            $invalidProperties[] = "'os_version' can't be null";
        }
        if ($this->container['brand'] === null) {
            $invalidProperties[] = "'brand' can't be null";
        }
        if ($this->container['model'] === null) {
            $invalidProperties[] = "'model' can't be null";
        }
        if ($this->container['screen_resolution'] === null) {
            $invalidProperties[] = "'screen_resolution' can't be null";
        }
        if ($this->container['accept_language'] === null) {
            $invalidProperties[] = "'accept_language' can't be null";
        }
        if ($this->container['referrer'] === null) {
            $invalidProperties[] = "'referrer' can't be null";
        }
        if ($this->container['ip_address'] === null) {
            $invalidProperties[] = "'ip_address' can't be null";
        }
        if ($this->container['country_iso'] === null) {
            $invalidProperties[] = "'country_iso' can't be null";
        }
        if ($this->container['city'] === null) {
            $invalidProperties[] = "'city' can't be null";
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
     * Gets shortlink_id
     *
     * @return string
     */
    public function getShortlinkId()
    {
        return $this->container['shortlink_id'];
    }

    /**
     * Sets shortlink_id
     *
     * @param string $shortlink_id ID of the short link
     *
     * @return self
     */
    public function setShortlinkId($shortlink_id)
    {

        if (is_null($shortlink_id)) {
            throw new \InvalidArgumentException('non-nullable shortlink_id cannot be null');
        }

        $this->container['shortlink_id'] = $shortlink_id;

        return $this;
    }

    /**
     * Gets url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->container['url'];
    }

    /**
     * Sets url
     *
     * @param string $url URL of the short link
     *
     * @return self
     */
    public function setUrl($url)
    {

        if (is_null($url)) {
            throw new \InvalidArgumentException('non-nullable url cannot be null');
        }

        $this->container['url'] = $url;

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
     * @param string|null $phone_number Phone number of the visitor that made the hit to the shortlink (works if link tracking option is used when sending a message). If short link tracking was enabled, this parameter will not be null.
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
     * @param string|null $campaign_id Identifier of the campaign from which the contact has made the visit. If short link tracking was enabled, this parameter will not be null.
     *
     * @return self
     */
    public function setCampaignId($campaign_id)
    {
        if (!is_null($campaign_id) && (mb_strlen($campaign_id) > 36)) {
            throw new \InvalidArgumentException('invalid length for $campaign_id when calling DataShortlinkHit., must be smaller than or equal to 36.');
        }
        if (!is_null($campaign_id) && (mb_strlen($campaign_id) < 36)) {
            throw new \InvalidArgumentException('invalid length for $campaign_id when calling DataShortlinkHit., must be bigger than or equal to 36.');
        }
        if (!is_null($campaign_id) && (!preg_match("/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/", $campaign_id))) {
            throw new \InvalidArgumentException("invalid value for \$campaign_id when calling DataShortlinkHit., must conform to the pattern /^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/.");
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
     * @param string|null $group_id Identifier of the group the contact is in. If short link tracking was enabled, this parameter will not be null.
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
     * Gets device
     *
     * @return string
     */
    public function getDevice()
    {
        return $this->container['device'];
    }

    /**
     * Sets device
     *
     * @param string $device Type of device of the visitor
     *
     * @return self
     */
    public function setDevice($device)
    {
        $allowedValues = $this->getDeviceAllowableValues();
        if (!in_array($device, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'device', must be one of '%s'",
                    $device,
                    implode("', '", $allowedValues)
                )
            );
        }

        if (is_null($device)) {
            throw new \InvalidArgumentException('non-nullable device cannot be null');
        }

        $this->container['device'] = $device;

        return $this;
    }

    /**
     * Gets browser
     *
     * @return string
     */
    public function getBrowser()
    {
        return $this->container['browser'];
    }

    /**
     * Sets browser
     *
     * @param string $browser Type of browser of the visitor that accessed the short link
     *
     * @return self
     */
    public function setBrowser($browser)
    {

        if (is_null($browser)) {
            throw new \InvalidArgumentException('non-nullable browser cannot be null');
        }

        $this->container['browser'] = $browser;

        return $this;
    }

    /**
     * Gets browser_version
     *
     * @return string
     */
    public function getBrowserVersion()
    {
        return $this->container['browser_version'];
    }

    /**
     * Sets browser_version
     *
     * @param string $browser_version Browser version of the device that accessed the short link
     *
     * @return self
     */
    public function setBrowserVersion($browser_version)
    {

        if (is_null($browser_version)) {
            throw new \InvalidArgumentException('non-nullable browser_version cannot be null');
        }

        $this->container['browser_version'] = $browser_version;

        return $this;
    }

    /**
     * Gets os
     *
     * @return string
     */
    public function getOs()
    {
        return $this->container['os'];
    }

    /**
     * Sets os
     *
     * @param string $os Operating system of the visitor that accessed the short link (eg. Android, Windows, Linux, etc.)
     *
     * @return self
     */
    public function setOs($os)
    {

        if (is_null($os)) {
            throw new \InvalidArgumentException('non-nullable os cannot be null');
        }

        $this->container['os'] = $os;

        return $this;
    }

    /**
     * Gets os_version
     *
     * @return string
     */
    public function getOsVersion()
    {
        return $this->container['os_version'];
    }

    /**
     * Sets os_version
     *
     * @param string $os_version Version of the operating system
     *
     * @return self
     */
    public function setOsVersion($os_version)
    {

        if (is_null($os_version)) {
            throw new \InvalidArgumentException('non-nullable os_version cannot be null');
        }

        $this->container['os_version'] = $os_version;

        return $this;
    }

    /**
     * Gets brand
     *
     * @return string
     */
    public function getBrand()
    {
        return $this->container['brand'];
    }

    /**
     * Sets brand
     *
     * @param string $brand Brand of phone/tablet of the visitor that accessed the short link
     *
     * @return self
     */
    public function setBrand($brand)
    {

        if (is_null($brand)) {
            throw new \InvalidArgumentException('non-nullable brand cannot be null');
        }

        $this->container['brand'] = $brand;

        return $this;
    }

    /**
     * Gets model
     *
     * @return string
     */
    public function getModel()
    {
        return $this->container['model'];
    }

    /**
     * Sets model
     *
     * @param string $model Model of phone/tabled of the visitor that accessed the short link (eg. P30 Pro, Galaxy S8, etc.)
     *
     * @return self
     */
    public function setModel($model)
    {

        if (is_null($model)) {
            throw new \InvalidArgumentException('non-nullable model cannot be null');
        }

        $this->container['model'] = $model;

        return $this;
    }

    /**
     * Gets screen_resolution
     *
     * @return string
     */
    public function getScreenResolution()
    {
        return $this->container['screen_resolution'];
    }

    /**
     * Sets screen_resolution
     *
     * @param string $screen_resolution screen_resolution
     *
     * @return self
     */
    public function setScreenResolution($screen_resolution)
    {

        if (is_null($screen_resolution)) {
            throw new \InvalidArgumentException('non-nullable screen_resolution cannot be null');
        }

        $this->container['screen_resolution'] = $screen_resolution;

        return $this;
    }

    /**
     * Gets accept_language
     *
     * @return string
     */
    public function getAcceptLanguage()
    {
        return $this->container['accept_language'];
    }

    /**
     * Sets accept_language
     *
     * @param string $accept_language accept_language
     *
     * @return self
     */
    public function setAcceptLanguage($accept_language)
    {

        if (is_null($accept_language)) {
            throw new \InvalidArgumentException('non-nullable accept_language cannot be null');
        }

        $this->container['accept_language'] = $accept_language;

        return $this;
    }

    /**
     * Gets referrer
     *
     * @return string
     */
    public function getReferrer()
    {
        return $this->container['referrer'];
    }

    /**
     * Sets referrer
     *
     * @param string $referrer referrer
     *
     * @return self
     */
    public function setReferrer($referrer)
    {

        if (is_null($referrer)) {
            array_push($this->clientNullablesSetToNull, 'referrer');
        } else {
            $nullablesSetToNull = $this->getClientNullablesSetToNull();
            $index = array_search('referrer', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setClientNullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['referrer'] = $referrer;

        return $this;
    }

    /**
     * Gets ip_address
     *
     * @return string
     */
    public function getIpAddress()
    {
        return $this->container['ip_address'];
    }

    /**
     * Sets ip_address
     *
     * @param string $ip_address Anonymized IP address without the last byte. Eg. `204.79.200.0`
     *
     * @return self
     */
    public function setIpAddress($ip_address)
    {

        if (is_null($ip_address)) {
            throw new \InvalidArgumentException('non-nullable ip_address cannot be null');
        }

        $this->container['ip_address'] = $ip_address;

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
     * @param string $country_iso Two-letter country ISO of the visitor that accessed the short link
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
     * Gets city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->container['city'];
    }

    /**
     * Sets city
     *
     * @param string $city The city of the visitor that accessed the short link
     *
     * @return self
     */
    public function setCity($city)
    {

        if (is_null($city)) {
            throw new \InvalidArgumentException('non-nullable city cannot be null');
        }

        $this->container['city'] = $city;

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


