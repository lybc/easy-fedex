<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-2-22
 * Time: 14:17
 */

namespace Fedex\Structures\Base;


use Fedex\AbstractStructure;

class Address extends AbstractStructure
{
    /**
     * Name of this complex type
     *
     * @var string
     */
    protected $_name = 'Address';

    public function setStreetLines(array $streetLines)
    {
        arr_set($this->_option, $this->key('StreetLines'), $streetLines);
        return $this;
    }

    public function setCity($city)
    {
        arr_set($this->_option, $this->key('City'), $city);
        return $this;
    }

    public function setStateOrProvinceCode($stateOrProvinceCode)
    {
        arr_set($this->_option, $this->key('StateOrProvinceCode'), $stateOrProvinceCode);
        return $this;
    }

    public function setPostalCode($postalCode)
    {
        arr_set($this->_option, $this->key('PostalCode'), $postalCode);
        return $this;
    }

    public function setCountryCode($countryCode)
    {
        arr_set($this->_option, $this->key('CountryCode'), $countryCode);
        return $this;
    }

    function setResidential($residential)
    {
        arr_set($this->_option, $this->key('Residential'), $residential);
        return $this;
    }

}