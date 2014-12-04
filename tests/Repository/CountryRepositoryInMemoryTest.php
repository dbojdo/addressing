<?php
/**
 * File CountryRepositoryInMemoryTest.php
 * Created at: 2014-12-04 06-01
 *
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 */

namespace Webit\Addressing\Tests\Repository;


use Doctrine\Common\Collections\ArrayCollection;
use Webit\Addressing\Model\CountryCodeTypes;
use Webit\Addressing\Repository\CountryRepositoryInMemory;

class CountryRepositoryInMemoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var CountryRepositoryInMemory
     */
    private $repository;

    public function setUp()
    {
        $arCountries = $this->getCountries();

        $countries = $this->createCountries($arCountries);

        $this->repository = new CountryRepositoryInMemory($countries);
    }

    /**
     * @return array
     */
    private function getCountries()
    {
        return array(
            array('United Kingdom', 'GB', 'GBR', '826'),
            array('Poland', 'PL', null, '616'),
            array('Saint Pierre and Miquelon', 'PM', null, null)
        );
    }

    /**
     * @test
     */
    public function shouldReturnCountries()
    {
        $countries = $this->repository->getCountries();
        $this->assertInstanceOf('Doctrine\Common\Collections\ArrayCollection', $countries);
        $this->assertEquals(3, $countries->count());
    }

    /**
     * @test
     */
    public function shouldReturnCountryByCode()
    {
        $country = $this->repository->getCountry('GB');
        $this->assertInstanceOf('Webit\Addressing\Model\Country', $country);

        $country = $this->repository->getCountry('GBR', CountryCodeTypes::TYPE_ALPHA3);
        $this->assertInstanceOf('Webit\Addressing\Model\Country', $country);

        $country = $this->repository->getCountry('826', CountryCodeTypes::TYPE_NUMERIC);
        $this->assertInstanceOf('Webit\Addressing\Model\Country', $country);

        $country = $this->repository->getCountry('invalid');
        $this->assertNull($country);

        $country = $this->repository->getCountry('invalid', CountryCodeTypes::TYPE_ALPHA3);
        $this->assertNull($country);

        $country = $this->repository->getCountry('invalid', CountryCodeTypes::TYPE_NUMERIC);
        $this->assertNull($country);

        $country = $this->repository->getCountry('invalid', 'unknown-type');
        $this->assertNull($country);
    }

    /**
     * @test
     * @param $name
     * @param $matchedName
     * @dataProvider getForFindByName
     */
    public function shouldFindByName($name, $matchedName)
    {
        $country = $this->repository->findCountryByName($name);
        if ($matchedName) {
            $this->assertInstanceOf('Webit\Addressing\Model\Country', $country);
            $this->assertEquals($matchedName, $country->getName());
        } else {
            $this->assertNull($country);
        }
    }

    /**
     * @return array
     */
    public function getForFindByName()
    {
        return array(
            array('United Kingdom', 'United Kingdom'),
            array(' United  Kingdom ', 'United Kingdom'),
            array('uniTed kiNgdom', 'United Kingdom'),
            array('uniTedkiNgdom', 'United Kingdom'),
            array('unknown', null),
        );
    }

    private function createCountries(array $arCountries)
    {
        $collection = new ArrayCollection();
        foreach ($arCountries as $arCountry) {
            $country = $this->createCountry($arCountry);
            $collection->add($country);
        }

        return $collection;
    }

    private function createCountry($arCountry)
    {
        $name = $arCountry[0];
        $isoCode = $arCountry[1];
        $isoCodeAlpha3 = $arCountry[2];
        $isoCodeNumeric = $arCountry[3];

        $country = $this->getMock('Webit\Addressing\Model\Country');
        if ($isoCodeAlpha3) {
            $country->expects($this->any())->method('getIsoCodeAlpha3')->willReturn($isoCodeAlpha3);
        }

        if ($isoCodeNumeric) {
            $country->expects($this->any())->method('getIsoCodeNumeric')->willReturn($isoCodeNumeric);
        }

        $country->expects($this->any())->method('getName')->willReturn($name);
        $country->expects($this->any())->method('getIsoCode')->willReturn($isoCode);

        return $country;
    }
} 