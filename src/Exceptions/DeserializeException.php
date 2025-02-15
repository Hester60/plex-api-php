<?php

namespace Hester60\PlexApiPhp\Exceptions;

use Exception;
use Throwable;

final class DeserializeException extends Exception
{
    /**
     * @param string|null $message
     * @param Throwable|null $previous
     */
    public function __construct(protected $message = null, Throwable $previous = null)
    {
        if (empty($message)) {
            $message = "An error occurred while deserializing response.";
        }

        parent::__construct($message, 500, $previous);
    }
}
