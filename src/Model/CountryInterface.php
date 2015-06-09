<?php
/**
 * File: CountryInterface.php
 * Created at: 2014-11-20 21:11
 */
 
namespace Webit\Addressing\Model;

/**
 * Interface CountryInterface
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 */
interface CountryInterface {

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $name
     */
    public function setName($name);

    /**
     * @return string
     */
    public function getIsoCode();

    /**
     * @param string $isoCode
     */
    public function setIsoCode($isoCode);

    /**
     * @return string
     */
    public function __toString();
}
