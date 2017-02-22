<?php
namespace Fedex\Structures\Base;


use Fedex\AbstractStructure;

class ClientDetail extends AbstractStructure
{
    /**
     * Name of this complex type
     *
     * @var string
     */
    protected $_name = 'ClientDetail';

    public function setAccountNumber($account)
    {
        arr_set($this->_option, $this->key('AccountNumber'), $account);
        return $this;
    }

    public function setMeterNumber($meter)
    {
        arr_set($this->_option, $this->key('MeterNumber'), $meter);
        return $this;
    }

    public function setIntegratorId($IntegratorId)
    {
        arr_set($this->_option, $this->key('IntegratorId'), $IntegratorId);
        return $this;
    }

    public function setLocalization($lang, $locale)
    {
        arr_set($this->_option, $this->key('Localization.LanguageCode'), $lang);
        arr_set($this->_option, $this->key('Localization.LocaleCode'), $locale);
        return $this;
    }



}