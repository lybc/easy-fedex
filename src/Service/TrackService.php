<?php
namespace Fedex\Service;


class TrackService extends WebService
{

    private $_wsdlVersion = '12';
    private $_serviceId = 'trck';

    function __construct()
    {
        $this->setWsdl(dirname(__FILE__) . '/../wsdl/TrackService_v12.wsdl');
        $this->setVersionInfo($this->_serviceId, $this->_wsdlVersion, '0', '0');
    }

    /**
     * @param $type
     * @param $tracingNum
     */
    function setSelectionDetails($type, $tracingNum)
    {
        $this->options['PackageIdentifier']['type'] = $type;
        $this->options['PackageIdentifier']['Value'] = $tracingNum;
    }

    function call()
    {
        try {
            $response = parent::call()->track($this->options);
            return $response;
        } catch (\SoapFault $e) {
            var_dump($e);
        }
    }
}