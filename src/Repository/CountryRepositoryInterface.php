<?php
/**
 * File: CountryRepositoryInterface.php
 * Created at: 2014-12-03 03:58
 */

namespace Webit\Addressing\Repository;

use Doctrine\Common\Collections\ArrayCollection;
use Webit\Addressing\Model\CountryCodeTypes;

interface CountryRepositoryInterface
{
    /**
     * @param string $code
     * @param string $codeType
     * @return CountryInterface
     */
    public function getCountry($code, $codeType = CountryCodeTypes::TYPE_ALPHA2);

    /**
     * @param string $name
     * @return CountryInterface
     */
    public function findCountryByName($name);

    /**
     * @return ArrayCollection
     */
    public function getCountries();
}
