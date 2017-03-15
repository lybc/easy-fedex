<?php
namespace Fedex\Structures;
use Fedex\AbstractStructure;
use Fedex\Structures\Base\PackageIdentifier;

class SectionDetails extends AbstractStructure
{
    /**
     * Name of this complex type
     *
     * @var string
     */
    protected $_name = 'SectionDetails';

    function setPackageIdentifier(PackageIdentifier $identifier)
    {
        arr_include($this->_option[$this->_name], $identifier->toArray());
        return $this;
    }

    function setCarrierCode($code)
    {
        arr_set($this->_option, $this->key('CarrierCode'), $code);
        return $this;
    }
}