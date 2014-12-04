<?php
/**
 * File CountryCodeTypesTest.php
 * Created at: 2014-12-04 06-44
 *
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 */

namespace Webit\Addressing\Tests;


use Webit\Addressing\Model\CountryCodeTypes;

class CountryCodeTypesTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function shouldReturnCountryCodeTypes()
    {
        $types = CountryCodeTypes::getCodeTypes();
        $this->assertInternalType('array', $types);
        $this->assertCount(3, $types);
    }

} 