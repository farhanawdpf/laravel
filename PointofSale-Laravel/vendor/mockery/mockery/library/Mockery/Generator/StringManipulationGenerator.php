<?php

/**
 * Mockery (https://docs.mockery.io/)
 *
 * @copyright https://github.com/mockery/mockery/blob/HEAD/COPYRIGHT.md
 * @license https://github.com/mockery/mockery/blob/HEAD/LICENSE BSD 3-Clause License
 * @link https://github.com/mockery/mockery for the canonical source repository
 */

namespace Mockery\Generator;

use Mockery\Generator\StringManipulation\Pass\AvoidMethodClashPass;
use Mockery\Generator\StringManipulation\Pass\CallTypeHintPass;
use Mockery\Generator\StringManipulation\Pass\ClassAttributesPass;
use Mockery\Generator\StringManipulation\Pass\ClassNamePass;
use Mockery\Generator\StringManipulation\Pass\ClassPass;
use Mockery\Generator\StringManipulation\Pass\ConstantsPass;
use Mockery\Generator\StringManipulation\Pass\InstanceMockPass;
use Mockery\Generator\StringManipulation\Pass\InterfacePass;
use Mockery\Generator\StringManipulation\Pass\MagicMethodTypeHintsPass;
use Mockery\Generator\StringManipulation\Pass\MethodDefinitionPass;
use Mockery\Generator\StringManipulation\Pass\Pass;
use Mockery\Generator\StringManipulation\Pass\RemoveBuiltinMethodsThatAreFinalPass;
use Mockery\Generator\StringManipulation\Pass\RemoveDestructorPass;
use Mockery\Generator\StringManipulation\Pass\RemoveUnserializeForInternalSerializableClassesPass;
use Mockery\Generator\StringManipulation\Pass\TraitPass;
<<<<<<< HEAD
=======

>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
use function file_get_contents;

class StringManipulationGenerator implements Generator
{
<<<<<<< HEAD
    /**
     * @var list<Pass>
     */
    protected $passes = [];

    /**
     * @var string
     */
    private $code;

    /**
     * @param list<Pass> $passes
     */
    public function __construct(array $passes)
    {
        $this->passes = $passes;

        $this->code = file_get_contents(__DIR__ . '/../Mock.php');
    }

    /**
     * @param  Pass $pass
     * @return void
     */
=======
    protected $passes = [];

    public function __construct(array $passes)
    {
        $this->passes = $passes;
    }

>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function addPass(Pass $pass)
    {
        $this->passes[] = $pass;
    }

<<<<<<< HEAD
    /**
     * @return MockDefinition
     */
    public function generate(MockConfiguration $config)
    {
=======
    public function generate(MockConfiguration $config)
    {
        $code = file_get_contents(__DIR__ . '/../Mock.php');
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
        $className = $config->getName() ?: $config->generateName();

        $namedConfig = $config->rename($className);

<<<<<<< HEAD
        $code = $this->code;
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
        foreach ($this->passes as $pass) {
            $code = $pass->apply($code, $namedConfig);
        }

        return new MockDefinition($namedConfig, $code);
    }

    /**
     * Creates a new StringManipulationGenerator with the default passes
     *
     * @return StringManipulationGenerator
     */
    public static function withDefaultPasses()
    {
        return new static([
            new CallTypeHintPass(),
            new MagicMethodTypeHintsPass(),
            new ClassPass(),
            new TraitPass(),
            new ClassNamePass(),
            new InstanceMockPass(),
            new InterfacePass(),
            new AvoidMethodClashPass(),
            new MethodDefinitionPass(),
            new RemoveUnserializeForInternalSerializableClassesPass(),
            new RemoveBuiltinMethodsThatAreFinalPass(),
            new RemoveDestructorPass(),
            new ConstantsPass(),
            new ClassAttributesPass(),
        ]);
    }
}
