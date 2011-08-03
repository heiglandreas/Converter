<?php
/**
 * $Id$
 *
 * Copyright (c) 2011 Andreas Heigl<andreas@heigl.org>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the 'Software'), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED 'AS IS', WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @category   ConverterTests
 * @package    Converter
 * @subpackage Geo
 * @author     Andreas Heigl<a.heigl@wdv.de>
 * @copyright  2011 Andreas Heigl
 * @license    http://www.opensource.org/licenses/mit-license.php MIT-License
 * @version    @__VERSION__@
 * @since      03.08.2011
 */

namespace Tests\Converter\Geo;

use \Converter\Geo\GaussKrueger;
use \Converter\Geo\Point;

/**
 * Test correct working of the Converter-class
 *
 * @category   ConverterTests
 * @package    Converter
 * @subpackage Geo
 * @author     Andreas Heigl<a.heigl@wdv.de>
 * @copyright  2011- Andreas Heigl
 * @license    http://www.opensource.org/licenses/mit-license.php MIT-License
 * @version    @__VERSION__@
 * @since      03.08.2011
 */
class GaussKruegerTest extends \PHPUnit_Framework_TestCase
{
    public function testClassImplementsCorrectInterfaces()
    {
        $interfaces = class_implements('\Converter\Geo\GaussKrueger');
        $this->assertContains('Converter\Geo\GeoInterface', $interfaces);
        $this->assertContains('Converter\TypeInterface', $interfaces);
        $this->assertContains('Converter\SubjectInterface', $interfaces);
        $this->assertContains('Converter\ObjectInterface', $interfaces);
    }

    /**
     * @dataProvider dataProvider
     */
    public function testObjectFunction($input,$output){
        $obj = new GaussKrueger();
        $this->assertEquals($output,$obj->toDefault($input));
    }

    /**
     * @expectedException InvalidArgumentException
     * @dataProvider      invalidDataProvider
     */
    public function testObjectFunctionThrowsExceptions($input)
    {
        $obj = new GaussKrueger();
        $obj->toDefault($input);
    }

    /**
     * @dataProvider dataProvider
     */
    public function testSubjectFunction($output,$input)
    {
        $subj = new GaussKrueger();
        $this->assertEquals($output,$subj->fromDefault($input));
    }

    /**
     * @expectedException InvalidArgumentException
     * @dataProvider      invalidDataProvider
     */
    public function testSubjectFunctionThrowsExceptions($input)
    {
        $obj = new GaussKrueger();
        $obj->fromDefault($input);
    }

    /**
     * @dataProvider dataProviderBaseMeridian
     */
    public function testSettingBaseMeridian($input,$expected)
    {
        $s=new GaussKrueger();
        $this->assertAttributeEquals(6,'_default',$s);
        $this->assertEquals(6.0,$s->getBaseMeridian());
        $s->setBaseMeridian($input);
        $this->assertAttributeEquals($expected,'_default',$s);
        $this->assertEquals($expected,$s->getBaseMeridian());
    }

    public function dataProviderBaseMeridian()
    {
        return array (
            array (0,0.0),
            array (11.1,11.1),
            array ('12.2',12.2),
            array ('12,2',12.0),
            array ( true, 1.0),
        );
    }
    /**
     * @dataProvider dataProviderAbweichung
     */
    public function testSettingAbweichung($input,$expected)
    {
        $s=new GaussKrueger();
        $this->assertAttributeEquals(50000,'_abweichung',$s);
        $this->assertEquals(50000.0,$s->getAbweichung());
        $s->setAbweichung($input);
        $this->assertAttributeEquals($expected,'_abweichung',$s);
        $this->assertEquals($expected,$s->getAbweichung());
    }

    public function dataProviderAbweichung()
    {
        return array (
            array (0,0.0),
            array (11.1,11.1),
            array ('12.2',12.2),
            array ('12,2',12.0),
            array ( true, 1.0),
        );
    }

    public function dataProvider()
    {
        return array(
            array(Point::factory(50000,0),Point::factory(6,0) ),
        );
    }

    public function invalidDataProvider()
    {
        return array(
            array ( 12 ),
            array ( 'foo'),
            array ( array ('test') ),
            array ( array ( 12, 'test') ),
            array ( new self ),
        );
    }
}
