<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-3-1
 * Time: 16:19
 */

namespace Fedex\Structures;

use Fedex\AbstractStructure;

class ServiceAvailabilityRequest extends AbstractStructure
{
    public function setShipDate($date = '')
    {
        if (empty($date)) $date = date('Y-m-d');
        arr_set($this->_option, 'ShipDate', $date);
        return $this;
    }

    public function setCarrierCode($code)
    {
        arr_set($this->_option, 'CarrierCode', $code);
        return $this;
    }

    public function setService($service)
    {
        arr_set($this->_option, 'Service', $service);
        return $this;
    }

    public function setPackaging($package)
    {
        arr_set($this->_option, 'Packaging', $package);
        return $this;
    }

    public function setOrigin($postalCode, $countryCode)
    {
        arr_set($this->_option, 'Origin.PostalCode', $postalCode);
        arr_set($this->_option, 'Origin.CountryCode', $countryCode);
        return $this;
    }

    public function setDestination($postalCode, $countryCode)
    {
        arr_set($this->_option, 'Destination.PostalCode', $postalCode);
        arr_set($this->_option, 'Destination.CountryCode', $countryCode);
        return $this;
    }
}