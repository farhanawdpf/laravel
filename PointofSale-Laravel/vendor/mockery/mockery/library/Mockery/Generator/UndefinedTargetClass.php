<?php

/**
 * Mockery (https://docs.mockery.io/)
 *
 * @copyright https://github.com/mockery/mockery/blob/HEAD/COPYRIGHT.md
 * @license https://github.com/mockery/mockery/blob/HEAD/LICENSE BSD 3-Clause License
 * @link https://github.com/mockery/mockery for the canonical source repository
 */

namespace Mockery\Generator;

use function array_pop;
use function explode;
use function implode;
use function ltrim;

class UndefinedTargetClass implements TargetClassInterface
{
<<<<<<< HEAD
    /**
     * @var class-string
     */
    private $name;

    /**
     * @param class-string $name
     */
=======
    private $name;

>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function __construct($name)
    {
        $this->name = $name;
    }

<<<<<<< HEAD
    /**
     * @return class-string
     */
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function __toString()
    {
        return $this->name;
    }

<<<<<<< HEAD
    /**
     * @param  class-string $name
     * @return self
     */
    public static function factory($name)
    {
        return new self($name);
    }

    /**
     * @return list<class-string>
     */
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function getAttributes()
    {
        return [];
    }

<<<<<<< HEAD
    /**
     * @return list<self>
     */
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function getInterfaces()
    {
        return [];
    }

<<<<<<< HEAD
    /**
     * @return list<Method>
     */
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function getMethods()
    {
        return [];
    }

<<<<<<< HEAD
    /**
     * @return class-string
     */
=======
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
        $parts = explode('\\', ltrim($this->getName(), '\\'));
        array_pop($parts);
        return implode('\\', $parts);
    }

<<<<<<< HEAD
    /**
     * @return string
     */
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function getShortName()
    {
        $parts = explode('\\', $this->getName());
        return array_pop($parts);
    }

<<<<<<< HEAD
    /**
     * @return bool
     */
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function hasInternalAncestor()
    {
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
        return false;
    }

<<<<<<< HEAD
    /**
     * @return bool
     */
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function inNamespace()
    {
        return $this->getNamespaceName() !== '';
    }

<<<<<<< HEAD
    /**
     * @return bool
     */
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function isAbstract()
    {
        return false;
    }

<<<<<<< HEAD
    /**
     * @return bool
     */
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function isFinal()
    {
        return false;
    }
<<<<<<< HEAD
=======

    public static function factory($name)
    {
        return new self($name);
    }
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
}
