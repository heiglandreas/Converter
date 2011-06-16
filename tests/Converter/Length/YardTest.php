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

use \Converter\Length\Yard;

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
class YardTest extends \PHPUnit_Framework_TestCase
{
    public function testClassImplementsCorrectInterfaces()
    {
        $interfaces = class_implements('\Converter\Length\Yard');
        $this->assertContains('Converter\Length\LengthInterface', $interfaces);
        $this->assertContains('Converter\TypeInterface', $interfaces);
        $this->assertContains('Converter\SubjectInterface', $interfaces);
        $this->assertContains('Converter\ObjectInterface', $interfaces);
    }

    /**
     * @dataProvider provider
     */
    public function testObjectFunction($input,$output){
        $obj = new Yard();
        $this->assertEquals($output,$obj->toDefault($input));
    }

    /**
     * @dataProvider provider
     */
    public function testSubjectFunction($output,$input)
    {
        $subj = new Yard();
        $this->assertEquals($output,$subj->fromDefault($input));
    }

    public function provider()
    {
        return array(
            array(0.9144, 1.0),
        );
    }
}