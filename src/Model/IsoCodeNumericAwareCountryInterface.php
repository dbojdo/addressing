<?php
/**
 * File: IsoCodeNumericAwareCountryInterface.php
 * Created at: 2014-11-20 21:17
 */
 
namespace Webit\Addressing\Model;

/**
 * Interface IsoCodeNumericAwareCountry
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 */
interface IsoCodeNumericAwareCountryInterface extends CountryInterface
{

    /**
     * @return string
     */
    public function getIsoCodeNumeric();

    /**
     * @param string $isoCodeNumeric
     */
    public function setIsoCodeNumeric($isoCodeNumeric);
}
 