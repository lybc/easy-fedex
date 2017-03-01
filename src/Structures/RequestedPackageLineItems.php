<?php
namespace Fedex\Structures;


use Fedex\AbstractStructure;
use Fedex\Structures\Base\CustomerReferences;
use Fedex\Structures\Base\Dimensions;
use Fedex\Structures\Base\InsuredValue;
use Fedex\Structures\Base\Weight;

/**
 * Class RequestedPackageLineItems
 * 描述运输的包裹相关信息
 *
 * @package Fedex\Structures
 */
class RequestedPackageLineItems extends AbstractStructure
{
    protected $_name = 'RequestedPackageLineItems';

    function setSequenceNumber($num)
    {
        arr_set($this->_option, $this->key('SequenceNumber'), $num);
        return $this;
    }

    function setInsuredValue(InsuredValue $insuredValue)
    {
        arr_include($this->_option[$this->_name], $insuredValue->toArray());
        return $this;
    }

    function setWeight(Weight $weight)
    {
        arr_include($this->_option[$this->_name], $weight->toArray());
        return $this;
    }

    function setDimensions(Dimensions $dimensions)
    {
        arr_include($this->_option[$this->_name], $dimensions->toArray());
        return $this;
    }

    function setCustomerReferences(CustomerReferences $references)
    {
        arr_include($this->_option[$this->_name], $references->toArray());
        return $this;
    }

    function setGroupPackageCount($count)
    {
        arr_set($this->_option, $this->key('GroupPackageCount'), $count);
        return $this;
    }

    function setPhysicalPackaging($physicalPackaging)
    {
        arr_set($this->_option, $this->key('PhysicalPackaging'), $physicalPackaging);
        return $this;
    }

    function setItemDescription($desc)
    {
        arr_set($this->_option, $this->key('ItemDescription'), $desc);
        return $this;
    }
}