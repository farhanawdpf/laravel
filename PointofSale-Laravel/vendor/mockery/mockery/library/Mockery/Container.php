<?php

/**
 * Mockery (https://docs.mockery.io/)
 *
 * @copyright https://github.com/mockery/mockery/blob/HEAD/COPYRIGHT.md
 * @license https://github.com/mockery/mockery/blob/HEAD/LICENSE BSD 3-Clause License
 * @link https://github.com/mockery/mockery for the canonical source repository
 */

namespace Mockery;

<<<<<<< HEAD
use Closure;
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
use Exception as PHPException;
use Mockery;
use Mockery\Exception\InvalidOrderException;
use Mockery\Exception\RuntimeException;
use Mockery\Generator\Generator;
use Mockery\Generator\MockConfigurationBuilder;
use Mockery\Loader\Loader as LoaderInterface;
use ReflectionClass;
use ReflectionException;
use Throwable;

use function array_filter;
use function array_key_exists;
use function array_keys;
use function array_pop;
use function array_shift;
use function array_values;
use function class_exists;
use function count;
use function explode;
use function get_class;
use function interface_exists;
use function is_callable;
use function is_object;
use function is_string;
use function md5;
use function preg_grep;
use function preg_match;
use function range;
use function reset;
use function rtrim;
use function sprintf;
use function str_replace;
use function strlen;
use function strpos;
use function strtolower;
use function substr;
use function trait_exists;

<<<<<<< HEAD
/**
 * Container for mock objects
 *
 * @template TMockObject of object
 */
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
class Container
{
    public const BLOCKS = Mockery::BLOCKS;

    /**
     * Order number of allocation
     *
     * @var int
     */
    protected $_allocatedOrder = 0;

    /**
     * Current ordered number
     *
     * @var int
     */
    protected $_currentOrder = 0;

    /**
     * @var Generator
     */
    protected $_generator;

    /**
     * Ordered groups
     *
     * @var array<string,int>
     */
    protected $_groups = [];

    /**
     * @var LoaderInterface
     */
    protected $_loader;

    /**
     * Store of mock objects
     *
<<<<<<< HEAD
     * @var array<class-string<LegacyMockInterface&MockInterface&TMockObject>|array-key,LegacyMockInterface&MockInterface&TMockObject>
=======
     * @var array<class-string<LegacyMockInterface&MockInterface>|int,LegacyMockInterface&MockInterface>
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
     */
    protected $_mocks = [];

    /**
     * @var array<string,string>
     */
    protected $_namedMocks = [];

    /**
     * @var Instantiator
     */
    protected $instantiator;

    public function __construct(?Generator $generator = null, ?LoaderInterface $loader = null, ?Instantiator $instantiator = null)
    {
        $this->_generator = $generator instanceof Generator ? $generator : Mockery::getDefaultGenerator();
        $this->_loader = $loader instanceof LoaderInterface ? $loader : Mockery::getDefaultLoader();
        $this->instantiator = $instantiator instanceof Instantiator ? $instantiator : new Instantiator();
    }

    /**
     * Return a specific remembered mock according to the array index it
     * was stored to in this container instance
     *
     * @template TMock of object
     *
     * @param class-string<TMock> $reference
     *
     * @return null|(LegacyMockInterface&MockInterface&TMock)
     */
    public function fetchMock($reference)
    {
        return $this->_mocks[$reference] ?? null;
    }

    /**
     * @return Generator
     */
    public function getGenerator()
    {
        return $this->_generator;
    }

    /**
     * @param string $method
     * @param string $parent
     *
     * @return null|string
     */
    public function getKeyOfDemeterMockFor($method, $parent)
    {
        $keys = array_keys($this->_mocks);

        $match = preg_grep('/__demeter_' . md5($parent) . sprintf('_%s$/', $method), $keys);
        if ($match === false) {
            return null;
        }

        if ($match === []) {
            return null;
        }

        return array_values($match)[0];
    }

    /**
     * @return LoaderInterface
     */
    public function getLoader()
    {
        return $this->_loader;
    }

    /**
<<<<<<< HEAD
     * @template TMock of object
     * @return array<class-string<LegacyMockInterface&MockInterface&TMockObject>|array-key,LegacyMockInterface&MockInterface&TMockObject>
=======
     * @return array<class-string<LegacyMockInterface&MockInterface>|int,LegacyMockInterface&MockInterface>
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
     */
    public function getMocks()
    {
        return $this->_mocks;
    }

    /**
     * @return void
     */
    public function instanceMock()
    {
    }

