<?php
/**
 * File: Country.php
 * Created at: 2014-11-20 21:28
 */
 
namespace Webit\Addressing\Model;

/**
 * Class Country
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 */
class Country implements CountryInterface {

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $isoCode;

    /**
     * @param string $name
     * @param string $isoCode
     */
    public function __construct($name = null, $isoCode = null)
    {
        $this->setName($name);
        $this->setIsoCode($isoCode);
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
    public function getIsoCode()
    {
        return $this->isoCode;
    }

    /**
     * @param string $isoCode
     */
    public function setIsoCode($isoCode)
    {
        $this->isoCode = $isoCode;
    }
}
