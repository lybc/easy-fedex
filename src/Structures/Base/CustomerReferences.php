<?php
namespace Fedex\Structures\Base;

use Fedex\AbstractStructure;

/**
 * Class CustomerReferences
 * 客户参考
 *
 * @package Fedex\Structures\Base
 */
class CustomerReferences extends AbstractStructure
{

    /**
     * CustomerReference Type
     */
    const TYPE_BILL_OF_LADING = 'BILL_OF_LADING';
    const TYPE_CUSTOMER_REFERENCE = 'CUSTOMER_REFERENCE';
    const TYPE_DEPARTMENT_NUMBER = 'DEPARTMENT_NUMBER';
    const TYPE_ELECTRONIC_PRODUCT_CODE = 'ELECTRONIC_PRODUCT_CODE';
    const TYPE_INTRACOUNTRY_REGULATORY_REFERENCE = 'INTRACOUNTRY_REGULATORY_REFERENCE';
    const TYPE_INVOICE_NUMBER = 'INVOICE_NUMBER';
    const TYPE_P_O_NUMBER = 'P_O_NUMBER';
    const TYPE_RMA_ASSOCIATION = 'RMA_ASSOCIATION';
    const TYPE_SHIPMENT_INTEGRITY = 'SHIPMENT_INTEGRITY';
    const TYPE_STORE_NUMBER = 'STORE_NUMBER';

    protected $_name = 'CustomerReferences';

    function setCustomerReferenceType($type)
    {
        $validTypes = [
            self::TYPE_BILL_OF_LADING,
            self::TYPE_CUSTOMER_REFERENCE,
            self::TYPE_DEPARTMENT_NUMBER,
            self::TYPE_ELECTRONIC_PRODUCT_CODE,
            self::TYPE_INTRACOUNTRY_REGULATORY_REFERENCE,
            self::TYPE_INVOICE_NUMBER,
            self::TYPE_P_O_NUMBER,
            self::TYPE_RMA_ASSOCIATION,
            self::TYPE_SHIPMENT_INTEGRITY,
            self::TYPE_STORE_NUMBER,
        ];

        if (!in_array($type, $validTypes)) throw new \InvalidArgumentException('Invalid CustomerReference Type: '.$type);
        arr_set($this->_option, $this->key('CustomerReferenceType'), $type);
        return $this;
    }

    function setValue($value)
    {
        arr_set($this->_option, $this->key('Value'), $value);
        return $this;
    }

}