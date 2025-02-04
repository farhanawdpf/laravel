<?php

/**
 * Mockery (https://docs.mockery.io/)
 *
 * @copyright https://github.com/mockery/mockery/blob/HEAD/COPYRIGHT.md
 * @license https://github.com/mockery/mockery/blob/HEAD/LICENSE BSD 3-Clause License
 * @link https://github.com/mockery/mockery for the canonical source repository
 */

namespace Mockery\Exception;

<<<<<<< HEAD
class BadMethodCallException extends \BadMethodCallException implements MockeryExceptionInterface
{
    /**
     * @var bool
     */
=======
use Throwable;

class BadMethodCallException extends \BadMethodCallException implements MockeryExceptionInterface
{
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    private $dismissed = false;

    public function dismiss()
    {
        $this->dismissed = true;
        // we sometimes stack them
        $previous = $this->getPrevious();
        if (! $previous instanceof self) {
            return;
        }

        $previous->dismiss();
    }

<<<<<<< HEAD
    /**
     * @return bool
     */
=======
>>>>>>> 0de19938433b4a14eaf363950a309911fd65ab53
    public function dismissed()
    {
        return $this->dismissed;
    }
}
