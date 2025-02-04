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

class NoMatchingExpectationException extends Exception
{
<<<<<<< HEAD
    /**
     * @var array<mixed>
     */
    protected $actual = [];

    /**
     * @var string|null
     */
    protected $method = null;

    /**
     * @var LegacyMockInterface|null
     */
    protected $mockObject = null;

    /**
     * @return array<mixed>
     */
=======
    protected $actual = [];

    protected $method = null;

    protected $mockObject = null;

>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function getActualArguments()
    {
        return $this->actual;
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
     * @todo Rename param `count` to `args`
     * @template TMixed
     *
     * @param  array<TMixed> $count
     * @return self
     */
=======
    public function getMockName()
    {
        return $this->getMock()->mockery_getName();
    }

>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function setActualArguments($count)
    {
        $this->actual = $count;
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
