<?php
namespace Fedex;

abstract class AbstractStructure
{
    protected $_option = [];
    protected $_name;

    function toArray()
    {
        return $this->_option;
    }

    function key($key)
    {
        return $key . '.' . $this->_name;
    }

}