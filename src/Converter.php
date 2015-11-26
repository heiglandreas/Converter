<?php
/**
 * $Id$
 *
 * Copyright (c) 2011 Andreas Heigl<andreas@heigl.org>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the 'Software'), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED 'AS IS', WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @category  Converter
 * @package   Converter
 * @author    Andreas Heigl<a.heigl@wdv.de>
 * @copyright 2011 Andreas Heigl
 * @license   http://www.opensource.org/licenses/mit-license.php MIT-License
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
 * @copyright 2011- Andreas Heigl
 * @license   http://www.opensource.org/licenses/mit-license.php MIT-License
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
     * A list of filters to be applied
     *
     * @var FilterCollection $filtes
     */
    protected $filters;

    /**
     * Converter constructor.
     */
    public function __construct()
    {
        $this->filters = new FilterCollection();
    }

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
     * Add a filter to the filter-list
     *
     * @param \Converter\FilterInterface $filter
     *
     * @return void
     */
    public function addFilter(FilterInterface $filter)
    {
        $this->filters->addFilter($filter);
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
            SubjectInterface $subject,
            FilterInterface $filter = null
           )
    {
        $obj = new Converter();
        $obj->setObject($object)
            ->setSubject($subject)
        ;
        if ($filter instanceof FilterInterface) {
            $obj->addFilter($filter);
        }
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

        // Do the actual conversion applying filters along the way
        $defaultMeasure = $this->getObject()->toDefault($input);

        $defaultMeasure = $this->filters->apply($defaultMeasure);

        return $this->getSubject()->fromDefault($defaultMeasure);
    }
}
