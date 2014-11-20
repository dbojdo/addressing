<?php
/**
 * File: ContactDetailsAwareAddressInterface.php
 * Created at: 2014-11-20 22:05
 */
 
namespace Webit\Addressing\Model;

/**
 * Interface ContactDetailsAwareAddressInterface
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 */
interface ContactDetailsAwareAddressInterface extends AddressInterface {

    /**
     * @return string
     */
    public function getContactPerson();

    /**
     * @param string $contactPerson
     */
    public function setContactPerson($contactPerson);

    /**
     * @return string
     */
    public function getContactPhoneNo();

    /**
     * @param string $contactPhoneNo
     */
    public function setContactPhoneNo($contactPhoneNo);

    /**
     * @return string
     */
    public function getContactEmail();

    /**
     * @param string $email
     */
    public function setContactEmail($email);
}
