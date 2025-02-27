<?php

/**
 * Mockery (https://docs.mockery.io/)
 *
 * @copyright https://github.com/mockery/mockery/blob/HEAD/COPYRIGHT.md
 * @license https://github.com/mockery/mockery/blob/HEAD/LICENSE BSD 3-Clause License
 * @link https://github.com/mockery/mockery for the canonical source repository
 */

namespace Mockery\Generator;

use function array_diff;

class MockConfigurationBuilder
{
<<<<<<< HEAD
    /**
     * @var list<string>
     */
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    protected $blackListedMethods = [
        '__call',
        '__callStatic',
        '__clone',
        '__wakeup',
        '__set',
        '__get',
        '__toString',
        '__isset',
        '__destruct',
        '__debugInfo', ## mocking this makes it difficult to debug with xdebug

        // below are reserved words in PHP
        '__halt_compiler', 'abstract', 'and', 'array', 'as',
        'break', 'callable', 'case', 'catch', 'class',
        'clone', 'const', 'continue', 'declare', 'default',
        'die', 'do', 'echo', 'else', 'elseif',
        'empty', 'enddeclare', 'endfor', 'endforeach', 'endif',
        'endswitch', 'endwhile', 'eval', 'exit', 'extends',
        'final', 'for', 'foreach', 'function', 'global',
        'goto', 'if', 'implements', 'include', 'include_once',
        'instanceof', 'insteadof', 'interface', 'isset', 'list',
        'namespace', 'new', 'or', 'print', 'private',
        'protected', 'public', 'require', 'require_once', 'return',
        'static', 'switch', 'throw', 'trait', 'try',
        'unset', 'use', 'var', 'while', 'xor',
    ];

<<<<<<< HEAD
    /**
     * @var array
     */
    protected $constantsMap = [];

    /**
     * @var bool
     */
    protected $instanceMock = false;

    /**
     * @var bool
     */
    protected $mockOriginalDestructor = false;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var array
     */
    protected $parameterOverrides = [];

    /**
     * @var list<string>
     */
=======
    protected $constantsMap = [];

    protected $instanceMock = false;

    protected $mockOriginalDestructor = false;

    protected $name;

    protected $parameterOverrides = [];

>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    protected $php7SemiReservedKeywords = [
        'callable', 'class', 'trait', 'extends', 'implements', 'static', 'abstract', 'final',
        'public', 'protected', 'private', 'const', 'enddeclare', 'endfor', 'endforeach', 'endif',
        'endwhile', 'and', 'global', 'goto', 'instanceof', 'insteadof', 'interface', 'namespace', 'new',
        'or', 'xor', 'try', 'use', 'var', 'exit', 'list', 'clone', 'include', 'include_once', 'throw',
        'array', 'print', 'echo', 'require', 'require_once', 'return', 'else', 'elseif', 'default',
        'break', 'continue', 'switch', 'yield', 'function', 'if', 'endswitch', 'finally', 'for', 'foreach',
        'declare', 'case', 'do', 'while', 'as', 'catch', 'die', 'self', 'parent',
    ];

<<<<<<< HEAD
    /**
     * @var array
     */
    protected $targets = [];

    /**
     * @var array
     */
=======
    protected $targets = [];

>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    protected $whiteListedMethods = [];

    public function __construct()
    {
        $this->blackListedMethods = array_diff($this->blackListedMethods, $this->php7SemiReservedKeywords);
    }

<<<<<<< HEAD
    /**
     * @param  string $blackListedMethod
     * @return self
     */
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function addBlackListedMethod($blackListedMethod)
    {
        $this->blackListedMethods[] = $blackListedMethod;
        return $this;
    }

<<<<<<< HEAD
    /**
     * @param  list<string> $blackListedMethods
     * @return self
     */
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function addBlackListedMethods(array $blackListedMethods)
    {
        foreach ($blackListedMethods as $method) {
            $this->addBlackListedMethod($method);
        }

        return $this;
    }

<<<<<<< HEAD
    /**
     * @param  class-string $target
     * @return self
     */
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function addTarget($target)
    {
        $this->targets[] = $target;

        return $this;
    }

<<<<<<< HEAD
    /**
     * @param  list<class-string> $targets
     * @return self
     */
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function addTargets($targets)
    {
        foreach ($targets as $target) {
            $this->addTarget($target);
        }

        return $this;
    }

<<<<<<< HEAD
    /**
     * @return self
     */
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function addWhiteListedMethod($whiteListedMethod)
    {
        $this->whiteListedMethods[] = $whiteListedMethod;
        return $this;
    }

<<<<<<< HEAD
    /**
     * @return self
     */
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function addWhiteListedMethods(array $whiteListedMethods)
    {
        foreach ($whiteListedMethods as $method) {
            $this->addWhiteListedMethod($method);
        }

        return $this;
    }

<<<<<<< HEAD
    /**
     * @return MockConfiguration
     */
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function getMockConfiguration()
    {
        return new MockConfiguration(
            $this->targets,
            $this->blackListedMethods,
            $this->whiteListedMethods,
            $this->name,
            $this->instanceMock,
            $this->parameterOverrides,
            $this->mockOriginalDestructor,
            $this->constantsMap
        );
    }

<<<<<<< HEAD
    /**
     * @param  list<string> $blackListedMethods
     * @return self
     */
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function setBlackListedMethods(array $blackListedMethods)
    {
        $this->blackListedMethods = $blackListedMethods;
        return $this;
    }

<<<<<<< HEAD
    /**
     * @return self
     */
    public function setConstantsMap(array $map)
    {
        $this->constantsMap = $map;

        return $this;
    }

    /**
     * @param bool $instanceMock
     */
    public function setInstanceMock($instanceMock)
    {
        $this->instanceMock = (bool) $instanceMock;

        return $this;
    }

    /**
     * @param bool $mockDestructor
     */
    public function setMockOriginalDestructor($mockDestructor)
    {
        $this->mockOriginalDestructor = (bool) $mockDestructor;
        return $this;
    }

    /**
     * @param string $name
     */
=======
    public function setConstantsMap(array $map)
    {
        $this->constantsMap = $map;
    }

    public function setInstanceMock($instanceMock)
    {
        $this->instanceMock = (bool) $instanceMock;
    }

    public function setMockOriginalDestructor($mockDestructor)
    {
        $this->mockOriginalDestructor = $mockDestructor;
        return $this;
    }

>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

<<<<<<< HEAD
    /**
     * @return self
     */
    public function setParameterOverrides(array $overrides)
    {
        $this->parameterOverrides = $overrides;
        return $this;
    }

    /**
     * @param  list<string> $whiteListedMethods
     * @return self
     */
=======
    public function setParameterOverrides(array $overrides)
    {
        $this->parameterOverrides = $overrides;
    }

>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function setWhiteListedMethods(array $whiteListedMethods)
    {
        $this->whiteListedMethods = $whiteListedMethods;
        return $this;
    }
}
