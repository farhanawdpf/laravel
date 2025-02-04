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
use function implode;
use function ltrim;
use function preg_replace;

class TraitPass implements Pass
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
        $traits = $config->getTargetTraits();

        if ($traits === []) {
            return $code;
        }

        $useStatements = array_map(static function ($trait) {
            return 'use \\\\' . ltrim($trait->getName(), '\\') . ';';
        }, $traits);

        return preg_replace('/^{$/m', "{\n    " . implode("\n    ", $useStatements) . "\n", $code);
    }
}
