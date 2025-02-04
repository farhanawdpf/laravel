<?php

/**
 * Mockery (https://docs.mockery.io/)
 *
 * @copyright https://github.com/mockery/mockery/blob/HEAD/COPYRIGHT.md
 * @license https://github.com/mockery/mockery/blob/HEAD/LICENSE BSD 3-Clause License
 * @link https://github.com/mockery/mockery for the canonical source repository
 */

namespace Mockery;

use function spl_object_hash;

class Undefined
{
    /**
     * Call capturing to merely return this same object.
     *
     * @param string $method
<<<<<<< HEAD
     * @param array  $args
=======
     * @param array $args
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
     *
     * @return self
     */
    public function __call($method, array $args)
    {
        return $this;
    }

    /**
     * Return a string, avoiding E_RECOVERABLE_ERROR.
     *
     * @return string
     */
    public function __toString()
    {
        return self::class . ':' . spl_object_hash($this);
    }
}
