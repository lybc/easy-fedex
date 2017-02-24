<?php
namespace Fedex\Structures\Base;


use Fedex\AbstractStructure;

/**
 * Class Payor
 * 付款人
 *
 * @package Fedex\Structures\Base
 */
class Payor extends AbstractStructure
{
    /**
     * Name of this complex type
     *
     * @var string
     */
    protected $_name = 'Payor';

    function setResponsibleParty(ResponsibleParty $responsibleParty)
    {
        arr_set($this->_option, $this->_name, $responsibleParty);
        return $this;
    }
}