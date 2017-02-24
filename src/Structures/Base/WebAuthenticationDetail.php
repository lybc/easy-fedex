<?php
namespace Fedex\Structures\Base;


use Fedex\AbstractStructure;

class WebAuthenticationDetail extends AbstractStructure
{
    /**
     * Name of this complex type
     *
     * @var string
     */
    protected $_name = 'WebAuthenticationDetail';

    public function setParentCredential($key, $password)
    {
        arr_set($this->_option, $this->key('ParentCredential.Key'), $key);
        arr_set($this->_option, $this->key('ParentCredential.Password'), $password);
        return $this;
    }

    public function setUserCredential($key, $password)
    {
        arr_set($this->_option, $this->key('UserCredential.Key'), $key);
        arr_set($this->_option, $this->key('UserCredential.Password'), $password);
        return $this;
    }



}