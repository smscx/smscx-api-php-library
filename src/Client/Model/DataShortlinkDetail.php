<?php
/**
 * DataShortlinkDetail
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
 * DataShortlinkDetail Class Doc Comment
 *
 * @category Class
 * @package  Smscx
 * @author   SMS Connexion
 * @link     https://sms.cx
 * @implements \ArrayAccess<string, mixed>
 */
class DataShortlinkDetail implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $clientModelName = 'DataShortlinkDetail';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $clientTypes = [
        'hit_id' => 'int',
        'phone_number' => 'string',
        'phone_number_country_iso' => 'string',
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
        'phone_number' => null,
        'phone_number_country_iso' => null,
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
		'phone_number' => true,
		'phone_number_country_iso' => true,
		'campaign_id' => true,
		'group_id' => true,
		'device' => true,
		'browser' => true,
		'browser_version' => true,
		'os' => true,
		'os_version' => true,
		'brand' => true,
		'model' => true,
		'screen_resolution' => true,
		'accept_language' => true,
		'referrer' => true,
		'ip_address' => true,
		'country_iso' => true,
		'city' => true,
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
        'phone_number' => 'phoneNumber',
        'phone_number_country_iso' => 'phoneNumberCountryIso',
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
        'phone_number' => 'setPhoneNumber',
        'phone_number_country_iso' => 'setPhoneNumberCountryIso',
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
        'phone_number' => 'getPhoneNumber',
        'phone_number_country_iso' => 'getPhoneNumberCountryIso',
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
        $this->setIfExists('phone_number', $data ?? [], null);
        $this->setIfExists('phone_number_country_iso', $data ?? [], null);
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
        if (!is_null($this->container['phone_number_country_iso']) && (mb_strlen($this->container['phone_number_country_iso']) > 2)) {
            $invalidProperties[] = "invalid value for 'phone_number_country_iso', the character length must be smaller than or equal to 2.";
        }

        if (!is_null($this->container['phone_number_country_iso']) && (mb_strlen($this->container['phone_number_country_iso']) < 2)) {
            $invalidProperties[] = "invalid value for 'phone_number_country_iso', the character length must be bigger than or equal to 2.";
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
            array_push($this->clientNullablesSetToNull, 'phone_number');
        } else {
            $nullablesSetToNull = $this->getClientNullablesSetToNull();
            $index = array_search('phone_number', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setClientNullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['phone_number'] = $phone_number;

        return $this;
    }

    /**
     * Gets phone_number_country_iso
     *
     * @return string|null
     */
    public function getPhoneNumberCountryIso()
    {
        return $this->container['phone_number_country_iso'];
    }

    /**
     * Sets phone_number_country_iso
     *
     * @param string|null $phone_number_country_iso The country code of the phone number in ISO-3166 alpha 2 format (eg. DE, IT, FR)
     *
     * @return self
     */
    public function setPhoneNumberCountryIso($phone_number_country_iso)
    {
        if (!is_null($phone_number_country_iso) && (mb_strlen($phone_number_country_iso) > 2)) {
            throw new \InvalidArgumentException('invalid length for $phone_number_country_iso when calling DataShortlinkDetail., must be smaller than or equal to 2.');
        }
        if (!is_null($phone_number_country_iso) && (mb_strlen($phone_number_country_iso) < 2)) {
            throw new \InvalidArgumentException('invalid length for $phone_number_country_iso when calling DataShortlinkDetail., must be bigger than or equal to 2.');
        }


        if (is_null($phone_number_country_iso)) {
            array_push($this->clientNullablesSetToNull, 'phone_number_country_iso');
        } else {
            $nullablesSetToNull = $this->getClientNullablesSetToNull();
            $index = array_search('phone_number_country_iso', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setClientNullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['phone_number_country_iso'] = $phone_number_country_iso;

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
     * @param string|null $campaign_id Identifier of the campaign from which the contact has unsubscribed. If short link tracking was enabled, this parameter will not be null.
     *
     * @return self
     */
    public function setCampaignId($campaign_id)
    {
        if (!is_null($campaign_id) && (mb_strlen($campaign_id) > 36)) {
            throw new \InvalidArgumentException('invalid length for $campaign_id when calling DataShortlinkDetail., must be smaller than or equal to 36.');
        }
        if (!is_null($campaign_id) && (mb_strlen($campaign_id) < 36)) {
            throw new \InvalidArgumentException('invalid length for $campaign_id when calling DataShortlinkDetail., must be bigger than or equal to 36.');
        }
        if (!is_null($campaign_id) && (!preg_match("/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/", $campaign_id))) {
            throw new \InvalidArgumentException("invalid value for \$campaign_id when calling DataShortlinkDetail., must conform to the pattern /^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/.");
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
     * @param string|null $group_id Identifier of the group the contact was in. If short link tracking was enabled, this parameter will not be null.
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
            array_push($this->clientNullablesSetToNull, 'device');
        } else {
            $nullablesSetToNull = $this->getClientNullablesSetToNull();
            $index = array_search('device', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setClientNullablesSetToNull($nullablesSetToNull);
            }
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
            array_push($this->clientNullablesSetToNull, 'browser');
        } else {
            $nullablesSetToNull = $this->getClientNullablesSetToNull();
            $index = array_search('browser', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setClientNullablesSetToNull($nullablesSetToNull);
            }
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
            array_push($this->clientNullablesSetToNull, 'browser_version');
        } else {
            $nullablesSetToNull = $this->getClientNullablesSetToNull();
            $index = array_search('browser_version', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setClientNullablesSetToNull($nullablesSetToNull);
            }
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
            array_push($this->clientNullablesSetToNull, 'os');
        } else {
            $nullablesSetToNull = $this->getClientNullablesSetToNull();
            $index = array_search('os', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setClientNullablesSetToNull($nullablesSetToNull);
            }
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
            array_push($this->clientNullablesSetToNull, 'os_version');
        } else {
            $nullablesSetToNull = $this->getClientNullablesSetToNull();
            $index = array_search('os_version', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setClientNullablesSetToNull($nullablesSetToNull);
            }
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
            array_push($this->clientNullablesSetToNull, 'brand');
        } else {
            $nullablesSetToNull = $this->getClientNullablesSetToNull();
            $index = array_search('brand', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setClientNullablesSetToNull($nullablesSetToNull);
            }
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
            array_push($this->clientNullablesSetToNull, 'model');
        } else {
            $nullablesSetToNull = $this->getClientNullablesSetToNull();
            $index = array_search('model', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setClientNullablesSetToNull($nullablesSetToNull);
            }
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
            array_push($this->clientNullablesSetToNull, 'screen_resolution');
        } else {
            $nullablesSetToNull = $this->getClientNullablesSetToNull();
            $index = array_search('screen_resolution', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setClientNullablesSetToNull($nullablesSetToNull);
            }
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
            array_push($this->clientNullablesSetToNull, 'accept_language');
        } else {
            $nullablesSetToNull = $this->getClientNullablesSetToNull();
            $index = array_search('accept_language', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setClientNullablesSetToNull($nullablesSetToNull);
            }
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
            array_push($this->clientNullablesSetToNull, 'ip_address');
        } else {
            $nullablesSetToNull = $this->getClientNullablesSetToNull();
            $index = array_search('ip_address', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setClientNullablesSetToNull($nullablesSetToNull);
            }
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
            array_push($this->clientNullablesSetToNull, 'country_iso');
        } else {
            $nullablesSetToNull = $this->getClientNullablesSetToNull();
            $index = array_search('country_iso', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setClientNullablesSetToNull($nullablesSetToNull);
            }
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
            array_push($this->clientNullablesSetToNull, 'city');
        } else {
            $nullablesSetToNull = $this->getClientNullablesSetToNull();
            $index = array_search('city', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setClientNullablesSetToNull($nullablesSetToNull);
            }
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


