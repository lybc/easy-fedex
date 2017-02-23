<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-2-22
 * Time: 14:17
 */

namespace Fedex\Structures\Base;


use Fedex\AbstractStructure;

class Tins extends AbstractStructure
{
    /**
     * Name of this complex type
     *
     * @var string
     */
    protected $_name = 'Tins';

    function setTinType($type)
    {
        arr_set($this->_option, $this->key('TinType'), $type);
        return $this;
    }

    function setNumber($number)
    {
        arr_set($this->_option, $this->key('Number'), $number);
        return $this;
    }

    function setUsage($usage)
    {
        arr_set($this->_option, $this->key('Usage'), $usage);
        return $this;
    }

}