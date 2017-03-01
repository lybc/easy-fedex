<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-3-1
 * Time: 16:19
 */

namespace Fedex\Structures;


use Fedex\AbstractStructure;

class ValidationAvailability extends AbstractStructure
{
    function setShipDate($date = '')
    {
        if (empty($date)) $date = date('Y-m-d');
        arr_set($this->_option, 'ShipDate', $date);
        return $this;
    }

    function setCarrierCode($code)
    {
        arr_set($this->_option, 'CarrierCode', $code);
        return $this;
    }

    function setService($service)
    {
        arr_set($this->_option, 'Service', $service);
        return $this;
    }

    function setPackaging($package)
    {
        arr_set($this->_option, 'Packaging', $package);
        return $this;
    }
}