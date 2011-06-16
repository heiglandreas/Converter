<?php
/**
 * $Id$
 *
 * @__LICENSE__@
 *
 * @category   ConverterTests
 * @package    Converter
 * @subpackage Length
 * @author     Andreas Heigl<a.heigl@wdv.de>
 * @copyright  2011-@__YEAR__@ Andreas Heigl
 * @license    @__LICENSEURL__@ @__LICENSENAME__@
 * @version    @__VERSION__@
 * @since      16.06.2011
 */

namespace Tests\Converter\Length;

use \Converter\Length\Centimeter;

/**
 * Test correct working of the Converter-class
 *
 * @category   ConverterTests
 * @package    Converter
 * @subpackage Length
 * @author     Andreas Heigl<a.heigl@wdv.de>
 * @copyright  2011-@__YEAR__@ Andreas Heigl
 * @license    @__LICENSEURL__@ @__LICENSENAME__@
 * @version    @__VERSION__@
 * @since      25.03.2011
 */
class CentimeterTest extends \PHPUnit_Framework_TestCase
{
    public function testClassImplementsCorrectInterfaces()
    {
        $interfaces = class_implements('\Converter\Length\Centimeter');
        $this->assertContains('Converter\Length\LengthInterface', $interfaces);
        $this->assertContains('Converter\TypeInterface', $interfaces);
        $this->assertContains('Converter\SubjectInterface', $interfaces);
        $this->assertContains('Converter\ObjectInterface', $interfaces);
    }

    /**
     * @dataProvider ObjectProvider
     */
    public function testObjectFunction($input,$output){
        $obj = new Centimeter();
        $this->assertEquals($output,$obj->toDefault($input));
    }

    /**
     * @dataProvider SubjectProvider
     */
    public function testSubjectFunction($input,$output)
    {
        $subj = new Centimeter();
        $this->assertEquals($output,$subj->fromDefault($input));
    }

    public function ObjectProvider()
    {
        return array(
            array(400, 4.0),
            array(4.5, 0.0450),
            array(4.51, 4.51/100),
            array(true,0.010),
            array(false,0.0),

        );
    }

    public function SubjectProvider()
    {
        return array(
            array(4.0, 400.0),
            array(0.045, 4.5),
            array(0.01, 1.0),
            array(45.1, 4510.0),
        );
    }
}