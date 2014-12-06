<?php
/**
 * File: CountryAwareAddressInterface.php
 * Created at: 2014-11-20 21:21
 */
 
namespace Webit\Addressing\Model;

/**
 * Interface CountryAwareAddressInterface
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 */
interface CountryAwareAddressInterface extends AddressInterface
{

    /**
     * @return CountryInterface
     */
    public function getCountry();

    /**
     * @param CountryInterface $country
     */
    public function setCountry(CountryInterface $country = null);
}
