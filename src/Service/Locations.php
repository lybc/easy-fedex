<?php

namespace Fedex\Service;


class Locations extends WebService
{
    private $_wsdlVersion = '5';
    private $_serviceId = 'locs';

    function __construct()
    {
        $this->setWsdl('LocationsService_v5.wsdl');
//        $this->setVersionInfo($this->_serviceId, $this->_wsdlVersion, '0', '0');
    }

    function call()
    {
        parent::call()->searchLocations($this->options);
    }


}