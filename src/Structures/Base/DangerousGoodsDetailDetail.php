<?php
namespace Fedex\Structures\Base;


use Fedex\AbstractStructure;

/**
 * Class DangerousGoodsDetailDetail
 * 危险品物品详细信息
 *
 * @package Fedex\Structures\Base
 */
class DangerousGoodsDetailDetail extends AbstractStructure
{
    /**
     * Name of this complex type
     *
     * @var string
     */
    protected $_name = 'DangerousGoodsDetailDetail';

    function setUploadedTrackingNumber($num)
    {
        arr_set($this->_option, $this->key('UploadedTrackingNumber'), $num);
        return $this;
    }

}