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
=======

>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
use function preg_replace;

/**
 * Remove mock's empty destructor if we tend to use original class destructor
 */
<<<<<<< HEAD
class RemoveDestructorPass implements Pass
{
    /**
     * @param  string $code
     * @return string
     */
=======
class RemoveDestructorPass
{
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function apply($code, MockConfiguration $config)
    {
        $target = $config->getTargetClass();

        if (! $target) {
            return $code;
        }

        if (! $config->isMockOriginalDestructor()) {
            return preg_replace('/public function __destruct\(\)\s+\{.*?\}/sm', '', $code);
        }

        return $code;
    }
}
