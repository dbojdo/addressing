<?php
/**
 * File CountryRepositoryInMemoryFactory.php
 * Created at: 2014-12-04 05-07
 *
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 */

namespace Webit\Addressing\Repository;


use Doctrine\Common\Cache\Cache;
use Doctrine\Common\Collections\ArrayCollection;
use Webit\Addressing\Model\Country;

class CountryRepositoryInMemoryFactory
{
    /**
     * @var string
     */
    private $sourceDir;

    /**
     * @var Cache
     */
    private $cache;

    public function __construct($sourceDir = null, Cache $cache = null)
    {
        $this->sourceDir = $sourceDir ?: __DIR__.'/../Resources';
        $this->cache = $cache;
    }

    /**
     * @param string $language
     * @return CountryRepositoryInMemory
     */
    public function createCountryRepository($language = 'en')
    {
        $countries = $this->buildCountriesCollection($language);

        return new CountryRepositoryInMemory($countries);
    }

    /**
     * @param string $language
     * @return ArrayCollection
     */
    private function buildCountriesCollection($language)
    {
        $filename = sprintf('%s/countries.%s.json', $this->sourceDir, $language);
        if (is_file($filename) == false) {
            throw new \RuntimeException(
                sprintf('No countries source file for language "%s" (expected: %s)', $this->sourceDir, $language)
            );
        }

        $cacheKey = sprintf('countries.%s', $language);
        if ($this->cache && $this->cache->contains($cacheKey)) {
            return $this->cache->fetch($cacheKey);
        }

        $countries = new ArrayCollection();

        $arCountries = @json_decode(file_get_contents($filename), true);
        foreach ($arCountries as $arCountry) {
            $country = new Country($arCountry['countryName'], $arCountry['countryCode'], $arCountry['isoAlpha3'], $arCountry['isoNumeric']);
            $countries->add($country);
        }

        if ($this->cache) {
            $this->cache->save($cacheKey, $countries);
        }

        return $countries;
    }
}
