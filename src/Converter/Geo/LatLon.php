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
 * @subpackage Geo
 * @author     Andreas Heigl<a.heigl@wdv.de>
 * @copyright  2011 Andreas Heigl
 * @license    http://www.opensource.org/licenses/mit-license.php MIT-License
 * @version    @__VERSION__@
 * @since      03.08.2011
 */

namespace Converter\Geo;

/**
 * Convert to and from Latitude/longitude values
 *
 * @category   Converter
 * @package    Converter
 * @subpackage Geo
 * @author     Andreas Heigl<a.heigl@wdv.de>
 * @copyright  2011- Andreas Heigl
 * @license    http://www.opensource.org/licenses/mit-license.php MIT-License
 * @version    @__VERSION__@
 * @since      03.08.2011
 */
class LatLon implements
    \Converter\ObjectInterface, \Converter\SubjectInterface, GeoInterface
{
     /**
     * Convert to the default value
     *
     * @param \Converter\Geo\Point $value
     *
     * @return \Converter\Geo\Point
     */
    public function toDefault ($value)
    {
        if ( ! $value instanceof Point ) {
            throw new \Converter\Exception\InvalidArgumentException ( 'No valid Point given. Must be instance of \Converter\Geo\Point' );
        }
        return $value;
    }

    /**
     * Convert from the default value
     *
     * @param \Converter\Geo\Point $value
     *
     * @return \Converter\Geo\Point
     */
    public function fromDefault($value)
    {
        if ( ! $value instanceof Point ) {
            throw new \Converter\Exception\InvalidArgumentException ( 'No valid Point given. Must be instance of \Converter\Geo\Point' );
        }
        return $value;
    }
}
