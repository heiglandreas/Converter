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

use \Converter\Length\Millimeter;

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
class MillimeterTest extends \PHPUnit_Framework_TestCase
{
    public function testClassImplementsCorrectInterfaces()
    {
        $interfaces = class_implements('\Converter\Length\Millimeter');
        $this->assertContains('Converter\Length\LengthInterface', $interfaces);
        $this->assertContains('Converter\TypeInterface', $interfaces);
        $this->assertContains('Converter\SubjectInterface', $interfaces);
        $this->assertContains('Converter\ObjectInterface', $interfaces);
    }

    /**
     * @dataProvider ObjectProvider
     */
    public function testObjectFunction($input,$output){
        $obj = new Millimeter();
        $this->assertEquals($output,$obj->toDefault($input));
    }

    /**
     * @dataProvider SubjectProvider
     */
    public function testSubjectFunction($input,$output)
    {
        $subj = new Millimeter();
        $this->assertEquals($output,$subj->fromDefault($input));
    }

    public function ObjectProvider()
    {
        return array(
            array(4, 0.004),
            array(4.5, 0.0045),
            array(1, 0.001),
            array(2, 0.002),
            array(1000, 1.0),
            array('4',0.0040),
            array('test',0.0),
            array('-100',-0.1),
            array(array('4'),0.001),
            array(array('4','2'),0.001),
            array(true,0.001),
            array(false,0.0),

        );
    }

    public function SubjectProvider()
    {
        return array(
            array(4, 4000.0),
            array(4.5, 4500.0),
            array(0.001, 1.0),
            array(0.002, 2.0),
            array(1000, 1000000.0),
            array('4',4000.0),
            array('test',0.0),
            array('-0.1',-100.0),
            array(array('4'),1000),
            array(array('4','2'),1000),
            array(true,1000),
            array(false,0.0),

        );
    }
}