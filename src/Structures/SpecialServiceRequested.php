<?php
namespace Fedex\Structures;


use Fedex\AbstractStructure;
use Fedex\Structures\Base\DangerousGoodsDetailDetail;

/**
 * Class Payor
 * 付款人
 *
 * @package Fedex\Structures
 */
class SpecialServiceRequested extends AbstractStructure
{
    /**
     * Name of this complex type
     *
     * @var string
     */
    protected $_name = 'SpecialServiceRequested';

    function setDangerousGoodsDetail(DangerousGoodsDetailDetail $goods)
    {
        arr_set($this->_option, $this->key('DangerousGoodsDetail'), $goods);
        return $this;
    }
}