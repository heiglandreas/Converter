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
 * This Class defines a point in any coordinate system.
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
class Point
{
    /**
     * The distance to the left of the base of the coordinate system this point
     * is located at
     *
     * @var string $_x
     */
    protected $_x = 0;

    /**
     * The distance to the top of the base of the coordinate system this point
     * is located at
     *
     * @var string $_y
     */
    protected $_y = 0;

    /**
     * The height above the base of the coordinate system this point is located
     * at
     *
     * @var string $_z
     */
    protected $_z = null;

    /**
     * Set the x-value of the point
     *
     * The x-value is the left distance from the base of the coordinate system
     *
     * @param mixed $x
     *
     * @return \Converter\Geo\Point
     */
    public function setX($x)
    {
        $this->_x = $x;
        return $this;
    }

    /**
     * Get the x-value of the point
     *
     * @return mixed
     */
    public function getX()
    {
        return $this->_x;
    }

    /**
     * Set the y-value of the point
     *
     * The y-value is the top distance from the base of the coordinate system
     *
     * @param mixed $y
     *
     * @return \Converter\Geo\Point
     */
    public function setY($y)
    {
        $this->_y = $y;
        return $this;
    }

    /**
     * Get the y-value of the point
     *
     * @return mixed
     */
    public function getY()
    {
        return $this->_y;
    }

    /**
     * Set the z-value of the point
     *
     * The z-value is the height from the base of the coordinate system
     *
     * @param mixed $x
     *
     * @return \Converter\Geo\Point
     */
    public function setZ($z)
    {
        $this->_z = $z;
        return $this;
    }

    /**
     * Get the z-value of the point
     *
     * @return mixed
     */
    public function getZ()
    {
        return $this->_z;
    }

    /**
     * Create a point from two or three values
     *
     * @param mixed $x
     * @param mixed $y
     * @param mixed $z
     *
     * @return \Converter\Geo\Point
     */
    public static function factory ($x, $y, $z = null)
    {
        $point = new self();
        $point->setX($x)
              ->setY($y)
              ->setZ($z);
        return $point;
    }

}
