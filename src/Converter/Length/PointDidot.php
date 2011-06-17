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
 * @category   Converter
 * @package    Converter
 * @subpackage Length
 * @author     Andreas Heigl<a.heigl@wdv.de>
 * @copyright  2011 Andreas Heigl
 * @license    http://www.opensource.org/licenses/mit-license.php MIT-License
 * @version    @__VERSION__@
 * @since      17.06.2011
 */

namespace Converter\Length;

use \Converter\SubjectInterface;
use \Converter\ObjectInterface;

/**
 * Convert to and from Didot-Points
 *
 * One Didot-point is 5/133 of a centimeter.
 *
 * This measurement has been in use AFTER 1878.
 *
 * For Conversion of values from before 1878 use PointDidotOld
 *
 * @category   Converter
 * @package    Converter
 * @subpackage Length
 * @author     Andreas Heigl<a.heigl@wdv.de>
 * @copyright  2011- Andreas Heigl
 * @license    http://www.opensource.org/licenses/mit-license.php MIT-License
 * @version    @__VERSION__@
 * @since      25.03.2011
 * @link       http://en.wikipedia.org/wiki/Approximate_conversion_of_units
 */
class PointDidot implements SubjectInterface, ObjectInterface, LengthInterface
{
    /**
     * Convert to the default value
     *
     * @param mixed $value
     *
     * @return mixed
     */
    public function toDefault($value)
    {
        return (float) $value * (5/0.0133);
    }

    /**
     * Convert from the default value
     *
     * @param mixed $value
     *
     * @return mixed
     */
    public function fromDefault($value)
    {
        return $value  / ( 5/0.0133);
    }
}
