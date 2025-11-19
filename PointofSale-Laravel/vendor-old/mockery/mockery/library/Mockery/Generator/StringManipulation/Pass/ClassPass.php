<?php

/**
 * Mockery (https://docs.mockery.io/)
 *
 * @copyright https://github.com/mockery/mockery/blob/HEAD/COPYRIGHT.md
 * @license https://github.com/mockery/mockery/blob/HEAD/LICENSE BSD 3-Clause License
 * @link https://github.com/mockery/mockery for the canonical source repository
 */

namespace Mockery\Generator\StringManipulation\Pass;

use Mockery;
use Mockery\Generator\MockConfiguration;
<<<<<<< HEAD
=======

>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
use function class_exists;
use function ltrim;
use function str_replace;

class ClassPass implements Pass
{
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

        if (! $target) {
            return $code;
        }

        if ($target->isFinal()) {
            return $code;
        }

        $className = ltrim($target->getName(), '\\');

        if (! class_exists($className)) {
            Mockery::declareClass($className);
        }

        return str_replace(
            'implements MockInterface',
            'extends \\' . $className . ' implements MockInterface',
            $code
        );
    }
}
