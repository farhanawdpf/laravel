<?php

/**
 * Mockery (https://docs.mockery.io/)
 *
 * @copyright https://github.com/mockery/mockery/blob/HEAD/COPYRIGHT.md
 * @license https://github.com/mockery/mockery/blob/HEAD/LICENSE BSD 3-Clause License
 * @link https://github.com/mockery/mockery for the canonical source repository
 */

namespace Mockery\Generator;

use Mockery\Reflector;
use ReflectionMethod;
use ReflectionParameter;

use function array_map;

<<<<<<< HEAD
/**
 * @mixin ReflectionMethod
 */
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
class Method
{
    /**
     * @var ReflectionMethod
     */
    private $method;

    public function __construct(ReflectionMethod $method)
    {
        $this->method = $method;
    }

<<<<<<< HEAD
    /**
     * @template TArgs
     * @template TMixed
     *
     * @param string       $method
     * @param array<TArgs> $args
     *
     * @return TMixed
     */
    public function __call($method, $args)
    {
        /** @var TMixed */
=======
    public function __call($method, $args)
    {
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
        return $this->method->{$method}(...$args);
    }

    /**
<<<<<<< HEAD
     * @return list<Parameter>
=======
     * @return Parameter[]
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
     */
    public function getParameters()
    {
        return array_map(static function (ReflectionParameter $parameter) {
            return new Parameter($parameter);
        }, $this->method->getParameters());
    }

    /**
     * @return null|string
     */
    public function getReturnType()
    {
        return Reflector::getReturnType($this->method);
    }
}
