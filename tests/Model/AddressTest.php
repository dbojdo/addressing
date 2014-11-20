<?php
/**
 * File: AddressTest.php
 * Created at: 2014-11-20 21:40
 */
 
namespace Webit\Addressing\Tests;

use Webit\Addressing\Model\Address;

/**
 * Interface AddressTest
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 */
class AddressTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var Address
     */
    private $address;

    public function setUp()
    {
        $this->address = new Address();
    }

    /**
     * @test
     */
    public function shouldBeAwareOfName()
    {
        $name = 'John Doe';
        $this->address->setName($name);
        $this->assertEquals($name, $this->address->getName());
    }

    /**
     * @test
     */
    public function shouldBeAwareOfAddress()
    {
        $address = '21 John Doe Street';
        $this->address->setAddress($address);
        $this->assertEquals($address, $this->address->getAddress());
    }

    /**
     * @test
     */
    public function shouldBeAwareOfPost()
    {
        $post = 'London';
        $this->address->setPost($post);
        $this->assertEquals($post, $this->address->getPost());
    }

    /**
     * @test
     */
    public function shouldBeAwareOfPostCode()
    {
        $postCode = ' SW1A 1AA';
        $this->address->setPostCode($postCode);
        $this->assertEquals($postCode, $this->address->getPostCode());
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

        $address = new Address($name, $internalAddress, $post, $postCode);
        $this->assertEquals($name, $address->getName());
        $this->assertEquals($internalAddress, $address->getAddress());
        $this->assertEquals($post, $address->getPost());
        $this->assertEquals($postCode, $address->getPostCode());

    }
}
 