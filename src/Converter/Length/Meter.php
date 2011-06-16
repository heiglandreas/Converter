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
 * Convert to and from Meters
 *
 * This is the default size
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
class Meter implements
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
        return (float) $value;
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
        return (float) $value;
    }
}