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
        arr_set($this->_option, $this->key('ParentCredential.key'), $key);
        arr_set($this->_option, $this->key('ParentCredential.password'), $password);
        return $this;
    }

    public function setUserCredential($key, $password)
    {
        arr_set($this->_option, $this->key('UserCredential.key'), $key);
        arr_set($this->_option, $this->key('UserCredential.password'), $password);
        return $this;
    }



}