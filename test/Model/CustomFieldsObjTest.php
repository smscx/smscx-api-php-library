<?php
/**
 * CustomFieldsObjTest
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  Smscx
 * @author   SMS Connexion
 * @link     https://sms.cx
 */

namespace Smscx\Test\Model;

use PHPUnit\Framework\TestCase;

/**
 * CustomFieldsObjTest Class Doc Comment
 *
 * @category    Class
 * @description An object with **key-value** pairs, where the key is the name of the custom field.  An actual JSON object described by this might look like this:  &#x60;&#x60;&#x60;json {     \&quot;customFields\&quot;: {         \&quot;height\&quot;: \&quot;1.78m\&quot;,         \&quot;orderNumber\&quot;: \&quot;441\&quot;,         \&quot;my_custom_field\&quot;: \&quot;My Custom Value\&quot;     } }   &#x60;&#x60;&#x60; Maximum 20 custom fields allowed. The data stored in the custom fields can be used in the text message by using the placeholder &#x60;{{&lt;KEY&gt;}}&#x60;. Eg. &#x60;{{height}}&#x60;, &#x60;{{orderNumber}}&#x60;
 * @package     Smscx
 * @author      SMS Connexion
 * @link        https://sms.cx
 */
class CustomFieldsObjTest extends TestCase
{

    /**
     * Setup before running any test case
     */
    public static function setUpBeforeClass(): void
    {
    }

    /**
     * Setup before running each test case
     */
    public function setUp(): void
    {
    }

    /**
     * Clean up after running each test case
     */
    public function tearDown(): void
    {
    }

    /**
     * Clean up after running all test cases
     */
    public static function tearDownAfterClass(): void
    {
    }

    /**
     * Test "CustomFieldsObj"
     */
    public function testCustomFieldsObj()
    {
        // TODO: implement
        $this->markTestIncomplete('Not implemented');
    }

    /**
     * Test attribute "custom_field_name"
     */
    public function testPropertyCustomFieldName()
    {
        // TODO: implement
        $this->markTestIncomplete('Not implemented');
    }
}
