<?php
namespace Fedex\Structures;

use Fedex\AbstractStructure;
use Fedex\Structures\Base\Address;
use Fedex\Structures\Base\Contact;

class RequestedShipment extends AbstractStructure
{
    /**
     * Name of this complex type
     *
     * @var string
     */
    protected $_name = 'RequestedShipment';

    /**
     * 设置包裹投递的日期和时间
     *
     * Identifies the date and time the package is tendered to FedEx.
     * Both the date and time portions of the string are expected to be used.
     *
     * @return $this
     */
    function setShipTimestamp()
    {
        arr_set($this->_option, $this->key('ShipTimeStamp'), date('c'));
        return $this;
    }

    /**
     * 设置包裹提货的方式
     *
     * Identifies the method by which the package is to be tendered to FedEx.
     * This element does not dispatch a courier for package pickup.
     *
     * @param $type
     * @return $this
     */
    function setDropoffType($type)
    {
        arr_set($this->_option, $this->key('DropoffType'), $type);
        return $this;
    }

    function setServiceType($type)
    {
        arr_set($this->_option, $this->key('ServiceType'), $type);
        return $this;
    }

    function setPackagingType($type)
    {
        arr_set($this->_option, $this->key('PackagingType'), $type);
        return $this;
    }

    /**
     * 确定运输包装的负责方(承运人)的描述性数据，Shipper 和 Origin 的地址应该相同
     *
     * Descriptive data identifying the party responsible for shipping the package. Shipper and Origin should have the same address.
     *
     * @param Contact $contact
     * @param Address $address
     * @return $this
     */
    function setShipper(Contact $contact, Address $address)
    {
        arr_set($this->_option, $this->key('Shipper'), $contact->toArray());
        arr_set($this->_option, $this->key('Shipper'), $address->toArray());
        return $this;
    }

    /**
     * 设置接收者的描述性数据
     *
     * @param Contact $contact
     * @param Address $address
     * @return $this
     */
    function setRecipient(Contact $contact, Address $address)
    {
        arr_set($this->_option, $this->key('Recipient'), $contact->toArray());
        arr_set($this->_option, $this->key('Recipient'), $address->toArray());
        return $this;
    }

    function setOrigin(Contact $contact, Address $address)
    {
        arr_set($this->_option, $this->key('Origin'), $contact->toArray());
        arr_set($this->_option, $this->key('Origin'), $address->toArray());
        return $this;
    }

    function setPackageCount($count)
    {
        arr_set($this->_option, $this->key('PackageCount'), $count);
        return $this;
    }

    function setShippingChargesPayment(ShippingChargePayment $payment)
    {
        $this->_option[$this->_name] = array_merge($this->_option[$this->_name], $payment->toArray());

        return $this;
    }

    function setRequestedPackageLineItems(RequestedPackageLineItems $items)
    {
        $this->_option[$this->_name] = array_merge($this->_option[$this->_name], $items->toArray());

        return $this;
    }

}