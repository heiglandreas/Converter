<?php
/**
 * $Id$
 *
 * @__LICENSE__@
 *
 * @category   ConverterTests
 * @package    Converter
 * @author     Andreas Heigl<a.heigl@wdv.de>
 * @copyright  2011-@__YEAR__@ Andreas Heigl
 * @license    @__LICENSEURL__@ @__LICENSENAME__@
 * @version    @__VERSION__@
 * @since      25.03.2011
 */

namespace Tests\Converter;

/**
 * Test correct working of the Converter-class
 *
 * @category   ConverterTests
 * @package    Converter
 * @author     Andreas Heigl<a.heigl@wdv.de>
 * @copyright  2011-@__YEAR__@ Andreas Heigl
 * @license    @__LICENSEURL__@ @__LICENSENAME__@
 * @version    @__VERSION__@
 * @since      25.03.2011
 */
class ConverterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \Converter\Exception\ConversionSpaceMissingException
     */
    public function testSettingNoTypeObjectFails()
    {
        $obj = new \Converter\Converter();
        $dummy = new NoDummyObject();
        $test = $obj->setObject($dummy);

    }

    /**
     * @expectedException \Converter\Exception\ConversionSpaceMissingException
     */
    public function testSettingNoTypeSubjectFails()
    {
        $obj = new \Converter\Converter();
        $dummy = new NoDummySubject();
        $test = $obj->setSubject($dummy);

    }

    public function testSettingObject () {
        $obj = new \Converter\Converter();
        $dummy = new DummyObject();
        $this->assertAttributeEquals(null,'_object',$obj);
        $test = $obj->setObject($dummy);
        $this->assertAttributeEquals($dummy,'_object',$obj);
        $this->assertSame($test, $obj);
        $this->assertSame($dummy, $obj->getObject());
    }

    public function testSettingObjectViaFrom () {
        $obj = new \Converter\Converter();
        $dummy = new DummyObject();
        $this->assertAttributeEquals(null,'_object',$obj);
        $test = $obj->setFrom($dummy);
        $this->assertAttributeEquals($dummy,'_object',$obj);
        $this->assertSame($test, $obj);
        $this->assertSame($dummy, $obj->getObject());
    }

    public function testSettingObjectOnlyWithInterface()
    {
        $this->markTestIncomplete();
        $obj = new \Converter\Converter();
        try{
            $obj->setObject('test');
        }catch(Exception $e){
            $this->assertTrue(true);
        }
    }

    public function testSettingSubject () {
        $obj = new \Converter\Converter();
        $dummy = new DummySubject();
        $this->assertAttributeEquals(null,'_subject',$obj);
        $test = $obj->setSubject($dummy);
        $this->assertAttributeEquals($dummy,'_subject',$obj);
        $this->assertSame($test, $obj);
        $this->assertSame($dummy, $obj->getSubject());
    }

    public function testSettingSubjectViaTo () {
        $obj = new \Converter\Converter();
        $dummy = new DummySubject();
        $this->assertAttributeEquals(null,'_subject',$obj);
        $test = $obj->setTo($dummy);
        $this->assertAttributeEquals($dummy,'_subject',$obj);
        $this->assertSame($test, $obj);
        $this->assertSame($dummy, $obj->getSubject());
    }

    public function testSettingSubjectOnlyWithInterface()
    {
        $this->markTestIncomplete();
        $obj = new \Converter\Converter();
        try{
            $obj->setObject('test');
        }catch(Exception $e){
            $this->assertTrue(true);
        }
    }

    public function testFactory()
    {
        $dummyS = new DummySubject();
        $dummyO = new DummyObject();
        $obj = \Converter\Converter::factory($dummyO,$dummyS);
        $this->assertInstanceOf('\Converter\Converter', $obj);
        $this->assertAttributeEquals($dummyS,'_subject',$obj);
        $this->assertAttributeEquals($dummyO,'_object',$obj);
    }

    public function testConversion()
    {
        $dummyS = new DummySubject();
        $dummyO = new DummyObject();
        $obj = \Converter\Converter::factory($dummyO,$dummyS);
        $this->assertEquals('0',$obj->convert('0'));
    }

    /**
     * @expectedException \Converter\Exception\ConversionSpaceMismatchException
     */
    public function testConversionOnlyWithMatchingSpaces()
    {
        $dummyS = new FooSubject();
        $dummyO = new BarObject();
        $obj = \Converter\Converter::factory($dummyO,$dummyS);
        $this->assertEquals('0',$obj->convert('0'));
    }

    public function testExample()
    {
         $from       = new \Converter\Length\NauticalMile();
         $to         = new \Converter\Length\Yard();
         $miles2Yard = \Converter\Converter::factory($from, $to);
         $this->assertEquals(20321.6256,$miles2Yard->convert(12));
    }
}


class NoDummySubject implements \Converter\SubjectInterface{
    public function fromDefault($value){return $value;}
}
class NoDummyObject implements \Converter\ObjectInterface{
    public function toDefault($value){return $value;}
}
class DummySubject implements \Converter\SubjectInterface, \Converter\Length\LengthInterface{
    public function fromDefault($value){return $value;}
}
class DummyObject implements \Converter\ObjectInterface, \Converter\Length\LengthInterface{
    public function toDefault($value){return $value;}
}
class FooSubject implements \Converter\SubjectInterface,\Converter\Length\LengthInterface{
    public function fromDefault($value){return $value;}
}
class BarObject implements \Converter\ObjectInterface,\Converter\Area\AreaInterface{
    public function toDefault($value){return $value;}
}
