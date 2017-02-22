<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-2-22
 * Time: 11:48
 */

namespace Fedex\Service;


class RateService extends WebService
{
    private $_wsdlVersion = '20';
    private $_serviceId = 'crs';

    function __construct()
    {
        $this->setWsdl('RateService_v20.wsdl');
        $this->setVersionInfo($this->_serviceId, $this->_wsdlVersion, '0', '0');
    }

    /**
     * 允许返回调用者指定的传输时间和提交数据
     * @param bool $allow
     * @return $this
     */
    function setReturnTransitAndCommit($allow = true)
    {
        arr_set($this->options, 'ReturnTransitAndCommit', $allow);
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
    function setDropOffType($type)
    {
        arr_set($this->options, 'RequestedShipment.DropoffType', $type);
        return $this;
    }

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
        arr_set($this->options, 'RequestedShipment.ShipTimestamp', date('c'));
        return $this;
    }

    function setServiceType($type)
    {
        arr_set($this->options, 'RequestedShipment.ServiceType', $type);
        return $this;
    }

    function setPackagingType($type)
    {
        arr_set($this->options, 'RequestedShipment.PackagingType', $type);
        return $this;
    }

    /**
     * 确定运输包装的负责方(承运人)的描述性数据，Shipper 和 Origin的地址应该相同
     *
     * Descriptive data identifying the party responsible for shipping the package. Shipper and Origin should have the same address.
     *
     * @param $shipper
     * @return $this
     */
    function setShipper($shipper)
    {
        arr_set($this->options, 'RequestedShipment.Shipper', $shipper);
        return $this;
    }
}