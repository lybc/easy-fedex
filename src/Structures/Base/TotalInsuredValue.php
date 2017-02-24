<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-2-22
 * Time: 14:17
 */

namespace Fedex\Structures\Base;


use Fedex\AbstractStructure;

class TotalInsuredValue extends AbstractStructure
{
    /**
     * Name of this complex type
     *
     * @var string
     */
    protected $_name = 'TotalInsuredValue';

    function setAmmount($ammount)
    {
        arr_set($this->_option, $this->key('Ammount'), $ammount);
        return $this;
    }

}