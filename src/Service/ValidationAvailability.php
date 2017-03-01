<?php
namespace Fedex\Service;
class ValidationAvailability extends WebService
{


    function __construct()
    {
        $this->setWsdl('ValidationAvailabilityAndCommitmentService_v6.wsdl');
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