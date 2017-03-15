<?php
namespace Fedex\Service;

class TrackService extends WebService
{

    private $_wsdlVersion = '12';
    private $_serviceId = 'trck';

    public function __construct()
    {
        $this->setWsdl('TrackService_v12.wsdl');
        $this->setVersionInfo($this->_serviceId, $this->_wsdlVersion, '0', '0');
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
