<?php
/**
 * File: Address.php
 * Created at: 2014-11-20 21:25
 */
 
namespace Webit\Addressing\Model;

/**
 * Class Address
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 */
class Address implements AddressInterface {

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $address;

    /**
     * @var string
     */
    protected $postCode;

    /**
     * @var string
     */
    protected $post;

    /**
     * @param string $name
     * @param string $address
     * @param string $post
     * @param string $postCode
     */
    public function __construct($name = null, $address = null, $post = null, $postCode = null)
    {
        $this->setName($name);
        $this->setAddress($address);
        $this->setPost($post);
        $this->setPostCode($postCode);
    }


    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * @param string $post
     */
    public function setPost($post)
    {
        $this->post = $post;
    }

    /**
     * @return string
     */
    public function getPostCode()
    {
        return $this->postCode;
    }

    /**
     * @param string $postCode
     */
    public function setPostCode($postCode)
    {
        $this->postCode = $postCode;
    }
}
