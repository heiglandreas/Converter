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

use \Converter\Geo\Point;

/**
 * Test correct working of the Point-class
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
class PointTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function testSettingX($x)
    {
        $point = new Point();
        $this->assertAttributeEquals(0,'_x',$point);
        $this->assertEquals(0,$point->getX());
        $point->setX($x);
        $this->assertAttributeEquals($x,'_x',$point);
        $this->assertEquals($x,$point->getX());
    }
    /**
     * @dataProvider dataProvider
     */
    public function testSettingY($y)
    {
        $point = new Point();
        $this->assertAttributeEquals(0,'_y',$point);
        $this->assertEquals(0,$point->getY());
        $point->setY($y);
        $this->assertAttributeEquals($y,'_y',$point);
        $this->assertEquals($y,$point->getY());
    }
    /**
     * @dataProvider dataProvider
     */
    public function testSettingZ($z)
    {
        $point = new Point();
        $this->assertAttributeEquals(null,'_z',$point);
        $this->assertEquals(null,$point->getZ());
        $point->setZ($z);
        $this->assertAttributeEquals($z,'_z',$point);
        $this->assertEquals($z,$point->getZ());
    }

    /**
     * @dataProvider dataProvider
     */
    public function testFactoryWithoutHeight($p)
    {
        $point = Point::factory($p,$p);
        $this->assertAttributeEquals($p,'_x',$point);
        $this->assertAttributeEquals($p,'_y',$point);
        $this->assertAttributeEquals(null,'_z',$point);
        $this->assertEquals($p, $point->getX());
        $this->assertEquals($p, $point->getY());
        $this->assertEquals(null, $point->getZ());
    }
    /**
     * @dataProvider dataProvider
     */
    public function testFactoryWithHeight($p)
    {
        $point = Point::factory($p,$p,$p);
        $this->assertAttributeEquals($p,'_x',$point);
        $this->assertAttributeEquals($p,'_y',$point);
        $this->assertAttributeEquals($p,'_z',$point);
        $this->assertEquals($p, $point->getX());
        $this->assertEquals($p, $point->getY());
        $this->assertEquals($p, $point->getZ());
    }

    public function dataProvider()
    {
        return array(
            array(10),
            array('11'),
            array('foo'),
        );
    }
}
