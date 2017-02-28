<?php
namespace Fedex\Structures;


use Fedex\AbstractStructure;

/**
 * Class Payor
 * 付款人
 *
 * @package Fedex\Structures
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
        arr_include($this->_option[$this->_name], $responsibleParty->toArray());
        return $this;
    }
}