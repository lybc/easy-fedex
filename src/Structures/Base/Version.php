<?php
namespace Fedex\Structures\Base;


use Fedex\AbstractStructure;

class Version extends AbstractStructure
{
    /**
     * Name of this complex type
     *
     * @var string
     */
    protected $_name = 'Version';

    function setServiceId($serviceId)
    {
        arr_set($this->_option, $this->key('ServiceId'), $serviceId);
        return $this;
    }

    function setMajor($major)
    {
        arr_set($this->_option, $this->key('Major'), $major);
        return $this;
    }

    function setIntermediate($Intermediate)
    {
        arr_set($this->_option, $this->key('Intermediate'), $Intermediate);
        return $this;
    }

    function setMinor($Minor)
    {
        arr_set($this->_option, $this->key('Minor'), $Minor);
        return $this;
    }
}