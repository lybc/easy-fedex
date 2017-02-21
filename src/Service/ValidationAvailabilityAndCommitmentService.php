<?php
namespace Fedex\Service;
class ValidationAvailabilityAndCommitmentService extends WebService
{

    private $_wsdlVersion = '6';
    private $_serviceId = 'vacs';

    function __construct()
    {
        $this->setWsdl('ValidationAvailabilityAndCommitmentService_v6.wsdl');
        $this->setShipDate(date('Y-m-d'));
        $this->setVersionInfo($this->_serviceId, $this->_wsdlVersion, '0', '0');
    }

    /**
     * @param mixed $carrierCode
     * @return ValidationAvailabilityAndCommitmentService
     */
    public function setCarrierCode($carrierCode)
    {
        $this->options['CarrierCode'] = $carrierCode;
        return $this;
    }

    /**
     * @param mixed $service
     * @return ValidationAvailabilityAndCommitmentService
     */
    public function setService($service)
    {
        $this->options['Service'] = $service;
        return $this;
    }

    /**
     * @param mixed $packing
     * @return ValidationAvailabilityAndCommitmentService
     */
    public function setPackaging($packing)
    {
        $this->options['Packaging'] = $packing;
        return $this;
    }

    function setOrigin($postCode, $countryCode)
    {
        $this->options['Origin']['PostalCode'] = $postCode;
        $this->options['Origin']['CountryCode'] = $countryCode;
        return $this;
    }

    function setDestination($postCode, $countryCode)
    {
        $this->options['Destination']['PostalCode'] = $postCode;
        $this->options['Destination']['CountryCode'] = $countryCode;
        return $this;
    }

    function setShipDate($data)
    {
        $this->options['ShipDate'] = $data;
        return $this;
    }

    function call()
    {
        try {
            $response = parent::call()->serviceAvailability($this->options);
            return $response;
        } catch (\SoapFault $e) {
            var_dump($e);
        }
    }
}