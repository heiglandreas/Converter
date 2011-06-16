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

use \Converter\Length\Pixelperinch;

/**
 * Test conversion to and from Pixel per given inch
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
class PixelperinchTest extends \PHPUnit_Framework_TestCase
{
    public function testClassImplementsCorrectInterfaces()
    {
        $interfaces = class_implements('\Converter\Length\Pixelperinch');
        $this->assertContains('Converter\Length\LengthInterface', $interfaces);
        $this->assertContains('Converter\TypeInterface', $interfaces);
        $this->assertContains('Converter\SubjectInterface', $interfaces);
        $this->assertContains('Converter\ObjectInterface', $interfaces);
    }

    /**
     * @dataProvider provider
     */
    public function testObjectFunction($input,$output,$resolution){
        $obj = new Pixelperinch();
        $obj->setDpi($resolution);
        $this->assertEquals($output,$obj->toDefault($input));
    }

    /**
     * @dataProvider provider
     */
    public function testSubjectFunction($output,$input, $resolution)
    {
        $subj = new Pixelperinch();
        $subj->setDpi($resolution);
        $this->assertEquals($output,$subj->fromDefault($input));
    }

    public function provider()
    {
        return array(
            array(72,0.0254,72),
            array(144,0.0508,72),
            array(150,0.0254,150),
        );
    }
}