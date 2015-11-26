<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zf2 for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Converter\Length\Filter;

use Converter\FilterInterface;

class DotsPerInch implements FilterInterface
{

    protected $dpi;

    public function __construct($dpi)
    {
        $this->dpi = $dpi;
    }

    public function apply($value)
    {
        if ($this->dpi == 0) {
            return 0;
        }
        return $value / $this->dpi * 2.54;
    }
}