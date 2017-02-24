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
 * 保险价值
 *
 * @package Fedex\Structures\Base
 */
class InsuredValue extends AbstractStructure
{
    /**
     * Name of this complex type
     *
     * @var string
     */
    protected $_name = 'InsuredValue';

    /**
     * 设置货币单位
     * @param $currency
     * @return $this
     */
    function setCurrency($currency)
    {
        arr_set($this->_option, $this->key('Currency'), $currency);
        return $this;
    }

    /**
     * 价值
     * @param $amount
     * @return $this
     */
    function setAmount($amount)
    {
        arr_set($this->_option, $this->key('Amount'), $amount);
        return $this;
    }
}