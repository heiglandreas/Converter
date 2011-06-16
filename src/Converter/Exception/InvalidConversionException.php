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
 * This class provides an Exception for Invalid Conversions
 *
 * Conversion can only take place between one measurement-type. For instance
 * convertin a length into a volume does not make any sense and would therefore
 * result in this exception to be thrown
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
class InvalidConversionException extends \UnexpectedValueException
    implements Exception
{
    //
}