<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-2-22
 * Time: 14:17
 */

namespace Fedex\Structures\Base;


use Fedex\AbstractStructure;

/**
 * Class InsuredValue
 * 重量
 *
 * @package Fedex\Structures\Base
 */
class Weight extends AbstractStructure
{
    /**
     * Name of this complex type
     *
     * @var string
     */
    protected $_name = 'Weight';

    /**
     * 设置重量单位
     * @param $units
     * @return $this
     */
    function setUnits($units)
    {
        arr_set($this->_option, $this->key('Units'), $units);
        return $this;
    }

    /**
     * 数量
     * @param $value
     * @return $this
     */
    function setValue($value)
    {
        arr_set($this->_option, $this->key('Value'), $value);
        return $this;
    }
}