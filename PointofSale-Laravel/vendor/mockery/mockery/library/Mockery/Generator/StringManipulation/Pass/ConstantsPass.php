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
use function array_key_exists;
use function sprintf;
use function strrpos;
use function substr_replace;
use function var_export;
<<<<<<< HEAD
=======

>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
use const PHP_EOL;

class ConstantsPass implements Pass
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
        $cm = $config->getConstantsMap();
        if ($cm === []) {
            return $code;
        }

        $name = $config->getName();
        if (! array_key_exists($name, $cm)) {
            return $code;
        }

        $constantsCode = '';
        foreach ($cm[$name] as $constant => $value) {
            $constantsCode .= sprintf("\n    const %s = %s;\n", $constant, var_export($value, true));
        }

        $offset = strrpos($code, '}');
        if ($offset === false) {
            return $code;
        }

        return substr_replace($code, $constantsCode, $offset) . '}' . PHP_EOL;
    }
}
