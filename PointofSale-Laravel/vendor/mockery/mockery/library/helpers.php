<?php

/**
 * Mockery (https://docs.mockery.io/)
 *
 * @copyright https://github.com/mockery/mockery/blob/HEAD/COPYRIGHT.md
 * @license https://github.com/mockery/mockery/blob/HEAD/LICENSE BSD 3-Clause License
 * @link https://github.com/mockery/mockery for the canonical source repository
 */

<<<<<<< HEAD
use Mockery\LegacyMockInterface;
use Mockery\Matcher\AndAnyOtherArgs;
use Mockery\Matcher\AnyArgs;
use Mockery\MockInterface;

if (! \function_exists('mock')) {
    /**
     * @template TMock of object
     *
     * @param array<class-string<TMock>|TMock|Closure(LegacyMockInterface&MockInterface&TMock):LegacyMockInterface&MockInterface&TMock|array<TMock>> $args
     *
     * @return LegacyMockInterface&MockInterface&TMock
     */
=======
use Mockery\Matcher\AndAnyOtherArgs;
use Mockery\Matcher\AnyArgs;

if (! \function_exists('mock')) {
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    function mock(...$args)
    {
        return Mockery::mock(...$args);
    }
}

if (! \function_exists('spy')) {
<<<<<<< HEAD
    /**
     * @template TSpy of object
     *
     * @param array<class-string<TSpy>|TSpy|Closure(LegacyMockInterface&MockInterface&TSpy):LegacyMockInterface&MockInterface&TSpy|array<TSpy>> $args
     *
     * @return LegacyMockInterface&MockInterface&TSpy
     */
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    function spy(...$args)
    {
        return Mockery::spy(...$args);
    }
}

if (! \function_exists('namedMock')) {
<<<<<<< HEAD
    /**
     * @template TNamedMock of object
     *
     * @param array<class-string<TNamedMock>|TNamedMock|array<TNamedMock>> $args
     *
     * @return LegacyMockInterface&MockInterface&TNamedMock
     */
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    function namedMock(...$args)
    {
        return Mockery::namedMock(...$args);
    }
}

if (! \function_exists('anyArgs')) {
<<<<<<< HEAD
    function anyArgs(): AnyArgs
=======
    function anyArgs()
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    {
        return new AnyArgs();
    }
}

if (! \function_exists('andAnyOtherArgs')) {
<<<<<<< HEAD
    function andAnyOtherArgs(): AndAnyOtherArgs
=======
    function andAnyOtherArgs()
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    {
        return new AndAnyOtherArgs();
    }
}

if (! \function_exists('andAnyOthers')) {
<<<<<<< HEAD
    function andAnyOthers(): AndAnyOtherArgs
=======
    function andAnyOthers()
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    {
        return new AndAnyOtherArgs();
    }
}
