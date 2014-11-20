<?php
/**
 * File: IsoCodeAlpha3AwareCountry.php
 * Created at: 2014-11-20 21:16
 */
 
namespace Webit\Addressing\Model;

/**
 * Interface IsoCodeAlpha3AwareCountry
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 */
interface IsoCodeAlpha3AwareCountry extends CountryInterface {

    /**
     * @return string
     */
    public function getIsoCodeAlpha3();

    /**
     * @param string $isoCodeAlpha3
     */
    public function setIsoCodeAlpha3($isoCodeAlpha3);
}
 