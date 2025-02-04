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
use function array_map;
use function in_array;
use function preg_replace;
use function sprintf;
use function str_replace;

class AvoidMethodClashPass implements Pass
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
        $names = array_map(static function ($method) {
            return $method->getName();
        }, $config->getMethodsToMock());

        foreach (['allows', 'expects'] as $method) {
            if (in_array($method, $names, true)) {
                $code = preg_replace(sprintf('#// start method %s.*// end method %s#ms', $method, $method), '', $code);

                $code = str_replace(' implements MockInterface', ' implements LegacyMockInterface', $code);
            }
        }

        return $code;
    }
}
