<?php
namespace Fedex\Service;

abstract class WebService
{
    protected $wsdlPath = '';
    protected $userCredential = array();
    protected $clientDetail = array();
    protected $version = array(
        'ServiceId' => 'vacs',
        'Major' => '6',
        'Intermediate' => '0',
        'Minor' => '0'
    );

    protected $transactionDetail = array(
        'CustomerTransactionId' => ' *** Service Availability Request v5.1 using PHP ***'
    );

    function setVersionInfo($serviceId, $major, $intermediate, $minor)
    {
        $this->version['ServiceId'] = $serviceId;
        $this->version['Major'] = $major;
        $this->version['Intermediate'] = $intermediate;
        $this->version['Minor'] = $minor;
        return $this;
    }

    function setTransactionDetail($transactionDetail)
    {
        $this->transactionDetail['CustomerTransactionId'] = $transactionDetail;
        return $this;
    }

    function setUserCredential($key, $password, $account, $meter)
    {
        $this->userCredential['Key'] = $key;
        $this->userCredential['Password'] = $password;
        $this->clientDetail['AccountNumber'] = $account;
        $this->clientDetail['MeterNumber'] = $meter;
        return $this;
    }

    function setWsdl($wsdl)
    {
        $this->wsdlPath = $wsdl;
        return $this;
    }

    function toArray(){
        return array(
            'WebAuthenticationDetail' => array('UserCredential' => $this->userCredential),
            'ClientDetail' => $this->clientDetail,
            'TransactionDetail' => $this->transactionDetail,
            'Version' => $this->version
        );
    }

    function call()
    {
        ini_set("soap.wsdl_cache_enabled", "0");
        return new \SoapClient($this->wsdlPath, array('trace' => 1));
    }
}