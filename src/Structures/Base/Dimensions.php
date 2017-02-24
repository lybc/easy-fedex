<?php
namespace Fedex\Structures\Base;

use Fedex\AbstractStructure;

/**
 * Class Dimensions
 * 尺寸
 *
 * @package Fedex\Structures\Base
 */
class Dimensions extends AbstractStructure
{

    protected $_name = 'Dimensions';

    function setLength($length)
    {
        arr_set($this->_option, $this->key('Length'), $length);
        return $this;
    }

    function setWidth($width)
    {
        arr_set($this->_option, $this->key('Width'), $width);
        return $this;
    }

    function setHeight($height)
    {
        arr_set($this->_option, $this->key('Height'), $height);
        return $this;
    }

    function setUnits($units)
    {
        arr_set($this->_option, $this->key('Units'), $units);
        return $this;
    }

}