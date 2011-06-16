<?php
/**
 * $Id$
 *
 * @__LICENSE__@
 *
 * This is the main Bootstrap-File for PHPUnit
 *
 * @category   ConverterTests
 * @package    Converter
 * @author     Andreas Heigl<a.heigl@wdv.de>
 * @copyright  2011-@__YEAR__@ Andreas Heigl
 * @license    @__LICENSEURL__@ @__LICENSENAME__@
 * @version    @__VERSION__@
 * @since      25.03.2011
 */
ini_set ( 'date.timezone', 'Europe/Berlin' );

ini_set('include_path', ini_get('include_path')
                        . PATH_SEPARATOR . dirname(__FILE__) . '/../src'
                        );

require __DIR__ . DIRECTORY_SEPARATOR . '_autoload.php';