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
 * Convert to and from PDF-Points
 *
 * One pdf-point is the 72nd part of an inch (25.4mm)
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
class Pdfpoint implements
    \Converter\SubjectInterface, \Converter\ObjectInterface, LengthInterface
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
        return (float) $value / 72 * 0.0254;
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
        return $value  * 72 / 0.0254;
    }
}