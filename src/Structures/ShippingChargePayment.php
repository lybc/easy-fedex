<?php
namespace Fedex\Structures;


use Fedex\AbstractStructure;
use Fedex\Structures\Base\Address;
use Fedex\Structures\Base\Contact;

/**
 * Class ShippingChargePayment
 * 运费付款
 *
 * @package Fedex\Structures
 */
class ShippingChargePayment extends AbstractStructure
{
    /**
     * Name of this complex type
     * @var string
     */
    protected $_name = 'ShippingChargePayment';

    function setPaymentType($type)
    {
        arr_set($this->_option, $this->key('PaymentType'), $type);
        return $this;
    }

    /**
     * 设置付款人
     * @param Payor $payor
     * @return $this
     */
    function setPayor(Payor $payor)
    {
        $this->_option[$this->_name] = array_merge($this->_option[$this->_name], $payor->toArray());

        return $this;
    }

    function setContact(Contact $contact)
    {
        $this->_option[$this->_name] = array_merge($this->_option[$this->_name], $contact->toArray());

        return $this;
    }

    function setAddress(Address $address)
    {
        $this->_option[$this->_name] = array_merge($this->_option[$this->_name], $address->toArray());

        return $this;
    }



}