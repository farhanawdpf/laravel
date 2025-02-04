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
use function array_reduce;
use function interface_exists;
use function ltrim;
use function str_replace;

class InterfacePass implements Pass
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
        foreach ($config->getTargetInterfaces() as $i) {
            $name = ltrim($i->getName(), '\\');
            if (! interface_exists($name)) {
                Mockery::declareInterface($name);
            }
        }

<<<<<<< HEAD
        $interfaces = array_reduce($config->getTargetInterfaces(), static function ($code, $i) {
=======
        $interfaces = array_reduce((array) $config->getTargetInterfaces(), static function ($code, $i) {
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
            return $code . ', \\' . ltrim($i->getName(), '\\');
        }, '');

        return str_replace('implements MockInterface', 'implements MockInterface' . $interfaces, $code);
    }
}
