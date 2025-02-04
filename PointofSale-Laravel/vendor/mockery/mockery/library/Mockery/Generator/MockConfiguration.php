<?php

/**
 * Mockery (https://docs.mockery.io/)
 *
 * @copyright https://github.com/mockery/mockery/blob/HEAD/COPYRIGHT.md
 * @license https://github.com/mockery/mockery/blob/HEAD/LICENSE BSD 3-Clause License
 * @link https://github.com/mockery/mockery for the canonical source repository
 */

namespace Mockery\Generator;

use Mockery\Exception;
<<<<<<< HEAD
use Serializable;
=======

>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
use function array_filter;
use function array_keys;
use function array_map;
use function array_merge;
use function array_pop;
use function array_unique;
use function array_values;
use function class_alias;
use function class_exists;
use function explode;
use function get_class;
use function implode;
use function in_array;
use function interface_exists;
use function is_object;
use function md5;
use function preg_match;
use function serialize;
use function strpos;
use function strtolower;
use function trait_exists;

/**
 * This class describes the configuration of mocks and hides away some of the
 * reflection implementation
 */
class MockConfiguration
{
    /**
     * Instance cache of all methods
<<<<<<< HEAD
     *
     * @var list<Method>
     */
    protected $allMethods = [];
=======
     */
    protected $allMethods;
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53

    /**
     * Methods that should specifically not be mocked
     *
<<<<<<< HEAD
     * This is currently populated with stuff we don't know how to deal with, should really be somewhere else
=======
     * This is currently populated with stuff we don't know how to deal with,
     * should really be somewhere else
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
     */
    protected $blackListedMethods = [];

    protected $constantsMap = [];

    /**
<<<<<<< HEAD
     * An instance mock is where we override the original class before it's autoloaded
     *
     * @var bool
=======
     * An instance mock is where we override the original class before it's
     * autoloaded
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
     */
    protected $instanceMock = false;

    /**
     * If true, overrides original class destructor
<<<<<<< HEAD
     *
     * @var bool
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
     */
    protected $mockOriginalDestructor = false;

    /**
     * The class name we'd like to use for a generated mock
<<<<<<< HEAD
     *
     * @var string|null
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
     */
    protected $name;

    /**
     * Param overrides
<<<<<<< HEAD
     *
     * @var array<string,mixed>
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
     */
    protected $parameterOverrides = [];

    /**
     * A class that we'd like to mock
<<<<<<< HEAD
     * @var TargetClassInterface|null
     */
    protected $targetClass;

    /**
     * @var class-string|null
     */
    protected $targetClassName;

    /**
     * @var array<class-string>
     */
    protected $targetInterfaceNames = [];

    /**
     * A number of interfaces we'd like to mock, keyed by name to attempt to keep unique
     *
     * @var array<TargetClassInterface>
=======
     */
    protected $targetClass;

    protected $targetClassName;

    protected $targetInterfaceNames = [];

    /**
     * A number of interfaces we'd like to mock, keyed by name to attempt to
     * keep unique
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
     */
    protected $targetInterfaces = [];

    /**
     * An object we'd like our mock to proxy to
<<<<<<< HEAD
     *
     * @var object|null
     */
    protected $targetObject;

    /**
     * @var array<string>
     */
    protected $targetTraitNames = [];

    /**
     * A number of traits we'd like to mock, keyed by name to attempt to keep unique
     *
     * @var array<string,DefinedTargetClass>
=======
     */
    protected $targetObject;

    protected $targetTraitNames = [];

    /**
     * A number of traits we'd like to mock, keyed by name to attempt to
     * keep unique
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
     */
    protected $targetTraits = [];

    /**
     * If not empty, only these methods will be mocked
<<<<<<< HEAD
     *
     * @var array<string>
     */
    protected $whiteListedMethods = [];

