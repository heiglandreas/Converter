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
 * @since     25.03.2011
 */

namespace Converter;

/**
 * This class provides methods for converting between different measuers
 *
 * Conversion can only take place between one measurement-type. For instance
 * convertin a length into a volume does not make any sense.
 *
 * @category  Converter
 * @package   Converter
 * @author    Andreas Heigl<a.heigl@wdv.de>
 * @copyright 2011-@__YEAR__@ Andreas Heigl
 * @license   @__LICENSEURL__@ @__LICENSENAME__@
 * @version   @__VERSION__@
 * @since     25.03.2011
 */
class Converter
{

    /**
     * The Object to convertr from
     *
     * @var \Converter\ObjectInterface $_object
     */
    protected $_object = null;

    /**
     * The Subject to convert to
     *
     * @var \Converter\SubjectIntreface $_subject
     */
    protected $_subject = null;

    /**
     * Set the Object for the conversion
     *
     * @param \Converter\ObjectInterface $object
     *
     * @throws \Converter\Exception\ConversionSpaceMissingException
     * @return \Converter\Converter
     */
    public function setObject(ObjectInterface $object)
    {
        if (!$object instanceof TypeInterface) {
            throw new Exception\ConversionSpaceMissingException(
                'No Conversion Space set'
            );
        }
        $this->_object = $object;
        return $this;
    }

    /**
     * Set the subject for the conversion
     *
     * @param \Converter\SubjectInterface $subject
     *
     * @throws \Converter\Exception\ConversionSpaceMissingException
     * @return \Converter\Converter
     */
    public function setSubject(SubjectInterface $subject)
    {
        if (!$subject instanceof TypeInterface) {
            throw new Exception\ConversionSpaceMissingException(
                'No Conversion Space set'
            );
        }
        $this->_subject = $subject;
        return $this;
    }

    /**
     * Alternate syntax for setting the object
     *
     * @param \Converter\ObjectInterface $object
     *
     * @throws \Converter\Exception\ConversionSpaceMissingException
     * @return \Converter\Converter
     */
    public function setFrom(ObjectInterface $object)
    {
        return $this->setObject($object);
    }

    /**
     * Alternate Syntax for setting the subject
     *
     * @param \Converter\SubjectInterface $subject
     *
     * @throws \Converter\Exception\ConversionSpaceMissingException
     * @return \Converter\Converter
     */
    public function setTo(SubjectInterface $subject)
    {
        return $this->setSubject($subject);
    }

    /**
     * Get the subject-instance
     *
     * @throws \Converter\Exception\MissingSubjectException
     * @return \Converter\SubjectInterface
     */
    public function getSubject()
    {
        if (!$this->_subject instanceof SubjectInterface) {
            throw new Exception\MissingSubjectException('No Subject given');
        }
        return $this->_subject;
    }

    /**
     * Get the object-instance
     *
     * @throws \Converter\Exception\MissingObjectException
     * @return \Converter\ObjectInterface
     */
    public function getObject()
    {
        if (!$this->_object instanceof ObjectInterface) {
            throw new Exception\MissingObjectException('No Object given');
        }
        return $this->_object;
    }

    /**
     * Create a Converter with an Object and a subject
     *
     * @param \Converter\ObjectInterface $object
     * @param \Converter\SubjectInterface $subject
     *
     * @return \Converter\Converter
     */
    public static function factory(
            ObjectInterface $object,
            SubjectInterface $subject
           )
    {
        $obj = new Converter();
        $obj->setObject($object)
            ->setSubject($subject);
        return $obj;
    }

    /**
     * Do the actual conversion
     *
     * @param mixed $input
     *
     * @return mixed $output
     */
    public function convert($input)
    {
        $objImpl = class_implements($this->getObject());
        $subjImpl = class_implements($this->getSubject());
        $available = array(
            'Converter\Area\AreaInterface',
            'Converter\Calendar\CalendarInterface',
            'Converter\Color\ColorInterface',
            'Converter\Currency\CurrencyInterface',
            'Converter\DateTime\DateTimeInterface',
            'Converter\Force\ForceInterface',
            'Converter\Geo\GeoInterface',
            'Converter\Length\LengthInterface',
            'Converter\Temperature\TemperatureInterface',
            'Converter\Volume\VolumeInterface',
            'Converter\TestInterface',
        );
        $keys = array_intersect($available, $objImpl);
        $keys = array_values($keys);
        if (1 < count($keys)) {
            throw new Exception\ConversionSpaceMismatchException(
                'The Object has multiple Types'
            );
        }
        if (1 > count($keys)) {
            throw new Exception\ConversionSpaceMismatchException(
                'The Object has no Type'
            );
        }
        if ( ! isset($subjImpl[$keys[0]])) {
            throw new Exception\ConversionSpaceMismatchException(
                'The Object and the Subject are of different Types'
            );
        }
        return $this->getSubject()->fromDefault(
            $this->getObject()->toDefault($input)
        );
    }
}