    /**
     * see http://php.net/manual/en/language.oop5.basic.php
     *
     * @param string $className
     *
     * @return bool
     */
    public function isValidClassName($className)
    {
        if ($className[0] === '\\') {
            $className = substr($className, 1); // remove the first backslash
        }

        // all the namespaces and class name should match the regex
        return array_filter(
            explode('\\', $className),
            static function ($name): bool {
                return ! preg_match('/^[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*$/', $name);
            }
        ) === [];
    }

    /**
     * Generates a new mock object for this container
     *
     * I apologies in advance for this. A God Method just fits the API which
     * doesn't require differentiating between classes, interfaces, abstracts,
     * names or partials - just so long as it's something that can be mocked.
     * I'll refactor it one day so it's easier to follow.
     *
<<<<<<< HEAD
     * @template TMock of object
     *
     * @param array<class-string<TMock>|TMock|Closure(LegacyMockInterface&MockInterface&TMock):LegacyMockInterface&MockInterface&TMock|array<TMock>> $args
     *
     * @throws ReflectionException|RuntimeException
     *
     * @return LegacyMockInterface&MockInterface&TMock
=======
     * @template TMock of LegacyMockInterface&MockInterface&object
     *
     * @param array|string ...$args
     *
     * @throws ReflectionException|RuntimeException
     *
     * @return TMock
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
     */
    public function mock(...$args)
    {
        /** @var null|MockConfigurationBuilder $builder */
        $builder = null;
        /** @var null|callable $expectationClosure */
        $expectationClosure = null;
        $partialMethods = null;
        $quickDefinitions = [];
        $constructorArgs = null;
        $blocks = [];

        if (count($args) > 1) {
            $finalArg = array_pop($args);

            if (is_callable($finalArg) && is_object($finalArg)) {
                $expectationClosure = $finalArg;
            } else {
                $args[] = $finalArg;
            }
        }

        foreach ($args as $k => $arg) {
            if ($arg instanceof MockConfigurationBuilder) {
                $builder = $arg;

                unset($args[$k]);
            }
        }

        reset($args);

        $builder = $builder ?? new MockConfigurationBuilder();
        $mockeryConfiguration = Mockery::getConfiguration();
        $builder->setParameterOverrides($mockeryConfiguration->getInternalClassMethodParamMaps());
        $builder->setConstantsMap($mockeryConfiguration->getConstantsMap());

        while ($args !== []) {
            $arg = array_shift($args);

            // check for multiple interfaces
            if (is_string($arg)) {
                foreach (explode('|', $arg) as $type) {
                    if ($arg === 'null') {
                        // skip PHP 8 'null's
                        continue;
                    }

<<<<<<< HEAD
                    if (strpos($type, ',') && !strpos($type, ']')) {
=======
                    if (strpos($type, ',') && (strpos($type, ']') === 0 || strpos($type, ']') === false)) {
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
                        $interfaces = explode(',', str_replace(' ', '', $type));

                        $builder->addTargets($interfaces);

                        continue;
                    }

                    if (strpos($type, 'alias:') === 0) {
                        $type = str_replace('alias:', '', $type);

                        $builder->addTarget('stdClass');
                        $builder->setName($type);

                        continue;
                    }

                    if (strpos($type, 'overload:') === 0) {
                        $type = str_replace('overload:', '', $type);

                        $builder->setInstanceMock(true);
                        $builder->addTarget('stdClass');
                        $builder->setName($type);

                        continue;
                    }

                    if ($type[strlen($type) - 1] === ']') {
                        $parts = explode('[', $type);

                        $class = $parts[0];

<<<<<<< HEAD
                        if (! class_exists($class, true) && ! interface_exists($class, true)) {
=======
                        if (
                            ! class_exists($class, true)
                            && ! interface_exists($class, true)
                        ) {
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
                            throw new Exception('Can only create a partial mock from an existing class or interface');
                        }

                        $builder->addTarget($class);

                        $partialMethods = array_filter(
                            explode(',', strtolower(rtrim(str_replace(' ', '', $parts[1]), ']')))
                        );

                        foreach ($partialMethods as $partialMethod) {
                            if ($partialMethod[0] === '!') {
                                $builder->addBlackListedMethod(substr($partialMethod, 1));

                                continue;
                            }

                            $builder->addWhiteListedMethod($partialMethod);
                        }

                        continue;
                    }

<<<<<<< HEAD
                    if (class_exists($type, true) || interface_exists($type, true) || trait_exists($type, true)) {
=======
                    if (! $this->isValidClassName($type)) {
                        throw new Exception('Class name contains invalid characters');
                    }

                    if (
                        class_exists($type, true)
                        || interface_exists($type, true)
                        || trait_exists($type, true)
                    ) {
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
                        $builder->addTarget($type);

                        continue;
                    }

                    if (! $mockeryConfiguration->mockingNonExistentMethodsAllowed()) {
                        throw new Exception(sprintf("Mockery can't find '%s' so can't mock it", $type));
                    }

<<<<<<< HEAD
                    if (! $this->isValidClassName($type)) {
                        throw new Exception('Class name contains invalid characters');
                    }

=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
                    $builder->addTarget($type);

                    // unions are "sum" types and not "intersections", and so we must only process the first part
                    break;
                }

                continue;
            }

            if (is_object($arg)) {
                $builder->addTarget($arg);

                continue;
            }

<<<<<<< HEAD
            if (is_array($arg)) {
                if ([] !== $arg && array_keys($arg) !== range(0, count($arg) - 1)) {
                    // if associative array
                    if (array_key_exists(self::BLOCKS, $arg)) {
                        $blocks = $arg[self::BLOCKS];
                    }

                    unset($arg[self::BLOCKS]);

                    $quickDefinitions = $arg;

                    continue;
                }

                $constructorArgs = $arg;

                continue;
            }

            throw new Exception(sprintf(
                'Unable to parse arguments sent to %s::mock()', get_class($this)
            ));
=======
            if ($arg !== [] && array_keys($arg) !== range(0, count($arg) - 1)) {
                // if associative array
                if (array_key_exists(self::BLOCKS, $arg)) {
                    $blocks = $arg[self::BLOCKS];
                }

                unset($arg[self::BLOCKS]);

                $quickDefinitions = $arg;
            } else {
                $constructorArgs = $arg;
            }
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
        }

        $builder->addBlackListedMethods($blocks);

        if ($constructorArgs !== null) {
            $builder->addBlackListedMethod('__construct'); // we need to pass through
        } else {
            $builder->setMockOriginalDestructor(true);
        }

        if ($partialMethods !== null && $constructorArgs === null) {
            $constructorArgs = [];
        }

        $config = $builder->getMockConfiguration();

        $this->checkForNamedMockClashes($config);

        $def = $this->getGenerator()->generate($config);

        $className = $def->getClassName();
        if (class_exists($className, $attemptAutoload = false)) {
            $rfc = new ReflectionClass($className);
            if (! $rfc->implementsInterface(LegacyMockInterface::class)) {
                throw new RuntimeException(sprintf('Could not load mock %s, class already exists', $className));
            }
        }

        $this->getLoader()->load($def);

        $mock = $this->_getInstance($className, $constructorArgs);
        $mock->mockery_init($this, $config->getTargetObject(), $config->isInstanceMock());

        if ($quickDefinitions !== []) {
            if ($mockeryConfiguration->getQuickDefinitions()->shouldBeCalledAtLeastOnce()) {
                $mock->shouldReceive($quickDefinitions)->atLeast()->once();
            } else {
                $mock->shouldReceive($quickDefinitions)->byDefault();
            }
        }

<<<<<<< HEAD
        // if the last parameter passed to mock() is a closure,
        if ($expectationClosure instanceof Closure) {
            // call the closure with the mock object
=======
        if ($expectationClosure !== null) {
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
            $expectationClosure($mock);
        }

        return $this->rememberMock($mock);
    }

    /**
     * Fetch the next available allocation order number
     *
     * @return int
     */
    public function mockery_allocateOrder()
    {
        return ++$this->_allocatedOrder;
    }

    /**
     * Reset the container to its original state
     *
     * @return void
     */
    public function mockery_close()
    {
        foreach ($this->_mocks as $mock) {
            $mock->mockery_teardown();
        }

        $this->_mocks = [];
    }

    /**
     * Get current ordered number
     *
     * @return int
     */
    public function mockery_getCurrentOrder()
    {
        return $this->_currentOrder;
    }

    /**
     * Gets the count of expectations on the mocks
     *
     * @return int
     */
    public function mockery_getExpectationCount()
    {
        $count = 0;
        foreach ($this->_mocks as $mock) {
            $count += $mock->mockery_getExpectationCount();
        }

        return $count;
    }

    /**
     * Fetch array of ordered groups
     *
     * @return array<string,int>
     */
    public function mockery_getGroups()
    {
        return $this->_groups;
    }

    /**
     * Set current ordered number
     *
     * @param int $order
     *
     * @return int The current order number that was set
     */
    public function mockery_setCurrentOrder($order)
    {
        return $this->_currentOrder = $order;
    }

    /**
     * Set ordering for a group
     *
     * @param string $group
<<<<<<< HEAD
     * @param int    $order
=======
     * @param int $order
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
     *
     * @return void
     */
    public function mockery_setGroup($group, $order)
    {
        $this->_groups[$group] = $order;
    }

    /**
     * Tear down tasks for this container
     *
     * @throws PHPException
     */
    public function mockery_teardown()
    {
        try {
            $this->mockery_verify();
        } catch (PHPException $phpException) {
            $this->mockery_close();

            throw $phpException;
        }
    }

    /**
     * Retrieves all exceptions thrown by mocks
     *
     * @return array<Throwable>
     */
    public function mockery_thrownExceptions()
    {
        /** @var array<Throwable> $exceptions */
        $exceptions = [];

        foreach ($this->_mocks as $mock) {
            foreach ($mock->mockery_thrownExceptions() as $exception) {
                $exceptions[] = $exception;
            }
        }

        return $exceptions;
    }

    /**
     * Validate the current mock's ordering
     *
     * @param string $method
<<<<<<< HEAD
     * @param int    $order
=======
     * @param int $order
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
     *
     * @throws Exception
     */
    public function mockery_validateOrder($method, $order, LegacyMockInterface $mock)
    {
        if ($order < $this->_currentOrder) {
            $exception = new InvalidOrderException(
                sprintf(
                    'Method %s called out of order: expected order %d, was %d',
                    $method,
                    $order,
                    $this->_currentOrder
                )
            );

            $exception->setMock($mock)
                ->setMethodName($method)
                ->setExpectedOrder($order)
                ->setActualOrder($this->_currentOrder);

            throw $exception;
        }

        $this->mockery_setCurrentOrder($order);
    }

    /**
     * Verify the container mocks
     */
    public function mockery_verify()
    {
        foreach ($this->_mocks as $mock) {
            $mock->mockery_verify();
        }
    }

    /**
     * Store a mock and set its container reference
     *
<<<<<<< HEAD
     * @template TRememberMock of object
     *
     * @param LegacyMockInterface&MockInterface&TRememberMock $mock
     *
     * @return LegacyMockInterface&MockInterface&TRememberMock
=======
     * @param LegacyMockInterface|MockInterface $mock
     *
     * @return LegacyMockInterface|MockInterface
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
     */
    public function rememberMock(LegacyMockInterface $mock)
    {
        $class = get_class($mock);

        if (! array_key_exists($class, $this->_mocks)) {
            return $this->_mocks[$class] = $mock;
        }

        /**
         * This condition triggers for an instance mock where origin mock
         * is already remembered
         */
        return $this->_mocks[] = $mock;
    }

    /**
     * Retrieve the last remembered mock object,
     * which is the same as saying retrieve the current mock being programmed where you have yet to call mock()
     * to change it thus why the method name is "self" since it will be used during the programming of the same mock.
     *
     * @return LegacyMockInterface|MockInterface
     */
    public function self()
    {
        $mocks = array_values($this->_mocks);
        $index = count($mocks) - 1;
        return $mocks[$index];
    }

    /**
     * @template TMock of object
<<<<<<< HEAD
     * @template TMixed
     *
     * @param class-string<TMock> $mockName
     * @param null|array<TMixed>  $constructorArgs
     *
     * @return TMock
=======
     *
     * @param class-string<TMock> $mockName
     * @param null|array<int,mixed> $constructorArgs
     *
     * @return LegacyMockInterface&MockInterface&TMock
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
     */
    protected function _getInstance($mockName, $constructorArgs = null)
    {
        if ($constructorArgs !== null) {
            return (new ReflectionClass($mockName))->newInstanceArgs($constructorArgs);
        }

        try {
            $instance = $this->instantiator->instantiate($mockName);
        } catch (PHPException $phpException) {
            /** @var class-string<TMock> $internalMockName */
            $internalMockName = $mockName . '_Internal';

            if (! class_exists($internalMockName)) {
                eval(sprintf(
                    'class %s extends %s { public function __construct() {} }',
                    $internalMockName,
                    $mockName
                ));
            }

            $instance = new $internalMockName();
        }

        return $instance;
    }

    protected function checkForNamedMockClashes($config)
    {
        $name = $config->getName();

        if ($name === null) {
            return;
        }

        $hash = $config->getHash();

        if (array_key_exists($name, $this->_namedMocks) && $hash !== $this->_namedMocks[$name]) {
            throw new Exception(
                sprintf("The mock named '%s' has been already defined with a different mock configuration", $name)
            );
        }

        $this->_namedMocks[$name] = $hash;
    }
}
