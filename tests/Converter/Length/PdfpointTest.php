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

use \Converter\Length\Pdfpoint;

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
class PdfpointTest extends \PHPUnit_Framework_TestCase
{
    public function testClassImplementsCorrectInterfaces()
    {
        $interfaces = class_implements('\Converter\Length\Pdfpoint');
        $this->assertContains('Converter\Length\LengthInterface', $interfaces);
        $this->assertContains('Converter\TypeInterface', $interfaces);
        $this->assertContains('Converter\SubjectInterface', $interfaces);
        $this->assertContains('Converter\ObjectInterface', $interfaces);
    }

    /**
     * @dataProvider ObjectProvider
     */
    public function testObjectFunction($input,$output){
        $obj = new Pdfpoint();
        $this->assertEquals($output,$obj->toDefault($input));
    }

    /**
     * @dataProvider SubjectProvider
     */
    public function testSubjectFunction($input,$output)
    {
        $subj = new Pdfpoint();
        $this->assertEquals($output,$subj->fromDefault($input));
    }

    public function ObjectProvider()
    {
        return array(
            array(72, 0.0254),
        );
    }

    public function SubjectProvider()
    {
        return array(
            array(25.4, 72000),
        );
    }
}