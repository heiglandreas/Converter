<?php
/**
 * $Id$
 *
 * @__LICENSE__@
 *
 * @category   Converter
 * @package    Converter
 * @subpackage Exception
 * @author     Andreas Heigl<a.heigl@wdv.de>
 * @copyright  2011-@__YEAR__@ Andreas Heigl
 * @license    @__LICENSEURL__@ @__LICENSENAME__@
 * @version    @__VERSION__@
 * @since      25.03.2011
 */

namespace Converter\Exception;

/**
 * This Exception is thrown, when a conversion between different spaces is
 * tried. At least as long as someone can convert a CMYK-Color-Value to
 * Horsepower
 *
 * @category   Converter
 * @package    Converter
 * @subpackage Exception
 * @author     Andreas Heigl<a.heigl@wdv.de>
 * @copyright  2011-@__YEAR__@ Andreas Heigl
 * @license    @__LICENSEURL__@ @__LICENSENAME__@
 * @version    @__VERSION__@
 * @since      15.06.2011
 */
class ConversionSpaceMismatchException extends \UnexpectedValueException
    implements Exception
{
    //
}