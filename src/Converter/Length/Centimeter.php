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

/**
 * Convert to and from Centimeters
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
class Centimeter implements
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
        return (float) $value / 100;
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
        return (float) $value * 100;
    }
}