<?php

/**
 * Mockery (https://docs.mockery.io/)
 *
 * @copyright https://github.com/mockery/mockery/blob/HEAD/COPYRIGHT.md
 * @license https://github.com/mockery/mockery/blob/HEAD/LICENSE BSD 3-Clause License
 * @link https://github.com/mockery/mockery for the canonical source repository
 */

namespace Mockery\Generator;

class CachingGenerator implements Generator
{
<<<<<<< HEAD
    /**
     * @var array<string,string>
     */
    protected $cache = [];

    /**
     * @var Generator
     */
=======
    protected $cache = [];

>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    protected $generator;

    public function __construct(Generator $generator)
    {
        $this->generator = $generator;
    }

<<<<<<< HEAD
    /**
     * @return string
     */
    public function generate(MockConfiguration $config)
    {
        $hash = $config->getHash();

        if (array_key_exists($hash, $this->cache)) {
            return $this->cache[$hash];
        }

        return $this->cache[$hash] = $this->generator->generate($config);
=======
    public function generate(MockConfiguration $config)
    {
        $hash = $config->getHash();
        if (isset($this->cache[$hash])) {
            return $this->cache[$hash];
        }

        $definition = $this->generator->generate($config);
        $this->cache[$hash] = $definition;

        return $definition;
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    }
}
