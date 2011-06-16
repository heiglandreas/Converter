<?php
/**
 * $Id$
 *
 * @__LICENSE__@
 *
 * @category   Converter
 * @package    Converter
 * @subpackage Length
 * @author     Andreas Heigl<a.heigl@wdv.de>
 * @copyright  2011-@__YEAR__@ Andreas Heigl
 * @license    @__LICENSEURL__@ @__LICENSENAME__@
 * @version    @__VERSION__@
 * @since      25.03.2011
 */

namespace Converter\Length;

use \Converter;

/**
 * Convert to and from Yard
 *
 * 1 Yard is 3 feet which is 36 inches of 25.4 mm
 *
 * @category   Converter
 * @package    Converter
 * @subpackage Length
 * @author     Andreas Heigl<a.heigl@wdv.de>
 * @copyright  2011-@__YEAR__@ Andreas Heigl
 * @license    @__LICENSEURL__@ @__LICENSENAME__@
 * @version    @__VERSION__@
 * @since      25.03.2011
 * @link       http://en.wikipedia.org/wiki/Approximate_conversion_of_units
 */
class Yard implements
    \Converter\ObjectInterface, \Converter\SubjectInterface, LengthInterface
{
     /**
     * Convert to the default value
     *
     * @param mixed $value
     *
     * @return float
     */
    public function toDefault ($value)
    {
        return (float) $value / ( 36 * 0.0254 );
    }

    /**
     * Convert from the default value
     *
     * @param mixed $value
     *
     * @return float
     */
    public function fromDefault($value)
    {
        return (float) $value * ( 36 * 0.0254 );
    }
}