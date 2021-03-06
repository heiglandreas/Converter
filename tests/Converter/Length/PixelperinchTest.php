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
 * @subpackage Length
 * @author     Andreas Heigl<a.heigl@wdv.de>
 * @copyright  2011 Andreas Heigl
 * @license    http://www.opensource.org/licenses/mit-license.php MIT-License
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
 * @copyright  2011- Andreas Heigl
 * @license    http://www.opensource.org/licenses/mit-license.php MIT-License
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
