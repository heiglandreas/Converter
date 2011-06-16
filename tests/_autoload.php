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
 * @since      16.06.2011
 */
function Converter_Autoloader($class)
{
    $class = ltrim($class, '\\');

    if (!preg_match('#^(Converter(Test)?|PHPUnit)(\\\\|_)#', $class)) {
        return false;
    }

    // $segments = explode('\\', $class); // preg_split('#\\\\|_#', $class);//
    $segments = preg_split('#[\\\\_]#', $class); // preg_split('#\\\\|_#', $class);//
    $ns       = array_shift($segments);

    switch ($ns) {
        case 'Converter':
            $file = dirname(__DIR__) . '/src/Converter/';
            break;
        case 'ConverterTest':
            // temporary fix for ZendTest namespace until we can migrate files
            // into ZendTest dir
            $file = __DIR__ . '/Converter/';
            break;
        default:
            $file = false;
            break;
    }

    if ($file) {
        $file .= implode('/', $segments) . '.php';
        if (file_exists($file)) {
            return include_once $file;
        }
    }

    $segments = explode('_', $class);
    $ns       = array_shift($segments);

    switch ($ns) {
        case 'PHPUnit':
            return include_once str_replace('_', DIRECTORY_SEPARATOR, $class) . '.php';
        case 'Converter':
            $file = dirname(__DIR__) . '/src/Converter/';
            break;
        default:
            return false;
    }
    $file .= implode('/', $segments) . '.php';
    if (file_exists($file)) {
        return include_once $file;
    }

    return false;
}
spl_autoload_register('Converter_Autoloader', true, true);

