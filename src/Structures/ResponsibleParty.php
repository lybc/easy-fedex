<?php
namespace Fedex\Structures\Base;


use Fedex\AbstractStructure;

class ResponsibleParty extends AbstractStructure
{
    /**
     * Name of this complex type
     * 责任方
     *
     * @var string
     */
    protected $_name = 'ResponsibleParty';

    function setAccountNumber($account)
    {
        arr_set($this->_option, $this->key('AccountNumber'), $account);
        return $this;
    }

    function setTine(Tins $tins)
    {
        arr_set($this->_option, $this->_name, $tins->toArray());
        return $this;
    }

    function setContact(Contact $contact)
    {
        arr_set($this->_option, $this->_name, $contact->toArray());
        return $this;
    }
    
    function setAddress(Address $address)
    {
        arr_set($this->_option, $this->_name, $address->toArray());
        return $this;
    }



}