<?php
/**
 * File: CountryCodeTypes.php
 * Created at: 2014-12-03 03:58
 */

namespace Webit\Addressing\Model;

class CountryCodeTypes
{
    const TYPE_NUMERIC = 'numeric';
    const TYPE_ALPHA2 = 'alpha2';
    const TYPE_ALPHA3 = 'alpha3';

    /**
     * @return array
     */
    public static function getCodeTypes()
    {
        $refClass = new \ReflectionClass(get_called_class());
        return array_values($refClass->getConstants());
    }
}
