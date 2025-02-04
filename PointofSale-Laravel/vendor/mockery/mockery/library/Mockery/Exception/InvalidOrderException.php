<?php

/**
 * Mockery (https://docs.mockery.io/)
 *
 * @copyright https://github.com/mockery/mockery/blob/HEAD/COPYRIGHT.md
 * @license https://github.com/mockery/mockery/blob/HEAD/LICENSE BSD 3-Clause License
 * @link https://github.com/mockery/mockery for the canonical source repository
 */

namespace Mockery\Exception;

use Mockery\Exception;
use Mockery\LegacyMockInterface;

class InvalidOrderException extends Exception
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

    protected $method = null;

    protected $mockObject = null;

>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function getActualOrder()
    {
        return $this->actual;
    }

<<<<<<< HEAD
    /**
     * @return int
     */
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function getExpectedOrder()
    {
        return $this->expected;
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
     * @return string|null
     */
    public function getMockName()
    {
        $mock = $this->getMock();

        if ($mock === null) {
            return $mock;
        }

        return $mock->mockery_getName();
    }

    /**
     * @param int $count
     *
     * @return self
     */
=======
    public function getMockName()
    {
        return $this->getMock()->mockery_getName();
    }

>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function setActualOrder($count)
    {
        $this->actual = $count;
        return $this;
    }

<<<<<<< HEAD
    /**
     * @param int $count
     *
     * @return self
     */
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function setExpectedOrder($count)
    {
        $this->expected = $count;
        return $this;
    }

<<<<<<< HEAD
    /**
     * @param string $name
     *
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
