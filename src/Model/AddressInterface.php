<?php
/**
 * File: AddressInterface.php
 * Created at: 2014-11-20 21:11
 */
 
namespace Webit\Addressing\Model;

/**
 * Interface AddressInterface
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 */
interface AddressInterface {

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string
     */
    public function setName($name);

    /**
     * @return string
     */
    public function getAddress();

    /**
     * @param string
     */
    public function setAddress($address);

    /**
     * @return string
     */
    public function getPost();

    /**
     * @param string
     */
    public function setPost($post);

    /**
     * @return string
     */
    public function getPostCode();

    /**
     * @param string
     */
    public function setPostCode($postCode);
}
