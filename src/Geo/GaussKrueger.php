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
 * Convert to and from Gauss-Krueger values
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
class GaussKrueger implements
    \Converter\ObjectInterface, \Converter\SubjectInterface, GeoInterface
{
    /**
     * The radius of the earth at the Equator in Kilometers
     *
     * @const float RADIUS_EQUATOR
     */
    const RADIUS_EQUATOR = 12713.822;

    /**
     * The radius of the earth at the 0-Meridian of Greenwich in Kilometers
     *
     * @const RADIUS_GREENWICH
     */
    const RADIUS_GREENWICH = 12756.776;

    /**
     * The default meridian to be used for the conversion to and from the Gauss-
     * Krueger-System.
     *
     * As this system is widely used in germany this defaults to the in
     * Germany used 6th meridian
     *
     * @var float $_default
     */
    protected $_default = 6;

    /**
     * The abweichung to add to all values so we get only positive values for
     * the resulting x-values
     *
     * This defaults to the in Germany used 50000 meters
     *
     * @var float $_abweichung
     */
    protected $_abweichung = 50000;

    /**
     * Set the base meridian
     *
     * @param float $meridian
     *
     * @return \Converter\Geo\GaussKrueger
     */
    public function setBaseMeridian($meridian)
    {
        $this->_default = (float) $meridian;
        return $this;
    }

    /**
     * Get the base meridian
     *
     * @return float
     */
    public function getBaseMeridian()
    {
        return (float) $this->_default;
    }

    /**
     * Set the default Abweicung
     *
     * @param float $abweichung
     *
     * @return \Converter\Geo\GaussKrueger
     */
    public function setAbweichung($abweichung)
    {
        $this->_abweichung = (float) $abweichung;
        return $this;
    }

    /**
     * Get the Abweichung
     *
     * @return float
     */
    public function getAbweichung()
    {
        return (float)$this->_abweichung;
    }

    /**
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
        $y = 360 / (pi() * 2 * self::RADIUS_GREENWICH ) * $value->getY();
        $realRechts = $value->getX() - $this->getAbweichung();
        $hochDM = cos ( deg2rad ( $y ) ) * self::RADIUS_EQUATOR;
        $x = 360/(pi() * 2 * $hochDM)*$realRechts+$this->getBaseMeridian();
        return Point::factory($x,$y);
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
        $hoch = ( pi() * 2 * self::RADIUS_GREENWICH ) / 360 * ( $value->getY() );
        $hochDM = cos ( deg2rad ( $value->getY() ) ) * self::RADIUS_EQUATOR;
        $rechts = ( pi() * 2 * $hochDM ) / 360 * ( $value->getX() - $this->getBaseMeridian() ) + $this->getAbweichung();
        return Point::factory($rechts, $hoch);
    }
}
