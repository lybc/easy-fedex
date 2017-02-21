<?php
namespace Fedex\Service;

abstract class WebService
{
    protected $wsdlPath = '';

    protected $options = array(
        'CustomerTransactionId' => ' *** Service Availability Request v5.1 using PHP ***'
    );

    function setVersionInfo($serviceId, $major, $intermediate, $minor)
    {
        $this->options['Version']['ServiceId'] = $serviceId;
        $this->options['Version']['Major'] = $major;
        $this->options['Version']['Intermediate'] = $intermediate;
        $this->options['Version']['Minor'] = $minor;
        return $this;
    }

    function setTransactionDetail($transactionDetail)
    {
        $this->options['TransactionDetail']['CustomerTransactionId'] = $transactionDetail;
        return $this;
    }

    function setUserCredential($key, $password, $account, $meter)
    {
        $this->options['WebAuthenticationDetail']['UserCredential']['Key'] = $key;
        $this->options['WebAuthenticationDetail']['UserCredential']['Password'] = $password;
        $this->options['ClientDetail']['AccountNumber'] = $account;
        $this->options['ClientDetail']['MeterNumber'] = $meter;
        return $this;
    }

    function set($key, $value)
    {
        arr_set($this->options, $key, $value);
    }

    function setWsdl($wsdl)
    {
        $this->wsdlPath = wsdl_path($wsdl);
        return $this;
    }

    function call()
    {
        ini_set("soap.wsdl_cache_enabled", "0");
        return new \SoapClient($this->wsdlPath, array('trace' => 1));
    }
}