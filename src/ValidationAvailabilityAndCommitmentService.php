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
        $this->origin['PostCode'] = $postCode;
        $this->origin['CountryCode'] = $countryCode;
        return $this;
    }

    function setDestination($postCode, $countryCode)
    {
        $this->destination['PostCode'] = $postCode;
        $this->destination['CountryCode'] = $countryCode;
        return $this;
    }

    function setShipDate($data)
    {
        $this->shipDate = $data;
        return $this;
    }

    function __construct()
    {
        $this->setWsdl('wsdl/ValidationAvailabilityAndCommitmentService_v6.wsdl');
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
        return parent::call()->serviceAvailability($this->toArray());
    }
}
$path_to_wsdl = "wsdl/ValidationAvailabilityAndCommitmentService_v6.wsdl";



$client = new SoapClient($path_to_wsdl, array('trace' => 1)); // Refer to http://us3.php.net/manual/en/ref.soap.php for more information

$request['WebAuthenticationDetail'] = array(
    'UserCredential' => array(
        'Key' => 'mU2Zo7b1d7IxSYnh',
        'Password' => '3vmHGKAWOYRzbyPbNkbYXZIV1 '
//        'Key' => 'vDevtsfSMaiMaH2C',
//        'Password' => 'BTPWF3lWyU0cQ9tTBy1ST9OWY'
    )
);
$request['ClientDetail'] = array(
    'AccountNumber' => '510087240',
    'MeterNumber' => '118780790'
);
$request['TransactionDetail'] = array('CustomerTransactionId' => ' *** Service Availability Request v5.1 using PHP ***');
$request['Version'] = array(
    'ServiceId' => 'vacs',
    'Major' => '6',
    'Intermediate' => '0',
    'Minor' => '0'
);
$request['Origin'] = array(
    'PostalCode' => '77510', // Origin details
    'CountryCode' => 'US'
);
$request['Destination'] = array(
    'PostalCode' => '38017', // Destination details
    'CountryCode' => 'US'
);
$request['ShipDate'] = date('Y-m-d');
$request['CarrierCode'] = 'FDXE'; // valid codes FDXE-Express, FDXG-Ground, FDXC-Cargo, FXCC-Custom Critical and FXFR-Freight
$request['Service'] = 'PRIORITY_OVERNIGHT'; // valid code STANDARD_OVERNIGHT, PRIORITY_OVERNIGHT, FEDEX_GROUND, ...
$request['Packaging'] = 'YOUR_PACKAGING'; // valid code FEDEX_BOX, FEDEX_PAK, FEDEX_TUBE, YOUR_PACKAGING, ...



try {

    $response = $client ->serviceAvailability($request);

    if ($response -> HighestSeverity != 'FAILURE' && $response -> HighestSeverity != 'ERROR'){
        echo 'The following service type(s) are available.'. Newline;
        echo '<table border="1">';
        foreach ($response->Options as $optionKey => $option){
            echo '<tr><td><table>';
            if(is_string($option)){
                echo '<tr><td>' . $optionKey . '</td><td>' . $option . '</td></tr>';
            }else{
                foreach($option as $subKey => $subOption){
                    echo '<tr><td>' . $subKey . '</td><td>' . $subOption . '</td></tr>';
                }
            }
            echo '</table></td></tr>';
        }
        echo'</table>';

        printSuccess($client, $response);
    }else{
        printError($client, $response);
    }

    writeToLog($client);    // Write to log file
} catch (SoapFault $exception) {
    printFault($exception, $client);
}