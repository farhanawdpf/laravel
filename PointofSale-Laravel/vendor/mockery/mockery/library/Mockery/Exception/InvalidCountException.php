<?php

/**
 * Mockery (https://docs.mockery.io/)
 *
 * @copyright https://github.com/mockery/mockery/blob/HEAD/COPYRIGHT.md
 * @license https://github.com/mockery/mockery/blob/HEAD/LICENSE BSD 3-Clause License
 * @link https://github.com/mockery/mockery for the canonical source repository
 */

namespace Mockery\Exception;

use Mockery\CountValidator\Exception;
use Mockery\LegacyMockInterface;

use function in_array;

class InvalidCountException extends Exception
{
<<<<<<< HEAD
    /**
     * @var int|null
     */
    protected $actual = null;

    /**
     * @var int
     */
    protected $expected = 0;

    /**
     * @var string
     */
    protected $expectedComparative = '<=';

    /**
     * @var string|null
     */
    protected $method = null;

    /**
     * @var LegacyMockInterface|null
     */
    protected $mockObject = null;

    /**
     * @return int|null
     */
=======
    protected $actual = null;

    protected $expected = 0;

    protected $expectedComparative = '<=';

    protected $method = null;

    protected $mockObject = null;

>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function getActualCount()
    {
        return $this->actual;
    }

<<<<<<< HEAD
    /**
     * @return int
     */
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function getExpectedCount()
    {
        return $this->expected;
    }

<<<<<<< HEAD
    /**
     * @return string
     */
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function getExpectedCountComparative()
    {
        return $this->expectedComparative;
    }

<<<<<<< HEAD
    /**
     * @return string|null
     */
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function getMethodName()
    {
        return $this->method;
    }

<<<<<<< HEAD
    /**
     * @return LegacyMockInterface|null
     */
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function getMock()
    {
        return $this->mockObject;
    }

<<<<<<< HEAD
    /**
     * @throws RuntimeException
     * @return string|null
     */
    public function getMockName()
    {
        $mock = $this->getMock();

        if ($mock === null) {
            return '';
        }

        return $mock->mockery_getName();
    }

    /**
     * @param  int  $count
     * @return self
     */
=======
    public function getMockName()
    {
        return $this->getMock()->mockery_getName();
    }

>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function setActualCount($count)
    {
        $this->actual = $count;
        return $this;
    }

<<<<<<< HEAD
    /**
     * @param  int  $count
     * @return self
     */
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function setExpectedCount($count)
    {
        $this->expected = $count;
        return $this;
    }

<<<<<<< HEAD
    /**
     * @param  string $comp
     * @return self
     */
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function setExpectedCountComparative($comp)
    {
        if (! in_array($comp, ['=', '>', '<', '>=', '<='], true)) {
            throw new RuntimeException('Illegal comparative for expected call counts set: ' . $comp);
        }

        $this->expectedComparative = $comp;
        return $this;
    }

<<<<<<< HEAD
    /**
     * @param  string $name
     * @return self
     */
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function setMethodName($name)
    {
        $this->method = $name;
        return $this;
    }

<<<<<<< HEAD
    /**
     * @return self
     */
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function setMock(LegacyMockInterface $mock)
    {
        $this->mockObject = $mock;
        return $this;
    }
}
