<?php
/**
 * $Id$
 *
 * @__LICENSE__@
 *
 * @category  Converter
 * @package   Converter
 * @author    Andreas Heigl<a.heigl@wdv.de>
 * @copyright 2011-@__YEAR__@ Andreas Heigl
 * @license   @__LICENSEURL__@ @__LICENSENAME__@
 * @version   @__VERSION__@
 * @since     14.06.2011
 */

namespace Converter;

/**
 * This Interface provides methods for converting from a given space into a
 * default space
 *
 * @category  Converter
 * @package   Converter
 * @author    Andreas Heigl<a.heigl@wdv.de>
 * @copyright 2011-@__YEAR__@ Andreas Heigl
 * @license   @__LICENSEURL__@ @__LICENSENAME__@
 * @version   @__VERSION__@
 * @since     14.06.2011
 */
Interface ObjectInterface
{
    /**
     * Convert to the default value
     *
     * @param mixed $value
     *
     * @return mixed
     */
    public function toDefault($value);
}