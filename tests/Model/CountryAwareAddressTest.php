<?php
/**
 * File: CountryAwareAddressTest.php
 * Created at: 2014-11-20 21:49
 */
 
namespace Webit\Addressing\Tests;

use Webit\Addressing\Model\CountryAwareAddress;
use Webit\Addressing\Model\CountryInterface;

/**
 * Class CountryAwareAddressTest
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 */
class CountryAwareAddressTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function shouldBeAwareOfCountry()
    {
        $country = $this->createCountry();
        $address = new CountryAwareAddress();
            $address->setCountry($country);

        $this->assertSame($country, $address->getCountry());
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|CountryInterface
     */
    private function createCountry()
    {
        $country = $this->getMock('Webit\Addressing\Model\CountryInterface');

        return $country;
    }

    /**
     * @test
     */
    public function shouldBeDefinableViaConstructor()
    {
        $name = 'John Doe';
        $internalAddress = '21 John Doe Street';
        $post = 'London';
        $postCode = ' SW1A 1AA';
        $country = $this->createCountry();

        $address = new CountryAwareAddress($name, $internalAddress, $post, $postCode, $country);

        $this->assertEquals($name, $address->getName());
        $this->assertEquals($internalAddress, $address->getAddress());
        $this->assertEquals($post, $address->getPost());
        $this->assertEquals($postCode, $address->getPostCode());
        $this->assertEquals($country, $address->getCountry());
    }
}
 