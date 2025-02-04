<?php

/**
 * Mockery (https://docs.mockery.io/)
 *
 * @copyright https://github.com/mockery/mockery/blob/HEAD/COPYRIGHT.md
 * @license https://github.com/mockery/mockery/blob/HEAD/LICENSE BSD 3-Clause License
 * @link https://github.com/mockery/mockery for the canonical source repository
 */

namespace Mockery\Generator;

interface TargetClassInterface
{
    /**
<<<<<<< HEAD
     * Returns a new instance of the current TargetClassInterface's implementation.
     *
     * @param class-string $name
     *
     * @return TargetClassInterface
     */
    public static function factory($name);

    /**
     * Returns the targetClass's attributes.
     *
     * @return array<class-string>
=======
     * Returns the targetClass's attributes.
     *
     * @return array
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
     */
    public function getAttributes();

    /**
     * Returns the targetClass's interfaces.
     *
<<<<<<< HEAD
     * @return array<TargetClassInterface>
=======
     * @return array
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
     */
    public function getInterfaces();

    /**
     * Returns the targetClass's methods.
     *
<<<<<<< HEAD
     * @return array<Method>
=======
     * @return array
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
     */
    public function getMethods();

    /**
     * Returns the targetClass's name.
     *
<<<<<<< HEAD
     * @return class-string
=======
     * @return string
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
     */
    public function getName();

    /**
     * Returns the targetClass's namespace name.
     *
     * @return string
     */
    public function getNamespaceName();

    /**
     * Returns the targetClass's short name.
     *
     * @return string
     */
    public function getShortName();

    /**
     * Returns whether the targetClass has
     * an internal ancestor.
     *
<<<<<<< HEAD
     * @return bool
=======
     * @return boolean
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
     */
    public function hasInternalAncestor();

    /**
     * Returns whether the targetClass is in
     * the passed interface.
     *
<<<<<<< HEAD
     * @param class-string|string $interface
     *
     * @return bool
=======
     * @param mixed $interface
     *
     * @return boolean
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
     */
    public function implementsInterface($interface);

    /**
     * Returns whether the targetClass is in namespace.
     *
<<<<<<< HEAD
     * @return bool
=======
     * @return boolean
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
     */
    public function inNamespace();

    /**
     * Returns whether the targetClass is abstract.
     *
<<<<<<< HEAD
     * @return bool
=======
     * @return boolean
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
     */
    public function isAbstract();

    /**
     * Returns whether the targetClass is final.
     *
<<<<<<< HEAD
     * @return bool
     */
    public function isFinal();
=======
     * @return boolean
     */
    public function isFinal();

    /**
     * Returns a new instance of the current
     * TargetClassInterface's
     * implementation.
     *
     * @param string $name
     *
     * @return TargetClassInterface
     */
    public static function factory($name);
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
}
