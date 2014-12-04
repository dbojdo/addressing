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
class Country implements IsoCodeNumericAwareCountryInterface, IsoCodeAlpha3AwareCountryInterface {

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $isoCode;

    /**
     * @var string
     */
    protected $isoCodeAlpha3;

    /**
     * @var string
     */
    protected $isoCodeNumeric;

    /**
     * @param string $name
     * @param string $isoCode
     */
    public function __construct($name = null, $isoCode = null, $isoCodeAlpha3 = null, $isoCodeNumeric = null)
    {
        $this->setName($name);
        $this->setIsoCode($isoCode);
        $this->setIsoCodeAlpha3($isoCodeAlpha3);
        $this->setIsoCodeNumeric($isoCodeNumeric);
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

    /**
     * @return string
     */
    public function getIsoCodeAlpha3()
    {
        return $this->isoCodeAlpha3;
    }

    /**
     * @param string $isoCodeAlpha3
     */
    public function setIsoCodeAlpha3($isoCodeAlpha3)
    {
        $this->isoCodeAlpha3 = $isoCodeAlpha3;
    }

    /**
     * @return string
     */
    public function getIsoCodeNumeric()
    {
        return $this->isoCodeNumeric;
    }

    /**
     * @param string $isoCodeNumeric
     */
    public function setIsoCodeNumeric($isoCodeNumeric)
    {
        $this->isoCodeNumeric = $isoCodeNumeric;
    }
}
