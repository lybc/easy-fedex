<?php
namespace Fedex\Structures\Base;
use Fedex\AbstractStructure;

class PackageIdentifier extends AbstractStructure
{
    protected $_name = 'PackageIdentifier';

    function setType($type)
    {
        arr_set($this->_option, $this->key('Type'), $type);
        return $this;
    }

    function setValue($value)
    {
        arr_set($this->_option, $this->key('Value'), $value);
        return $this;
    }
}