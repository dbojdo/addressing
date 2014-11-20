<?php
/**
 * File: CountryAwareAddress.php
 * Created at: 2014-11-20 21:27
 */
 
namespace Webit\Addressing\Model;

/**
 * Class CountryAwareAddress
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 */
class CountryAwareAddress extends Address implements CountryAwareAddressInterface {

    /**
     * @var CountryInterface
     */
    protected $country;

    /**
     * @param string $name
     * @param string $address
     * @param string $post
     * @param string $postCode
     * @param CountryInterface $country
     */
    public function __construct(
        $name = null,
        $address = null,
        $post = null,
        $postCode = null,
        CountryInterface $country = null
    ) {
        parent::__construct($name, $address, $post, $postCode);
        $this->setCountry($country);
    }

    /**
     * @return CountryInterface
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param CountryInterface $country
     */
    public function setCountry(CountryInterface $country = null)
    {
        $this->country = $country;
    }
}
