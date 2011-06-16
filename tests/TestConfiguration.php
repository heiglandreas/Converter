<?php
/**
 * $Id$
 *
 * @__LICENSE__@
 *
 * TestConfiguration-File
 *
 * @category   ConverterTests
 * @package    Converter
 * @author     Andreas Heigl<a.heigl@wdv.de>
 * @copyright  2011-@__YEAR__@ Andreas Heigl
 * @license    @__LICENSEURL__@ @__LICENSENAME__@
 * @version    @__VERSION__@
 * @since      25.03.2011
 */
//------------------------------------------------------
// Org_Heigl_Converter Path
//------------------------------------------------------
define ( 'SRC_PATH', dirname ( __FILE__ ) . '/../src');

define ( 'TEST_PATH', dirname ( __FILE__ ) . '/' );


set_include_path ( '.' . PATH_SEPARATOR
        . SRC_PATH . PATH_SEPARATOR
        . TEST_PATH . PATH_SEPARATOR
        . get_include_path() );

ini_set ( 'date.timezone', 'Europe/Berlin' );