<?php

/**
 * Mockery (https://docs.mockery.io/)
 *
 * @copyright https://github.com/mockery/mockery/blob/HEAD/COPYRIGHT.md
 * @license https://github.com/mockery/mockery/blob/HEAD/LICENSE BSD 3-Clause License
 * @link https://github.com/mockery/mockery for the canonical source repository
 */

namespace Mockery\Generator;

use ReflectionAttribute;
use ReflectionClass;
<<<<<<< HEAD
use ReflectionMethod;
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53

use function array_map;
use function array_merge;
use function array_unique;

use const PHP_VERSION_ID;

class DefinedTargetClass implements TargetClassInterface
{
<<<<<<< HEAD
    /**
     * @var class-string
     */
    private $name;

    /**
     * @var ReflectionClass
     */
    private $rfc;

    /**
     * @param ReflectionClass   $rfc
     * @param class-string|null $alias
     */
=======
    private $name;

    private $rfc;

>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function __construct(ReflectionClass $rfc, $alias = null)
    {
        $this->rfc = $rfc;
        $this->name = $alias ?? $rfc->getName();
    }

<<<<<<< HEAD
    /**
     * @return class-string
     */
    public function __toString()
    {
        return $this->name;
    }

    /**
     * @param  class-string      $name
     * @param  class-string|null $alias
     * @return self
     */
    public static function factory($name, $alias = null)
    {
        return new self(new ReflectionClass($name), $alias);
    }

    /**
     * @return list<class-string>
     */
=======
    public function __toString()
    {
        return $this->getName();
    }

>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function getAttributes()
    {
        if (PHP_VERSION_ID < 80000) {
            return [];
        }

        return array_unique(
            array_merge(
                ['\AllowDynamicProperties'],
                array_map(
                    static function (ReflectionAttribute $attribute): string {
                        return '\\' . $attribute->getName();
                    },
                    $this->rfc->getAttributes()
                )
            )
        );
    }

<<<<<<< HEAD
    /**
     * @return array<class-string,self>
     */
    public function getInterfaces()
    {
        return array_map(
            static function (ReflectionClass $interface): self {
                return new self($interface);
            },
            $this->rfc->getInterfaces()
        );
    }

    /**
     * @return list<Method>
     */
    public function getMethods()
    {
        return array_map(
            static function (ReflectionMethod $method): Method {
                return new Method($method);
            },
            $this->rfc->getMethods()
        );
    }

    /**
     * @return class-string
     */
=======
    public function getInterfaces()
    {
        $class = self::class;
        return array_map(static function ($interface) use ($class) {
            return new $class($interface);
        }, $this->rfc->getInterfaces());
    }

    public function getMethods()
    {
        return array_map(static function ($method) {
            return new Method($method);
        }, $this->rfc->getMethods());
    }

>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function getName()
    {
        return $this->name;
    }

<<<<<<< HEAD
    /**
     * @return string
     */
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function getNamespaceName()
    {
        return $this->rfc->getNamespaceName();
    }

<<<<<<< HEAD
    /**
     * @return string
     */
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function getShortName()
    {
        return $this->rfc->getShortName();
    }

<<<<<<< HEAD
    /**
     * @return bool
     */
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function hasInternalAncestor()
    {
        if ($this->rfc->isInternal()) {
            return true;
        }

        $child = $this->rfc;
        while ($parent = $child->getParentClass()) {
            if ($parent->isInternal()) {
                return true;
            }

            $child = $parent;
        }

        return false;
    }

<<<<<<< HEAD
    /**
     * @param  class-string $interface
     * @return bool
     */
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function implementsInterface($interface)
    {
        return $this->rfc->implementsInterface($interface);
    }

<<<<<<< HEAD
    /**
     * @return bool
     */
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function inNamespace()
    {
        return $this->rfc->inNamespace();
    }

<<<<<<< HEAD
    /**
     * @return bool
     */
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function isAbstract()
    {
        return $this->rfc->isAbstract();
    }

<<<<<<< HEAD
    /**
     * @return bool
     */
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function isFinal()
    {
        return $this->rfc->isFinal();
    }
<<<<<<< HEAD
=======

    public static function factory($name, $alias = null)
    {
        return new self(new ReflectionClass($name), $alias);
    }
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
}
