<?php
/**
 * File CountryRepositoryInMemory.php
 * Created at: 2014-12-04 04-11
 */

namespace Webit\Addressing\Repository;


use Doctrine\Common\Collections\ArrayCollection;
use Webit\Addressing\Model\CountryCodeTypes;
use Webit\Addressing\Model\CountryInterface;
use Webit\Addressing\Model\IsoCodeAlpha3AwareCountry;
use Webit\Addressing\Model\IsoCodeAlpha3AwareCountryInterface;
use Webit\Addressing\Model\IsoCodeNumericAwareCountryInterface;

class CountryRepositoryInMemory implements CountryRepositoryInterface
{
    /**
     * @var ArrayCollection
     */
    private $countries;

    public function __construct(ArrayCollection $countries)
    {
        $this->countries = $this->index($countries);
    }

    private function index(ArrayCollection $countries)
    {
        $indexed = new ArrayCollection();

        /** @var CountryInterface $country */
        foreach ($countries as $country) {
            $indexed->set($country->getIsoCode(), $country);
        }

        return $indexed;
    }

    /**
     * @param string $code
     * @param string $codeType
     * @return CountryInterface
     */
    public function getCountry($code, $codeType = CountryCodeTypes::TYPE_ALPHA2)
    {
        switch ($codeType) {
            case CountryCodeTypes::TYPE_ALPHA2:
                return $this->countries->get($code);
            case CountryCodeTypes::TYPE_ALPHA3:
                return $this->findCountryByAlpha3Code($code);
            case CountryCodeTypes::TYPE_NUMERIC:
                return $this->findCountryByNumericCode($code);
        }

        return null;
    }

    /**
     * @return ArrayCollection
     */
    public function getCountries()
    {
        return $this->countries;
    }

    /**
     * @param string $code
     * @return null|CountryInterface
     */
    private function findCountryByAlpha3Code($code)
    {
        /** @var CountryInterface $country */
        foreach ($this->countries as $country) {
            if ($country instanceof IsoCodeAlpha3AwareCountryInterface && $country->getIsoCodeAlpha3() == $code) {
                return $country;
            }
        }

        return null;
    }

    /**
     * @param string $code
     * @return null|CountryInterface
     */
    private function findCountryByNumericCode($code)
    {
        /** @var CountryInterface $country */
        foreach ($this->countries as $country) {
            if ($country instanceof IsoCodeNumericAwareCountryInterface && $country->getIsoCodeNumeric() == $code) {
                return $country;
            }
        }

        return null;
    }

    /**
     * @param string $name
     * @return CountryInterface
     */
    public function findCountryByName($name)
    {
        $name = $this->getSearchableName($name);

        /** @var CountryInterface $country */
        foreach ($this->countries as $country) {
            if ($name == $this->getSearchableName($country->getName())) {
                return $country;
            }
        }

        return null;
    }

    /**
     * @param string $name
     * @return string
     */
    private function getSearchableName($name)
    {
        $name = preg_replace('/\s/', '', mb_strtolower($name));

        return $name;
    }
} 