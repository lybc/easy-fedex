<?php
namespace Fedex\Structures\Base;


use Fedex\AbstractStructure;

class DropoffServicesDesired extends AbstractStructure
{
    /**
     * Name of this complex type
     *
     * @var string
     */
    protected $_name = 'DropoffServicesDesired';

    public function setExpress($express)
    {
        arr_set($this->_option, $this->key('Express'), $express);
        return $this;
    }

    public function setFedExStaffed($staffed)
    {
        arr_set($this->_option, $this->key('FedExStaffed'), $staffed);
        return $this;
    }

    public function setFedExSelfService($service)
    {
        arr_set($this->_option, $this->key('FedExSelfService'), $service);
        return $this;
    }

    public function setFedExAuthorizedShippingCenter($shippingCenter)
    {
        arr_set($this->_option, $this->key('FedExAuthorizedShippingCenter'), $shippingCenter);
        return $this;
    }

    public function setHoldAtLocation($location)
    {
        arr_set($this->_option, $this->key('HoldAtLocation'), $location);
        return $this;
    }

}