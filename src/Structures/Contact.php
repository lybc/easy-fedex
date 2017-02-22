<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-2-22
 * Time: 14:17
 */

namespace Fedex\Structures;


use Fedex\AbstractStructure;

class Contact extends AbstractStructure
{
    /**
     * Name of this complex type
     *
     * @var string
     */
    protected $_name = 'Contact';

    public function setContactId($contactId)
    {
        arr_set($this->_option, $this->key('ContactId'), $contactId);
        return $this;
    }

    public function setPersonName($personName)
    {
        arr_set($this->_option, $this->key('PersonName'), $personName);
        return $this;
    }

    public function setTitle($title)
    {
        arr_set($this->_option, $this->key('Title'), $title);
        return $this;
    }

    public function setCompanyName($companyName)
    {
        arr_set($this->_option, $this->key('CompanyName'), $companyName);

        return $this;
    }

    public function setPhoneNumber($phoneNumber)
    {
        arr_set($this->_option, $this->key('PhoneNumber'), $phoneNumber);

        return $this;
    }

}