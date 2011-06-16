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

use \Converter\Length\Decimeter;

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
class DecimeterTest extends \PHPUnit_Framework_TestCase
{
    public function testClassImplementsCorrectInterfaces()
    {
        $interfaces = class_implements('\Converter\Length\Decimeter');
        $this->assertContains('Converter\Length\LengthInterface', $interfaces);
        $this->assertContains('Converter\TypeInterface', $interfaces);
        $this->assertContains('Converter\SubjectInterface', $interfaces);
        $this->assertContains('Converter\ObjectInterface', $interfaces);
    }

    /**
     * @dataProvider ObjectProvider
     */
    public function testObjectFunction($input,$output){
        $obj = new Decimeter();
        $this->assertEquals($output,$obj->toDefault($input));
    }

    /**
     * @dataProvider SubjectProvider
     */
    public function testSubjectFunction($input,$output)
    {
        $subj = new Decimeter();
        $this->assertEquals($output,$subj->fromDefault($input));
    }

    public function ObjectProvider()
    {
        return array(
            array(4, 0.40),
            array(4.5, 0.450),
            array(4.51, 4.51/10),
            array(true,0.1),
            array(false,0.0),

        );
    }

    public function SubjectProvider()
    {
        return array(
            array(4.0, 40),
            array(4.5, 45),
            array(1, 10),
            array(45.1, 451),
        );
    }
}