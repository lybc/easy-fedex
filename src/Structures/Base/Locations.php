<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-2-22
 * Time: 14:17
 */

namespace Fedex\Structures\Base;


use Fedex\AbstractStructure;

class Locations extends AbstractStructure
{
    /**
     * Name of this complex type
     *
     * @var string
     */
    protected $_name = '';

    function setLocationsSearchCriterion($criterion)
    {
        arr_set($this->_option, 'LocationsSearchCriterion', $criterion);
        return $this;
    }

    function setEffectiveDate($date = '')
    {
        if (empty($date)) $date = date('Y-m-d');
        arr_set($this->_option, 'EffectiveDate', $date);
        return $this;
    }

    function setMultipleMatchesAction($action)
    {
        arr_set($this->_option, 'MultipleMatchesAction', $action);
        return $this;
    }
}