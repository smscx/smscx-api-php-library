<?php
/**
 * TransliterationTest
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
 * TransliterationTest Class Doc Comment
 *
 * @category    Class
 * @description Convert special characters from Unicode to GSM 03.38 charset, or replace them if no GSM equivalent.   Eg. &#x60;Привет&#x60; &#x3D; &#x60;privet&#x60; (cyrillic), &#x60;cześć&#x60; &#x3D; &#x60;czesc&#x60; (polish), &#x60;edilmiş&#x60; &#x3D; &#x60;edilmis&#x60; (turkish), &#x60;bună&#x60; &#x3D; &#x60;buna&#x60; (romanian)  If this parameter is set, it will overwrite the settings from [Admin Dashboard &gt; HTTP API &gt; Oauth2 &gt; Application settings](#)
 * @package     Smscx
 * @author      SMS Connexion
 * @link        https://sms.cx
 */
class TransliterationTest extends TestCase
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
     * Test "Transliteration"
     */
    public function testTransliteration()
    {
        // TODO: implement
        $this->markTestIncomplete('Not implemented');
    }

    /**
     * Test attribute "alphabet"
     */
    public function testPropertyAlphabet()
    {
        // TODO: implement
        $this->markTestIncomplete('Not implemented');
    }

    /**
     * Test attribute "remove_emojis"
     */
    public function testPropertyRemoveEmojis()
    {
        // TODO: implement
        $this->markTestIncomplete('Not implemented');
    }
}
