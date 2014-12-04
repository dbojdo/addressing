<?php
/**
 * File: IsoCodeAlpha3AwareCountryInterface.php
 * Created at: 2014-11-20 21:16
 */
 
namespace Webit\Addressing\Model;

/**
 * Interface IsoCodeAlpha3AwareCountryInterface
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 */
interface IsoCodeAlpha3AwareCountryInterface extends CountryInterface
{

    /**
     * @return string
     */
    public function getIsoCodeAlpha3();

    /**
     * @param string $isoCodeAlpha3
     */
    public function setIsoCodeAlpha3($isoCodeAlpha3);
}
 