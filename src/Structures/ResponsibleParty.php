<?php
namespace Fedex\Structures;


use Fedex\AbstractStructure;
use Fedex\Structures\Base\Address;
use Fedex\Structures\Base\Contact;
use Fedex\Structures\Base\Tins;

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
        $this->_option[$this->_name] = array_merge($this->_option[$this->_name], $tins->toArray());

        return $this;
    }

    function setContact(Contact $contact)
    {
        $this->_option[$this->_name] = array_merge($this->_option[$this->_name], $contact->toArray());

        return $this;
    }
    
    function setAddress(Address $address)
    {
        $this->_option[$this->_name] = array_merge($this->_option[$this->_name], $address->toArray());


        return $this;
    }



}