<?php
/**
 * File: CountryTest.php
 * Created at: 2014-11-20 21:32
 */
 
namespace Webit\Addressing\Tests;

use Webit\Addressing\Model\Country;

/**
 * Class CountryTest
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 */
class CountryTest extends \PHPUnit_Framework_TestCase {

    /**
     * @test
     */
    public function shouldBeAwareOfName()
    {
        $name = 'England';

        $country = new Country();
        $country->setName($name);

        $this->assertEquals($name, $country->getName());
    }

    /**
     * @test
     */
    public function shouldBeAwareOfIsoCode()
    {
        $isoCode = 'EN';

        $country = new Country();
        $country->setIsoCode($isoCode);

        $this->assertEquals($isoCode, $country->getIsoCode());
    }

    /**
     * @test
     */
    public function shouldBeDefinableViaConstructor()
    {
        $name = 'England';
        $isoCode = 'EN';

        $country = new Country($name, $isoCode);
            $this->assertEquals($name, $country->getName());
            $this->assertEquals($isoCode, $country->getIsoCode());
    }
}
 