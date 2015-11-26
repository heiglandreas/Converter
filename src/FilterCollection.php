<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zf2 for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Converter;

class FilterCollection implements FilterInterface
{
    protected $collection = [];

    public function addFilter(FilterInterface $filter)
    {
        $this->collection[] = $filter;
    }

    public function apply($value)
    {
        foreach ($this->collection as $filter) {
            $value = $filter->apply($value);
        }

        return $value;
    }
}