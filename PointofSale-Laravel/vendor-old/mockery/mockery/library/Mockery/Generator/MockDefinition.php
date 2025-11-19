<?php

/**
 * Mockery (https://docs.mockery.io/)
 *
 * @copyright https://github.com/mockery/mockery/blob/HEAD/COPYRIGHT.md
 * @license https://github.com/mockery/mockery/blob/HEAD/LICENSE BSD 3-Clause License
 * @link https://github.com/mockery/mockery for the canonical source repository
 */

namespace Mockery\Generator;

use InvalidArgumentException;

class MockDefinition
{
<<<<<<< HEAD
    /**
     * @var string
     */
    protected $code;

    /**
     * @var MockConfiguration
     */
    protected $config;

    /**
     * @param  string                   $code
     * @throws InvalidArgumentException
     */
=======
    protected $code;

    protected $config;

>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function __construct(MockConfiguration $config, $code)
    {
        if (! $config->getName()) {
            throw new InvalidArgumentException('MockConfiguration must contain a name');
        }

        $this->config = $config;
        $this->code = $code;
    }

<<<<<<< HEAD
    /**
     * @return string
     */
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function getClassName()
    {
        return $this->config->getName();
    }

<<<<<<< HEAD
    /**
     * @return string
     */
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function getCode()
    {
        return $this->code;
    }

<<<<<<< HEAD
    /**
     * @return MockConfiguration
     */
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function getConfig()
    {
        return $this->config;
    }
}
