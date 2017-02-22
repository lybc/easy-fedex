<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-2-22
 * Time: 11:48
 */

namespace Fedex\Service;


class RateAvailableService extends WebService
{
    private $_wsdlVersion = '20';
    private $_serviceId = 'crs';

    function __construct()
    {
        $this->setWsdl('RateService_v20.wsdl');
        $this->setVersionInfo($this->_serviceId, $this->_wsdlVersion, '0', '0');
    }

}