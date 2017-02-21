<?php
namespace Fedex\Service;
class ValidationAvailabilityAndCommitmentService extends WebService
{
    protected $origin = array();
    protected $destination = array();
    protected $shipDate;
    protected $carrierCode;
    protected $service;
    protected $packing;


    function __construct()
    {
        $this->setWsdl(dirname(__FILE__) . '/wsdl/ValidationAvailabilityAndCommitmentService_v6.wsdl');
        $this->setShipDate(date('Y-m-d'));
    }

    /**
     * @param mixed $carrierCode
     * @return ValidationAvailabilityAndCommitmentService
     */
    public function setCarrierCode($carrierCode)
    {
        $this->carrierCode = $carrierCode;
        return $this;
    }

    /**
     * @param mixed $service
     * @return ValidationAvailabilityAndCommitmentService
     */
    public function setService($service)
    {
        $this->service = $service;
        return $this;
    }

    /**
     * @param mixed $packing
     * @return ValidationAvailabilityAndCommitmentService
     */
    public function setPacking($packing)
    {
        $this->packing = $packing;
        return $this;
    }

    function setOrigin($postCode, $countryCode)
    {
        $this->origin['PostalCode'] = $postCode;
        $this->origin['CountryCode'] = $countryCode;
        return $this;
    }

    function setDestination($postCode, $countryCode)
    {
        $this->destination['PostalCode'] = $postCode;
        $this->destination['CountryCode'] = $countryCode;
        return $this;
    }

    function setShipDate($data)
    {
        $this->shipDate = $data;
        return $this;
    }


    function toArray()
    {
        return array_merge(parent::toArray(), array(
            'Origin' => $this->origin,
            'Destination' => $this->destination,
            'ShipDate' => $this->shipDate,
            'CarrierCode' => $this->carrierCode,
            'Service' => $this->service,
            'Packaging' => $this->packing
        ));
    }

    function call()
    {
        try {
            $response = parent::call()->serviceAvailability($this->toArray());
            return $response;
        } catch (\SoapFault $e) {
            var_dump($e);
        }
    }
}