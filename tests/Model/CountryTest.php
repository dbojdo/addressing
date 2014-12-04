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
        $name = 'United Kingdom';

        $country = new Country();
        $country->setName($name);

        $this->assertEquals($name, $country->getName());
    }

    /**
     * @test
     */
    public function shouldBeAwareOfIsoCode()
    {
        $isoCode = 'GB';

        $country = new Country();
        $country->setIsoCode($isoCode);

        $this->assertEquals($isoCode, $country->getIsoCode());
    }

    /**
     * @test
     */
    public function shouldBeAwareOfIsoCodeAlpha3()
    {
        $isoCodeAlpha3 = 'GBR';

        $country = new Country();
        $country->setIsoCodeAlpha3($isoCodeAlpha3);

        $this->assertEquals($isoCodeAlpha3, $country->getIsoCodeAlpha3());
    }

    /**
     * @test
     */
    public function shouldBeAwareOfIsoCodeNumeric()
    {
        $isoCodeNumeric = '826';

        $country = new Country();
        $country->setIsoCodeNumeric($isoCodeNumeric);

        $this->assertEquals($isoCodeNumeric, $country->getIsoCodeNumeric());
    }

    /**
     * @test
     */
    public function shouldBeDefinableViaConstructor()
    {
        $name = 'United Kingdom';
        $isoCode = 'GB';
        $isoAlpha3 = 'GBR';
        $isoNumeric = '826';

        $country = new Country($name, $isoCode, $isoAlpha3, $isoNumeric);
            $this->assertEquals($name, $country->getName());
            $this->assertEquals($isoCode, $country->getIsoCode());
            $this->assertEquals($isoAlpha3, $country->getIsoCodeAlpha3());
            $this->assertEquals($isoNumeric, $country->getIsoCodeNumeric());
    }
}
 