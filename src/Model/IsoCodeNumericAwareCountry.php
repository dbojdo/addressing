<?php
/**
 * File: IsoCodeNumericAwareCountry.php
 * Created at: 2014-11-20 21:17
 */
 
namespace Webit\Addressing\Model;

/**
 * Interface IsoCodeNumericAwareCountry
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 */
interface IsoCodeNumericAwareCountry {

    /**
     * @return string
     */
    public function getIsoCodeNumeric();

    /**
     * @param string $isoCodeNumeric
     */
    public function setIsoCodeNumeric($isoCodeNumeric);
}
 