<?php

/**
 * Mockery (https://docs.mockery.io/)
 *
 * @copyright https://github.com/mockery/mockery/blob/HEAD/COPYRIGHT.md
 * @license https://github.com/mockery/mockery/blob/HEAD/LICENSE BSD 3-Clause License
 * @link https://github.com/mockery/mockery for the canonical source repository
 */

namespace Mockery\Generator\StringManipulation\Pass;

use Mockery\Generator\MockConfiguration;
<<<<<<< HEAD
use Mockery\Generator\TargetClassInterface;
=======

>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
use function preg_replace;

/**
 * The standard Mockery\Mock class includes some methods to ease mocking, such
 * as __wakeup, however if the target has a final __wakeup method, it can't be
 * mocked. This pass removes the builtin methods where they are final on the
 * target
 */
<<<<<<< HEAD
class RemoveBuiltinMethodsThatAreFinalPass implements Pass
=======
class RemoveBuiltinMethodsThatAreFinalPass
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
{
    protected $methods = [
        '__wakeup' => '/public function __wakeup\(\)\s+\{.*?\}/sm',
        '__toString' => '/public function __toString\(\)\s+(:\s+string)?\s*\{.*?\}/sm',
    ];

<<<<<<< HEAD
    /**
     * @param  string $code
     * @return string
     */
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function apply($code, MockConfiguration $config)
    {
        $target = $config->getTargetClass();

<<<<<<< HEAD
        if (! $target instanceof TargetClassInterface) {
=======
        if (! $target) {
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
            return $code;
        }

        foreach ($target->getMethods() as $method) {
            if (! $method->isFinal()) {
                continue;
            }

            if (! isset($this->methods[$method->getName()])) {
                continue;
            }

            $code = preg_replace($this->methods[$method->getName()], '', $code);
        }

        return $code;
    }
}
