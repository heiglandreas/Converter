<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zf2 for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Converter\Length\Filter;

class DotsPerInchTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @param $dpi
     * @param $value
     * @param $expectedResult
     * @dataProvider validateFilteringProvider
     */
    public function testValidateFitering($dpi, $value, $expectedResult)
    {
        $dpi = new DotsPerInch($dpi);
        $this->assertEquals($expectedResult, $dpi->apply($value));
    }

    public function validateFilteringProvider()
    {
        return [
            [0, 0, 0],
            [1, 0, 0],
            [1, 1, 2.54],
        ];
    }
}