    /**
     * @param array<class-string|object>         $targets
     * @param array<string>                      $blackListedMethods
     * @param array<string>                      $whiteListedMethods
     * @param string|null                        $name
     * @param bool                               $instanceMock
     * @param array<string,mixed>                $parameterOverrides
     * @param bool                               $mockOriginalDestructor
     * @param array<string,array<scalar>|scalar> $constantsMap
     */
=======
     */
    protected $whiteListedMethods = [];

>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function __construct(
        array $targets = [],
        array $blackListedMethods = [],
        array $whiteListedMethods = [],
        $name = null,
        $instanceMock = false,
        array $parameterOverrides = [],
        $mockOriginalDestructor = false,
        array $constantsMap = []
    ) {
        $this->addTargets($targets);
        $this->blackListedMethods = $blackListedMethods;
        $this->whiteListedMethods = $whiteListedMethods;
        $this->name = $name;
        $this->instanceMock = $instanceMock;
        $this->parameterOverrides = $parameterOverrides;
        $this->mockOriginalDestructor = $mockOriginalDestructor;
        $this->constantsMap = $constantsMap;
    }

    /**
     * Generate a suitable name based on the config
<<<<<<< HEAD
     *
     * @return string
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
     */
    public function generateName()
    {
        $nameBuilder = new MockNameBuilder();

<<<<<<< HEAD
        $targetObject = $this->getTargetObject();
        if ($targetObject !== null) {
            $className = get_class($targetObject);

            $nameBuilder->addPart(strpos($className, '@') !== false ? md5($className) : $className);
        }

        $targetClass = $this->getTargetClass();
        if ($targetClass instanceof TargetClassInterface) {
            $className = $targetClass->getName();

=======
        if ($this->getTargetObject()) {
            $className = get_class($this->getTargetObject());
            $nameBuilder->addPart(strpos($className, '@') !== false ? md5($className) : $className);
        }

        if ($this->getTargetClass()) {
            $className = $this->getTargetClass()->getName();
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
            $nameBuilder->addPart(strpos($className, '@') !== false ? md5($className) : $className);
        }

        foreach ($this->getTargetInterfaces() as $targetInterface) {
            $nameBuilder->addPart($targetInterface->getName());
        }

        return $nameBuilder->build();
    }

<<<<<<< HEAD
    /**
     * @return array<string>
     */
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function getBlackListedMethods()
    {
        return $this->blackListedMethods;
    }

<<<<<<< HEAD
    /**
     * @return array<string,scalar|array<scalar>>
     */
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function getConstantsMap()
    {
        return $this->constantsMap;
    }

    /**
     * Attempt to create a hash of the configuration, in order to allow caching
     *
     * @TODO workout if this will work
     *
     * @return string
     */
    public function getHash()
    {
        $vars = [
<<<<<<< HEAD
            'targetClassName' => $this->targetClassName,
            'targetInterfaceNames' => $this->targetInterfaceNames,
            'targetTraitNames' => $this->targetTraitNames,
            'name' => $this->name,
            'blackListedMethods' => $this->blackListedMethods,
            'whiteListedMethod' => $this->whiteListedMethods,
            'instanceMock' => $this->instanceMock,
            'parameterOverrides' => $this->parameterOverrides,
=======
            'targetClassName'        => $this->targetClassName,
            'targetInterfaceNames'   => $this->targetInterfaceNames,
            'targetTraitNames'       => $this->targetTraitNames,
            'name'                   => $this->name,
            'blackListedMethods'     => $this->blackListedMethods,
            'whiteListedMethod'      => $this->whiteListedMethods,
            'instanceMock'           => $this->instanceMock,
            'parameterOverrides'     => $this->parameterOverrides,
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
            'mockOriginalDestructor' => $this->mockOriginalDestructor,
        ];

        return md5(serialize($vars));
    }

    /**
<<<<<<< HEAD
     * Gets a list of methods from the classes, interfaces and objects and filters them appropriately.
     * Lot's of filtering going on, perhaps we could have filter classes to iterate through
     *
     * @return list<Method>
=======
     * Gets a list of methods from the classes, interfaces and objects and
     * filters them appropriately. Lot's of filtering going on, perhaps we could
     * have filter classes to iterate through
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
     */
    public function getMethodsToMock()
    {
        $methods = $this->getAllMethods();

        foreach ($methods as $key => $method) {
            if ($method->isFinal()) {
                unset($methods[$key]);
            }
        }

        /**
         * Whitelist trumps everything else
         */
<<<<<<< HEAD
        $whiteListedMethods = $this->getWhiteListedMethods();
        if ($whiteListedMethods !== []) {
            $whitelist = array_map('strtolower', $whiteListedMethods);
=======
        if ($this->getWhiteListedMethods() !== []) {
            $whitelist = array_map('strtolower', $this->getWhiteListedMethods());
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53

            return array_filter($methods, static function ($method) use ($whitelist) {
                if ($method->isAbstract()) {
                    return true;
                }

                return in_array(strtolower($method->getName()), $whitelist, true);
            });
        }

        /**
         * Remove blacklisted methods
         */
<<<<<<< HEAD
        $blackListedMethods = $this->getBlackListedMethods();
        if ($blackListedMethods !== []) {
            $blacklist = array_map('strtolower', $blackListedMethods);

=======
        if ($this->getBlackListedMethods() !== []) {
            $blacklist = array_map('strtolower', $this->getBlackListedMethods());
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
            $methods = array_filter($methods, static function ($method) use ($blacklist) {
                return ! in_array(strtolower($method->getName()), $blacklist, true);
            });
        }

        /**
         * Internal objects can not be instantiated with newInstanceArgs and if
         * they implement Serializable, unserialize will have to be called. As
         * such, we can't mock it and will need a pass to add a dummy
         * implementation
         */
<<<<<<< HEAD
        $targetClass = $this->getTargetClass();

        if (
            $targetClass !== null
            && $targetClass->implementsInterface(Serializable::class)
            && $targetClass->hasInternalAncestor()
        ) {
=======
        if ($this->getTargetClass()
            && $this->getTargetClass()->implementsInterface('Serializable')
            && $this->getTargetClass()->hasInternalAncestor()) {
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
            $methods = array_filter($methods, static function ($method) {
                return $method->getName() !== 'unserialize';
            });
        }

        return array_values($methods);
    }

<<<<<<< HEAD
    /**
     * @return string|null
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
        $parts = explode('\\', $this->getName());
        array_pop($parts);

        if ($parts !== []) {
            return implode('\\', $parts);
        }

        return '';
    }

<<<<<<< HEAD
    /**
     * @return array<string,mixed>
     */
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function getParameterOverrides()
    {
        return $this->parameterOverrides;
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
     * @return null|TargetClassInterface
     */
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function getTargetClass()
    {
        if ($this->targetClass) {
            return $this->targetClass;
        }

        if (! $this->targetClassName) {
            return null;
        }

        if (class_exists($this->targetClassName)) {
            $alias = null;
            if (strpos($this->targetClassName, '@') !== false) {
                $alias = (new MockNameBuilder())
                    ->addPart('anonymous_class')
                    ->addPart(md5($this->targetClassName))
                    ->build();
                class_alias($this->targetClassName, $alias);
            }

            $dtc = DefinedTargetClass::factory($this->targetClassName, $alias);

            if ($this->getTargetObject() === null && $dtc->isFinal()) {
                throw new Exception(
                    'The class ' . $this->targetClassName . ' is marked final and its methods'
                    . ' cannot be replaced. Classes marked final can be passed in'
                    . ' to \Mockery::mock() as instantiated objects to create a'
                    . ' partial mock, but only if the mock is not subject to type'
                    . ' hinting checks.'
                );
            }

            $this->targetClass = $dtc;
        } else {
            $this->targetClass = UndefinedTargetClass::factory($this->targetClassName);
        }

        return $this->targetClass;
    }

<<<<<<< HEAD
    /**
     * @return class-string|null
     */
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function getTargetClassName()
    {
        return $this->targetClassName;
    }

<<<<<<< HEAD
    /**
     * @return list<TargetClassInterface>
     */
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function getTargetInterfaces()
    {
        if ($this->targetInterfaces !== []) {
            return $this->targetInterfaces;
        }

        foreach ($this->targetInterfaceNames as $targetInterface) {
            if (! interface_exists($targetInterface)) {
                $this->targetInterfaces[] = UndefinedTargetClass::factory($targetInterface);
                continue;
            }

            $dtc = DefinedTargetClass::factory($targetInterface);
            $extendedInterfaces = array_keys($dtc->getInterfaces());
            $extendedInterfaces[] = $targetInterface;

            $traversableFound = false;
            $iteratorShiftedToFront = false;
            foreach ($extendedInterfaces as $interface) {
                if (! $traversableFound && preg_match('/^\\?Iterator(|Aggregate)$/i', $interface)) {
                    break;
                }

                if (preg_match('/^\\\\?IteratorAggregate$/i', $interface)) {
                    $this->targetInterfaces[] = DefinedTargetClass::factory('\\IteratorAggregate');
                    $iteratorShiftedToFront = true;

                    continue;
                }

                if (preg_match('/^\\\\?Iterator$/i', $interface)) {
                    $this->targetInterfaces[] = DefinedTargetClass::factory('\\Iterator');
                    $iteratorShiftedToFront = true;

                    continue;
                }

                if (preg_match('/^\\\\?Traversable$/i', $interface)) {
                    $traversableFound = true;
                }
            }

            if ($traversableFound && ! $iteratorShiftedToFront) {
                $this->targetInterfaces[] = DefinedTargetClass::factory('\\IteratorAggregate');
            }

            /**
             * We never straight up implement Traversable
             */
            $isTraversable = preg_match('/^\\\\?Traversable$/i', $targetInterface);
            if ($isTraversable === 0 || $isTraversable === false) {
                $this->targetInterfaces[] = $dtc;
            }
        }

<<<<<<< HEAD
        return $this->targetInterfaces = array_unique($this->targetInterfaces);
    }

    /**
     * @return object|null
     */
=======
        $this->targetInterfaces = array_unique($this->targetInterfaces); // just in case
        return $this->targetInterfaces;
    }

>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function getTargetObject()
    {
        return $this->targetObject;
    }

<<<<<<< HEAD
    /**
     * @return list<TargetClassInterface>
     */
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function getTargetTraits()
    {
        if ($this->targetTraits !== []) {
            return $this->targetTraits;
        }

        foreach ($this->targetTraitNames as $targetTrait) {
            $this->targetTraits[] = DefinedTargetClass::factory($targetTrait);
        }

        $this->targetTraits = array_unique($this->targetTraits); // just in case
        return $this->targetTraits;
    }

<<<<<<< HEAD
    /**
     * @return array<string>
     */
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function getWhiteListedMethods()
    {
        return $this->whiteListedMethods;
    }

<<<<<<< HEAD
    /**
     * @return bool
     */
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function isInstanceMock()
    {
        return $this->instanceMock;
    }

<<<<<<< HEAD
    /**
     * @return bool
     */
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function isMockOriginalDestructor()
    {
        return $this->mockOriginalDestructor;
    }

<<<<<<< HEAD
    /**
     * @param  class-string $className
     * @return self
     */
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function rename($className)
    {
        $targets = [];

        if ($this->targetClassName) {
            $targets[] = $this->targetClassName;
        }

        if ($this->targetInterfaceNames) {
            $targets = array_merge($targets, $this->targetInterfaceNames);
        }

        if ($this->targetTraitNames) {
            $targets = array_merge($targets, $this->targetTraitNames);
        }

        if ($this->targetObject) {
            $targets[] = $this->targetObject;
        }

        return new self(
            $targets,
            $this->blackListedMethods,
            $this->whiteListedMethods,
            $className,
            $this->instanceMock,
            $this->parameterOverrides,
            $this->mockOriginalDestructor,
            $this->constantsMap
        );
    }

    /**
     * We declare the __callStatic method to handle undefined stuff, if the class
     * we're mocking has also defined it, we need to comply with their interface
<<<<<<< HEAD
     *
     * @return bool
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
     */
    public function requiresCallStaticTypeHintRemoval()
    {
        foreach ($this->getAllMethods() as $method) {
            if ($method->getName() === '__callStatic') {
                $params = $method->getParameters();
<<<<<<< HEAD

                if (! array_key_exists(1, $params)) {
                    return false;
                }

=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
                return ! $params[1]->isArray();
            }
        }

        return false;
    }

    /**
     * We declare the __call method to handle undefined stuff, if the class
     * we're mocking has also defined it, we need to comply with their interface
<<<<<<< HEAD
     *
     * @return bool
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
     */
    public function requiresCallTypeHintRemoval()
    {
        foreach ($this->getAllMethods() as $method) {
            if ($method->getName() === '__call') {
                $params = $method->getParameters();
                return ! $params[1]->isArray();
            }
        }

        return false;
    }

<<<<<<< HEAD
    /**
     * @param class-string|object $target
     */
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    protected function addTarget($target)
    {
        if (is_object($target)) {
            $this->setTargetObject($target);
            $this->setTargetClassName(get_class($target));
<<<<<<< HEAD
            return;
=======
            return $this;
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
        }

        if ($target[0] !== '\\') {
            $target = '\\' . $target;
        }

        if (class_exists($target)) {
            $this->setTargetClassName($target);
<<<<<<< HEAD
            return;
=======
            return $this;
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
        }

        if (interface_exists($target)) {
            $this->addTargetInterfaceName($target);
<<<<<<< HEAD
            return;
=======
            return $this;
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
        }

        if (trait_exists($target)) {
            $this->addTargetTraitName($target);
<<<<<<< HEAD
            return;
=======
            return $this;
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
        }

        /**
         * Default is to set as class, or interface if class already set
         *
         * Don't like this condition, can't remember what the default
         * targetClass is for
         */
        if ($this->getTargetClassName()) {
            $this->addTargetInterfaceName($target);
<<<<<<< HEAD
            return;
=======
            return $this;
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
        }

        $this->setTargetClassName($target);
    }

    /**
<<<<<<< HEAD
     * If we attempt to implement Traversable,
     * we must ensure we are also implementing either Iterator or IteratorAggregate,
     * and that whichever one it is comes before Traversable in the list of implements.
     *
     * @param class-string $targetInterface
=======
     * If we attempt to implement Traversable, we must ensure we are also
     * implementing either Iterator or IteratorAggregate, and that whichever one
     * it is comes before Traversable in the list of implements.
     *
     * @param mixed $targetInterface
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
     */
    protected function addTargetInterfaceName($targetInterface)
    {
        $this->targetInterfaceNames[] = $targetInterface;
    }

<<<<<<< HEAD
    /**
     * @param array<class-string> $interfaces
     */
=======
    protected function addTargetTraitName($targetTraitName)
    {
        $this->targetTraitNames[] = $targetTraitName;
    }

>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    protected function addTargets($interfaces)
    {
        foreach ($interfaces as $interface) {
            $this->addTarget($interface);
        }
    }

<<<<<<< HEAD
    /**
     * @param class-string $targetTraitName
     */
    protected function addTargetTraitName($targetTraitName)
    {
        $this->targetTraitNames[] = $targetTraitName;
    }

    /**
     * @return list<Method>
     */
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    protected function getAllMethods()
    {
        if ($this->allMethods) {
            return $this->allMethods;
        }

        $classes = $this->getTargetInterfaces();

        if ($this->getTargetClass()) {
            $classes[] = $this->getTargetClass();
        }

        $methods = [];
        foreach ($classes as $class) {
            $methods = array_merge($methods, $class->getMethods());
        }

        foreach ($this->getTargetTraits() as $trait) {
            foreach ($trait->getMethods() as $method) {
                if ($method->isAbstract()) {
                    $methods[] = $method;
                }
            }
        }

        $names = [];
        $methods = array_filter($methods, static function ($method) use (&$names) {
            if (in_array($method->getName(), $names, true)) {
                return false;
            }

            $names[] = $method->getName();
            return true;
        });

        return $this->allMethods = $methods;
    }

<<<<<<< HEAD
    /**
     * @param class-string $targetClassName
     */
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    protected function setTargetClassName($targetClassName)
    {
        $this->targetClassName = $targetClassName;
    }

<<<<<<< HEAD
    /**
     * @param object $object
     */
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    protected function setTargetObject($object)
    {
        $this->targetObject = $object;
    }
}
